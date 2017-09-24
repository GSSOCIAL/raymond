<?php
 /**
 * 
 * 
 * @package 
 * @copyright SalesAgility Ltd http://www.salesagility.com
 * 
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU AFFERO GENERAL PUBLIC LICENSE
 * along with this program; if not, see http://www.gnu.org/licenses
 * or write to the Free Software Foundation,Inc., 51 Franklin Street,
 * Fifth Floor, Boston, MA 02110-1301  USA
 *
 * @author Salesagility Ltd <support@salesagility.com>
 */
require_once 'modules/InboundEmail/InboundEmail.php';
require_once 'include/clean.php';
class AOPInboundEmail extends InboundEmail {

    /**
     * Replaces embedded image links with links to the appropriate note in the CRM.
     * @param $string
     * @param $noteIds A whitelist of note ids to replace
     * @return mixed
     */
    function processImageLinks($string, $noteIds){
        global $sugar_config;
        if(!$noteIds){
            return $string;
        }
        $matches = array();
        preg_match_all('/cid:([[:alnum:]-]*)/i',$string,$matches);
        if(!isset($matches[1]) OR !count($matches[1])){
            return $string;
        }
        $matches = $matches[1];
        //array_shift($matches);
        $matches = array_unique($matches);
        foreach($matches as $match){
            $id = strtolower($match);
            if(in_array($id,$noteIds)){
                //$string = str_replace('cid:'.$match,$sugar_config['site_url']."/index.php?entryPoint=download&id={$id}&type=Notes&",$string);
                $string = str_replace('cid:'.$match,$sugar_config['site_url']."/upload/{$id}?",$string);
            }
        }
        return $string;
    }

    public function getCaseIdFromCaseNumber($emailName, $aCase) {
        global $db;
        $result = parent::getCaseIdFromCaseNumber($emailName, $aCase);
        if ( !$result ) { 
            if ( !empty($this->references) && is_array($this->references) ) {
                $refs = htmlspecialchars("'".join("', '", $this->references)."'");
                $sql = "
                    SELECT 
                     eb.bean_id case_id
                    FROM 
                     emails e 
                    ,emails_beans eb
                    ,cases c
                    WHERE 
                     e.header_message_id IN ({$refs})
                    AND e.deleted = 0
                    AND e.parent_type = 'Cases'
                    AND eb.email_id = e.id
                    AND eb.deleted = 0
                    AND c.id = eb.bean_id
                    AND c.deleted = 0
                    ORDER BY 
                     e.date_entered DESC
                    LIMIT 1";
                $res = $db->query($sql);
                $row = $db->fetchByAssoc($res);
                if ( !empty($row['case_id']) ) {
                    return $row['case_id'];
                }
            }
        }
        return $result;
    }


    function handleCreateCase($email, $userId) {
        global $current_user, $mod_strings, $current_language;
        global $sugar_config;
        global $db;
        require_once('custom/modules/Cases/CasesHooks.php');
        CasesHooks::$disable_change_status_hook = true;
        $mod_strings = return_module_language($current_language, "Emails");
        $GLOBALS['log']->debug('In handleCreateCase in AOPInboundEmail');
        $c = new aCase();
        $case_id = $this->getCaseIdFromCaseNumber($email->name, $c);

        $GLOBALS['handleCreateCase'] = true;

        if (!$this->handleCaseAssignment($email) && $this->isMailBoxTypeCreateCase()) {
            // create a case
            $GLOBALS['log']->debug('retrieveing email');
            $email->retrieve($email->id);
            $c = new aCase();

            $notes = $email->get_linked_beans('notes','Notes');
            $noteIds = array();
            foreach($notes as $note){
                $noteIds[] = $note->id;
            }
            if($email->description_html) {
                $c->description = $this->processImageLinks(SugarCleaner::cleanHtml($email->description_html),$noteIds);
            }else{
                $c->description = $email->description;
            }
            $c->assigned_user_id = $userId;
            $c->name = $email->name;
            $c->status = 'New';
            $c->priority = 'P2';

            if(!empty($email->reply_to_email)) {
                $contactAddr = $email->reply_to_email;
            } else {
                $contactAddr = $email->from_addr;
            }

            $GLOBALS['log']->debug('finding related accounts with address ' . $contactAddr);
            if($accountIds = $this->getRelatedId($contactAddr, 'accounts', true, $email)) {
                if (sizeof($accountIds) == 1) {

                    if ($accountIds[0] == $sugar_config['spamAccountID']) {
                        // Текущий Контрагент - Контрагент со спамерами
                        // Удаляем письмо
                        $email->mark_deleted($email->id); // Если надо удалить - раскомментировать
                        // Выход из функции создания Обращения
                        return;
                    }

                    $c->account_id = $accountIds[0];

                    $acct = new Account();
                    $acct->retrieve($c->account_id);
                    $c->account_name = $acct->name;
                } // if
            } // if
            $contactIds = $this->getRelatedId($contactAddr, 'contacts', true, $email);
            if(!empty($contactIds)) {
                $c->contact_created_by_id = $contactIds[0];
            }
            $c->save(true);
            $c->retrieve($c->id);
            if(!empty($c->contact_created_by_id)) {
                // Если указан контакт основной
                // Добавляем его как основной в список контактов
                $c->load_relationship('contacts');
                $c->contacts->add($c->contact_created_by_id,array('contact_role'=>'Primary Contact'));
            }
            $caseId = $c->id;

            // Наполняем кейс контактами из To и CC

            $emails = array();
            if(!empty($email->to_addrs)) {
                // Если есть To
                $to_emails = explode(",", $email->to_addrs);
                $emails = array_merge($emails, $to_emails);
            }
            if(!empty($email->cc_addrs)) {
                // Если есть CC
                $cc_emails = explode(",", $email->cc_addrs);
                $emails = array_merge($emails, $cc_emails);
            }

            // Проверяем наличие СС
            if(count($emails)) {
                // Если есть To и СС
                foreach ($emails as $emailAddr) {
                    $emailAddr = trim($emailAddr);
                    $contactIds1 = $this->getRelatedId($emailAddr, 'contacts', true, $email);
                    if(isset($contactIds1[0]) AND !empty($contactIds1[0])) {
                        // Контакт найден
                        // Добавляем Контак с ролью СС
                        $c->load_relationship('contacts');
                        $c->contacts->add($contactIds1[0],array('contact_role'=>'Alternate Contact'));

                    }
                }

            }



            $c = new aCase();
            $c->retrieve($caseId);
            if($c->load_relationship('emails')) {
                $c->emails->add($email->id);
            } // if
                if(!empty($contactIds) && $c->load_relationship('contacts')) {
                    if (!$accountIds && count($contactIds) == 1) {
                        $contact = BeanFactory::getBean('Contacts', $contactIds[0]);
                        if ($contact->load_relationship('accounts')) {
                            $acct = $contact->accounts->get();

                            if ($acct[0] == $sugar_config['spamAccountID']) {
                                // Текущий Контрагент - Контрагент со спамерами
                                // Удаляем письмо
                                $email->mark_deleted($email->id); // Если надо удалить - раскомментировать
                                // Удаляем текущий кейс
                                $c->mark_deleted($c->id);
                                // Выход из функции создания Обращения
                                return;
                            }

                            if ($c->load_relationship('accounts') && !empty($acct[0])) {
                                $c->accounts->add($acct[0]);
                            }
                        }
                    }
                    //$c->contacts->add($contactIds);
                } // if
            foreach($notes as $note){
                //Link notes to case also
                $newNote = BeanFactory::newBean('Notes');
                $newNote->name = $note->name;
                $newNote->file_mime_type = $note->file_mime_type;
                $newNote->filename = $note->filename;
                $newNote->parent_type = 'Cases';
                $newNote->parent_id = $c->id;
                $newNote->save();
                $srcFile = "upload://{$note->id}";
                $destFile = "upload://{$newNote->id}";
                copy($srcFile,$destFile);

            }

            $c->email_id = $email->id;
            $email->parent_type = "Cases";
            $email->parent_id = $caseId;
            // assign the email to the case owner
            $email->assigned_user_id = $c->assigned_user_id;
            $email->name = str_replace('%1', $c->case_number, $c->getEmailSubjectMacro()) . " ". $email->name;
            $email->save();
            $GLOBALS['log']->debug('InboundEmail created one case with number: '.$c->case_number);
            $createCaseTemplateId = $this->get_stored_options('create_case_email_template', "");
            if(!empty($this->stored_options)) {
                $storedOptions = unserialize(base64_decode($this->stored_options));
            }
            if(!empty($createCaseTemplateId)) {
                $fromName = "";
                $fromAddress = "";
                if (!empty($this->stored_options)) {
                    $fromAddress = $storedOptions['from_addr'];
                    $fromName = from_html($storedOptions['from_name']);
                    $replyToName = (!empty($storedOptions['reply_to_name']))? from_html($storedOptions['reply_to_name']) :$fromName ;
                    $replyToAddr = (!empty($storedOptions['reply_to_addr'])) ? $storedOptions['reply_to_addr'] : $fromAddress;
                } // if
                $defaults = $current_user->getPreferredEmail();
                $fromAddress = (!empty($fromAddress)) ? $fromAddress : $defaults['email'];
                $fromName = (!empty($fromName)) ? $fromName : $defaults['name'];
                $to[0]['email'] = $contactAddr;

                // handle to name: address, prefer reply-to
                if(!empty($email->reply_to_name)) {
                    $to[0]['display'] = $email->reply_to_name;
                } elseif(!empty($email->from_name)) {
                    $to[0]['display'] = $email->from_name;
                }

                $et = new EmailTemplate();
                $et->retrieve($createCaseTemplateId);
                if(empty($et->subject))		{ $et->subject = ''; }
                if(empty($et->body))		{ $et->body = ''; }
                if(empty($et->body_html))	{ $et->body_html = ''; }

                $et->subject = "Re:" . " " . str_replace('%1', $c->case_number, $c->getEmailSubjectMacro() . " ". $c->name);

                $html = trim($email->description_html);
                $plain = trim($email->description);

                $email->email2init();
                $email->from_addr = $email->from_addr_name;
                $email->to_addrs = $email->to_addrs_names;
                $email->cc_addrs = $email->cc_addrs_names;
                $email->bcc_addrs = $email->bcc_addrs_names;
                $email->from_name = $email->from_addr;

                $email = $email->et->handleReplyType($email, "reply");
                $ret = $email->et->displayComposeEmail($email);
                $ret['description'] = empty($email->description_html) ?  str_replace("\n", "\n<BR/>", $email->description) : $email->description_html;

                $reply = new Email();
                $reply->type				= 'out';
                $reply->to_addrs			= $to[0]['email'];
                $reply->to_addrs_arr		= $to;
                $reply->cc_addrs_arr		= array();
                $reply->bcc_addrs_arr		= array();
                $reply->from_name			= $fromName;
                $reply->from_addr			= $fromAddress;
                $reply->reply_to_name		= $replyToName;
                $reply->reply_to_addr		= $replyToAddr;
                $reply->name				= $et->subject;
                $reply->description			= $et->body . "<div><hr /></div>" .  $email->description;
                if (!$et->text_only) {
                    $reply->description_html	= $et->body_html .  "<div><hr /></div>" . $email->description;
                }
                $GLOBALS['log']->debug('saving and sending auto-reply email');
                //$reply->save(); // don't save the actual email.
                $reply->send();
            } // if

            // Отправляем уведомление о создании
            $mainContact = new Contact();
            $mainContact->retrieve($c->contact_created_by_id);

            $hook = new CaseUpdatesHook();
            $hook->sendCreationEmail($c, $mainContact);

        } else {
            echo "First if not matching\n";

            // Обработка To и СС
            $GLOBALS['case_CC_only'] = true;
            $email->retrieve($email->id);
            $c->retrieve($case_id);
            // Все текущие контакты кейса
            $contacts = $c->getContacts();

            $emails = array();
            if(!empty($email->to_addrs)) {
                // Если есть To
                $to_emails = explode(",", $email->to_addrs);
                $emails = array_merge($emails, $to_emails);
            }
            if(!empty($email->cc_addrs)) {
                // Если есть CC
                $cc_emails = explode(",", $email->cc_addrs);
                $emails = array_merge($emails, $cc_emails);
            }


            if(count($emails) > 0) {
                // Если есть ящики для анализа
                foreach ($emails as $emailAddr) {
                    $emailAddr = trim($emailAddr);
                    $contactIds = $this->getRelatedId($emailAddr, 'contacts', true, $email);
                    if(isset($contactIds[0]) AND !empty($contactIds[0])) {
                        // Контакт найден
                        // Проверяем, что такого контакта пока нет у кейса
                        $is_search = false;
                        foreach ($contacts as $seedContact) {
                            if($seedContact->id == $contactIds[0]) {
                                $is_search = true;
                                break;
                            }
                        }
                        if(!$is_search) {
                            // Если текущего контакта пока не указано у кейса
                            // Добавляем Контак с ролью СС
                            $c->load_relationship('contacts');
                            $c->contacts->add($contactIds[0],array('contact_role'=>'Alternate Contact'));
                        }

                    }
                }

            }

            if(!empty($email->reply_to_email)) {
                $contactAddr = $email->reply_to_email;
            } else {
                $contactAddr = $email->from_addr;
            }
            $this->handleAutoresponse($email, $contactAddr);
            $c->save();//сохраняем кейс для перезаписи date_modified 
        }
        CasesHooks::$disable_change_status_hook = false;
        echo "End of handle create case\n";

    } // fn
}