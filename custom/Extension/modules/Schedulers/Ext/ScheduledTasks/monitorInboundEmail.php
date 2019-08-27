<?php 
/*
https://trello.com/c/ZSsv4opE
Check if Inbound Emails works. Send and compare emails for spec keys

CREATE TABLE SYNTAX - important
CREATE TABLE `verification_keys` ( `id` INT(12) UNSIGNED NOT NULL AUTO_INCREMENT , `code` VARCHAR(32) NOT NULL , `thru` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `activated` INT(3) NOT NULL DEFAULT 0 ,`bean` VARCHAR(42) NULL, PRIMARY KEY (`id`)) ENGINE = InnoDB;
*/ 
$job_strings[] = 'monitorInboundEmail';
function monitorInboundEmail(){
    require_once('include/SugarPHPMailer.php');  
    global $db;
    $InboundSystemAddressPrefs = getEmailVerifierAddr(true);
    $Subject = "Inbound Email Verification"; //Letter subject. We will compare incoming mail subjects with this one
    $errors = array(
        "mailbox_access"=>false,
        "has_unread_messages"=>false,
        "case_updates"=>array(),
        "errors"=>array(),  
    );
    $KeysTableExist = $db->query("DESCRIBE `verification_keys`");
    $errors["table_exist"] = $KeysTableExist !== false;
    if($errors["table_exist"]==false){
        $errors["errors"][] = "Couldnt save Verification keys. Table doesnt exists";
    }
    $VerificationPassed=false;
    //If system address exists
    if($InboundSystemAddressPrefs && $InboundSystemAddressPrefs->addr){
        //Address exists. Check emails
        require_once 'modules/InboundEmail/AOPInboundEmail.php';
        global $dictionary,$app_strings,$sugar_config;

        require_once('modules/Configurator/Configurator.php');
        require_once('modules/Emails/EmailUI.php');

        $ie = new AOPInboundEmail();
        $emailUI = new EmailUI();
        
        $ieX = new AOPInboundEmail();
        $ieX->retrieve($InboundSystemAddressPrefs->id);
        $mailboxes = $ieX->mailboxarray;
        foreach($mailboxes as $mbox){
            $ieX->mailbox = $mbox;
            $newMsgs = array();
            $msgNoToUIDL = array();
            $connectToMailServer = false;
            if($ieX->isPop3Protocol()){
                $msgNoToUIDL = $ieX->getPop3NewMessagesToDownloadForCron();
                $newMsgs = array_keys($msgNoToUIDL);
            }
            if($ieX->connectMailserver() == 'true'){
                $connectToMailServer = true;
            }
            if($connectToMailServer){
                $errors["mailbox_access"]=true;
                if(!$ieX->isPop3Protocol()) {
                    $newMsgs = $ieX->getNewMessageIds();
                }
                if(is_array($newMsgs)){
                    $errors["has_unread_messages"]=true;
                    foreach ($newMsgs as $k => $msgNo){
                        //Filter each email by subject
                        $header = imap_headerinfo($ieX->conn,$msgNo);
                        if($header){
                            if(str_replace(array(" "),array(""),trim(strtolower($header->subject)))==str_replace(array(" "),array(""),trim(strtolower($Subject)))){
                                //this is thru. Search in DB for key and verify it
                                if($key_id = $db->getOne(sprintf("SELECT k.id FROM verification_keys k WHERE k.code='%s'",md5(trim(imap_body($ieX->conn,$msgNo))))) ){
                                    //Key passed - delete.
                                    $VerificationPassed=true;
                                    $db->query("DELETE FROM `verification_keys` WHERE `id`='{$key_id}'");
                                }
                            }else{
                                //Custom subject here. Check if Case Updates
                                $body = trim(imap_body($ieX->conn,$msgNo));
                                preg_match_all('/\[RECORD:(.+)\]\[CODE:(.+)\]/',$body,$out);
                                if($out){
                                    $record = is_array($out[1])?$out[1][0]:$out[1];
                                    $code = is_array($out[2])?$out[2][0]:$out[2];
                                    if($key_id = $db->getOne(sprintf("SELECT k.id FROM verification_keys k WHERE k.code='%s' AND k.activated=0 OR k.activated=2 AND k.bean='%s'",md5($code),$record))){
                                        //Key passed
                                        $db->query("UPDATE `verification_keys` SET `activated`=1 WHERE `id`='{$key_id}'");
                                    }
                                }
                            }
                        }
                    }
                }
            }else{
                $GLOBALS["log"]->error("Monitor Inbound emails failed. Not connected.");
                $errors["errors"][] = "Failure: couldnt connect to mailbox";
            }
        }
        imap_expunge($ieX->conn);
        imap_close($ieX->conn, CL_EXPUNGE);
        //Checked. Send new code
        $code = generateCode();
        if(!$db->query(sprintf("INSERT INTO `verification_keys`(`code`,`thru`) VALUES ('%s','%s')",md5($code),date("Y-m-d H:i:s",strtotime("+3 hours"))))){
            $GLOBALS["log"]->error("INBOUND EMAIL VERIFY Error - Couldnt save key");
            $errors["errors"][] = "Couldnt save key";
        }
        //Key reserved. Send mail to System addr
        $Email = new Email();  
        $defaults = $Email->getSystemDefaultEmail();  
        $mail = new SugarPHPMailer();  
        $mail->setMailerForSystem();  
        $mail->From = $defaults['email'];  
        $mail->FromName = $defaults['name'];  
        $mail->Subject = $Subject; //Dont modify. We compare incoming emails subjects as filter
        $mail->Body = $code;
        $mail->prepForOutbound();  
        $mail->AddAddress($InboundSystemAddressPrefs->addr);  
        @$mail->Send();
    }else{
        $GLOBALS["log"]->error("Monitor Inbound emails failed. Address failed");
        $errors["errors"][] = "E-mail address failure: Couldnt get email address to verify.";
    }
    if(!$VerificationPassed){
        //Write to log
        $GLOBALS["log"]->error("Monitor Inbound emails failed.  Couldnt verify code");
        $errors["errors"][] = "Couldnt verify code.";
        //Send email
        if($naddress = getEmailNotifyAddr()){
            $Email = new Email();  
            $defaults = $Email->getSystemDefaultEmail();  
            $system_mail = new SugarPHPMailer();  
            $system_mail->setMailerForSystem();  
            $system_mail->From = $defaults['email'];  
            $system_mail->FromName = $defaults['name'];  
            $system_mail->Subject = "Inbound mailboxes error. Couldnt verify code";
            $Body = "System cant verify mailboxes. Please check that email service works and contact administrator.\n\n";
            
            if(!empty($errors["errors"])){
                $errors_list = "";
                foreach($errors["errors"] as $error){
                    $errors_list .= $error.";<br/>";
                }
                $Body .= "Errors:\n{$errors_list}\n\n";
            }
            $Body .= "Debug data:\nemail account: ".(!empty($InboundSystemAddressPrefs)?$InboundSystemAddressPrefs->addr . " ({$InboundSystemAddressPrefs->id})":" EMPTY")."\n";
            $Body .= "mailbox access: ".($errors["mailbox_access"]===true?"y":"n")."\n";
            $Body .= "unread messages: ".($errors["has_unread_messages"]===true?"y":"n")."\n";
            $Body .= "key table exists: ".($errors["table_exist"]===true?"y":"n")."\n";
            $system_mail->Body = $Body;
            $system_mail->prepForOutbound();  
            $system_mail->AddAddress(getEmailNotifyAddr());  
            @$system_mail->Send();
        }
        //Update debug task
        $message = date("Y-m-d").": ";
        if(!empty($errors["errors"])){
            $message .= implode(",",$errors["errors"]);
        }else{
            $message .= "Couldnt save code.";
            if(!$errors["mailbox_access"]){
                $message .= "Couldnt access mailbox.";
            }
            if(!$errors["table_exist"]){
                $message .= "Storage table doesnt exists.";
            }
        }
        if($task_id = $db->getOne("SELECT t.id FROM config c INNER JOIN tasks t ON t.id=c.value WHERE c.name='email_debug_task' AND c.category='system' AND t.deleted=0")){
            $Task = BeanFactory::getBean("Tasks",$task_id);
            $Task->description = "{$Task->description}\n{$message}";
            $Task->save();
        }else{
            $Task = new Task();
            $Task->name = "Email verify errors";
            $Task->status = "Pending Input";
            $Task->description = $message;
            $Task->save();

            //save config
            $Administration = new Administration();
            $Administration->saveSetting("system","email_debug_task",$Task->id);
            $Administration->saveConfig();
        }
        echo("Email settings fault to verify. Please contact administrator");
    }else{
        echo("Email settings verified success");
    }
    //Set all codes status - checked
    $db->query("UPDATE `verification_keys` SET `activated`='2' WHERE `activated`='0' AND `bean` IS NOT NULL");
    return true;
}
?>