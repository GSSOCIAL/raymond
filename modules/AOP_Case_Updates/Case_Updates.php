<?php
/**
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.
 *
 * SuiteCRM is an extension to SugarCRM Community Edition developed by SalesAgility Ltd.
 * Copyright (C) 2011 - 2016 SalesAgility Ltd.
 *
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 *
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 *
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 *
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 *
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo and "Supercharged by SuiteCRM" logo. If the display of the logos is not
 * reasonably feasible for  technical reasons, the Appropriate Legal Notices must
 * display the words  "Powered by SugarCRM" and "Supercharged by SuiteCRM".
 */

/**
 * @param $focus
 *
 * @return string
 */
function display_updates($focus)
{
    global $mod_strings;

    $hideImage = SugarThemeRegistry::current()->getImageURL('basic_search.gif');
    $showImage = SugarThemeRegistry::current()->getImageURL('advanced_search.gif');

    //Javascript for Asynchronous update
    $html = <<<A
<script>
var hideUpdateImage = '$hideImage';
var showUpdateImage = '$showImage';
function collapseAllUpdates(){
    $('.caseUpdateImage').attr("src",showUpdateImage);
    $('.caseUpdate').slideUp('fast');
}
function expandAllUpdates(){
    $('.caseUpdateImage').attr("src",hideUpdateImage);
    $('.caseUpdate').slideDown('fast');
}
function toggleCaseUpdate(updateId){
    var id = 'caseUpdate'+updateId;
    var updateElem = $('#'+id);
    var imageElem = $('#'+id+"Image");

    if(updateElem.is(":visible")){
        imageElem.attr("src",showUpdateImage);
    }else{
        imageElem.attr("src",hideUpdateImage);
    }
    updateElem.slideToggle('fast');
}
function caseUpdates(record){
    loadingMessgPanl = new YAHOO.widget.SimpleDialog('loading', {
                    width: '200px',
                    close: true,
                    modal: true,
                    visible: true,
                    fixedcenter: true,
                    constraintoviewport: true,
                    draggable: false
                });
    loadingMessgPanl.setHeader(SUGAR.language.get('app_strings', 'LBL_EMAIL_PERFORMING_TASK'));
    loadingMessgPanl.setBody(SUGAR.language.get('app_strings', 'LBL_EMAIL_ONE_MOMENT'));
    loadingMessgPanl.render(document.body);
    loadingMessgPanl.show();

    var update_data = tinyMCE.activeEditor.getContent();
    var checkbox = document.getElementById('internal').checked;
    var internal = "";
    if(checkbox){
        internal=1;
    }

    //Post parameters

//    var params =
//        "record="+record+"&module=Cases&return_module=Cases&action=Save&return_id="+record+"&return_action=DetailView&relate_to=Cases&relate_id="+record+"&offset=1&update_text="
//        + update_data + "&internal=" + internal;
    var message = document.getElementById('case_updates');
    var fd = new FormData(message);
    fd.append("record", record);
    fd.append("module", "Cases");
    fd.append("return_module", "Cases");
    fd.append("action", "Save");
    fd.append("return_id", record);
    fd.append("return_action", "DetailView");
    fd.append("relate_to", "Cases");
    fd.append("relate_id", record);
    fd.append("offset", "1");
    fd.append("update_text", update_data);
    fd.append("internal", internal);


    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("POST", "index.php", true);


    // xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // xmlhttp.setRequestHeader("Content-length", fd.length);
    // xmlhttp.setRequestHeader("Connection", "close");

    //When button is clicked
    xmlhttp.onreadystatechange = function() {

        if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            location.reload()
            tinyMCE.init({
                convert_urls:false,
                valid_children:"+body[style]",
                height:300,
                width:"100%",
                theme:"modern",
                toolbar1:"code | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect",
                strict_loading_mode:true,
                language:"en",
                plugins:"insertdatetime,table,preview,paste,searchreplace,directionality",
                selector:"textarea",
                extended_valid_elements:"style[dir|lang|media|title|type],hr[class|width|size|noshade],@[class|style]",
//                content_css:"include/javascript/tiny_mce/themes/advanced/skins/default/content.css",
                directionality:"ltr",
                external_plugins: {"nanospell": "plugins/nanospell/plugin.js"},
                 nanospell_server: "php", // choose "php" "asp" "asp.net" or "java"
                 nanospell_autostart:true,
            });

    	}
    }

        xmlhttp.send(fd);



}
$(document).ready(function() {
    $('.caseUpdate').find('img[class!=attachment_thumb]').replaceWith(function() { return '<a href="' + $(this).attr('src') + '" data-lightbox="attachement">' + this.outerHTML + '</a>'; });

    lightbox.option({
      'positionFromTop': $('.navbar').length ? $('.navbar').height() + 30 : 50
    });
});
</script>
<link href="modules/AOP_Case_Updates/assets/lightbox/css/lightbox.min.css" rel="stylesheet">
<script src="modules/AOP_Case_Updates/assets/lightbox/js/lightbox.min.js"></script>
<style>
    .case_updates_wrapper img {
        max-width: 100%;
    }

    .thumb_link {
        display: inline-block;
        padding: 2px;
        margin: 0 0.5rem 1rem 0.5rem;
        background-color: #fff;
        line-height: 0;
        border-radius: 4px;
        transition: background-color 0.5s ease-out;
        border: 1px solid;
        width: 10rem;
        text-align: center;
        //height: 10rem;
        overflow: hidden;
    }

    .thumb_link img {
        #width: 7rem;
        border-radius: 4px;
    }
</style>
A;

    $html .= <<<EOD
<script>
$(document).ready(function(){
    collapseAllUpdates();
    var id = $('.caseUpdate').last().attr('id');
    if(id){
        toggleCaseUpdate(id.replace('caseUpdate',''));
    }
    tinyMCE.init({
    convert_urls:false,
    valid_children:"+body[style]",
    height:300,
    width:"100%",
    theme:"modern",
    toolbar1:"code | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect",
    strict_loading_mode:true,
    language:"en",
    plugins:"code,insertdatetime,table,preview,paste,searchreplace,directionality",
    selector:"textarea",
    extended_valid_elements:"style[dir|lang|media|title|type],hr[class|width|size|noshade],@[class|style]",
//    content_css:"include/javascript/tiny_mce/themes/advanced/skins/default/content.css",
    directionality:"ltr",
    external_plugins: {"nanospell": "plugins/nanospell/plugin.js"},
     nanospell_server: "php", // choose "php" "asp" "asp.net" or "java"
     nanospell_autostart:true,
  });
});
</script>
<a href='' onclick='collapseAllUpdates(); return false;'>{$mod_strings['LBL_CASE_UPDATES_COLLAPSE_ALL']}</a>
<a href='' onclick='expandAllUpdates(); return false;'>{$mod_strings['LBL_CASE_UPDATES_EXPAND_ALL']}</a>
<div class="case_updates_wrapper">
EOD;
    $updates = $focus->get_linked_beans('aop_case_updates', 'AOP_Case_Updates');
    if (!$updates || is_null($focus->id)) {
        $html .= quick_edit_case_updates($focus);

        return $html;
    }

    usort(
        $updates,
        function ($a, $b) {
            $aDate = $a->fetched_row['date_entered'];
            $bDate = $b->fetched_row['date_entered'];
            if ($aDate < $bDate) {
                return -1;
            } elseif ($aDate > $bDate) {
                return 1;
            }

            return 0;
        }
    );

    // Получаем Email основного получателя
    $contacts = $focus->getContacts('Primary Contact');
    $email = '';
    if(isset($contacts[0])) {
        $email = $contacts[0]->emailAddress->getPrimaryAddress($contacts[0]);
    }

    foreach($updates as $update){
        if($update->object_name == 'AOP_Case_Updates') {
            $html .= display_single_update($update, $hideImage);
        } elseif ($update->object_name == 'Email'  AND !empty($update->assigned_user_id)) {
            // Для отображения Email
            // Емайл должен быть адресован основному клиенту, и у емайл должен быть явно указан ответственный
            $sea = new SugarEmailAddress();
            $addresses = array();
            foreach ( array('to', 'cc', 'bcc') as $x ) {
                $a = explode(',', $update->{$x.'_addrs'});
                array_walk($a, function (&$address) use ($sea) {
                    $arr = $sea->splitEmailAddress($address);
                    $address = $arr['email'];
                });
                $addresses = array_merge($addresses, $a);
            }
            foreach ( $addresses as $address ) {
                if ( $address == $email ) {
                    $html .= display_single_update_email($update, $hideImage);
                    break;        
                }
            }

        }

    }
    $html .= "</div>";
    $html .= quick_edit_case_updates($focus);
    return $html;
}

/**
 * @return mixed|string|void
 */
function display_update_form($type = 'EditView')
{
    global $mod_strings, $app_strings;
    $sugar_smarty = new Sugar_Smarty();
    $sugar_smarty->assign('MOD', $mod_strings);
    $sugar_smarty->assign('APP', $app_strings);

    if ($type == 'DetailView') {
        $sugar_smarty->assign('ViewType', 'DetailView');
        $sugar_smarty->assign('FormName', 'case_updates_form');
    } else {
        $sugar_smarty->assign('ViewType', 'EditView');
        $sugar_smarty->assign('FormName', 'EditView');
    }

    return $sugar_smarty->fetch('modules/AOP_Case_Updates/tpl/caseUpdateForm.tpl');
}

/**
 * @param SugarBean $update
 *
 * @return string - html to be displayed
 */
function getUpdateDisplayHead(SugarBean $update)
{
    global $mod_strings;
    if ($update->contact_id) {
        $name = $update->getUpdateContact()->name;
    } elseif ($update->object_name == 'Email' AND ($update->type == 'out' OR $update->type == 'inbound') ) {
        // Для исходящих писем
        $name = $update->assigned_user_name;
    }elseif($update->assigned_user_id){
        $name = $update->getUpdateUser()->name;
    } else {
        $name = 'Unknown';
    }
    $html = "<a href='' onclick='toggleCaseUpdate(\"".$update->id."\");return false;'>";
    $html .= "<img  id='caseUpdate".$update->id."Image' class='caseUpdateImage' src='".SugarThemeRegistry::current()->getImageURL('basic_search.gif')."'>";
    $html .= "</a>";
    if(isset($update->internal)) {
        $html .= "<span>" . ($update->internal ? "<strong>" . $mod_strings['LBL_INTERNAL'] . "</strong> " : '') . $name . " " . $update->date_entered . "</span><br>";
    } else {
        $html .= "<span>" . $name . " " . $update->date_entered . "</span><br>";
    }

    $notes = $update->get_linked_beans('notes','Notes');
    if($notes){
        $html.= $mod_strings['LBL_AOP_CASE_ATTACHMENTS'];
        foreach($notes as $note){
            //$html .= "<a href='index.php?module=Notes&action=DetailView&record={$note->id}'>{$note->filename}</a>&nbsp;";
            if(preg_match("|\.pdf$|is", $note->filename)) {
                // Если вложение - PDF-файл
                // Ставим сразу ссылку на скачивание
                $html .= "<a href='index.php?entryPoint=download&id={$note->id}&type=Notes&inPage=true&ContentType=application/PDF' target='_blank'>{$note->filename}</a>&nbsp;";
            } else {
                // Все остальные вложнения-некартинки
                // Ставим сразу ссылку на скачивание
                $html .= "<a href='index.php?entryPoint=download&id={$note->id}&type=Notes'>{$note->filename}</a>&nbsp;";
            }
        }
    }

    return $html;
}

function displayAttachedImages($update){
    global $sugar_config;
    $html = '';
    $notes = $update->get_linked_beans('notes','Notes');
    if($notes){
        $html.= $mod_strings['LBL_AOP_CASE_ATTACHMENTS'];
        foreach($notes as $note){
            if(preg_match("/(\.png|\.jpg|\.jpeg|\.gif)$/is", $note->filename) )  {
                $html .= "<a href='{$sugar_config['site_url']}/upload/{$note->id}' data-lightbox='attachement' class='thumb_link'><img class='attachment_thumb' src='{$sugar_config['site_url']}/upload/{$note->id}'/></a>";
            }
        }
    }
    return $html;
}

/**
 * Gets a single update and returns it.
 *
 * @param AOP_Case_Updates $update
 *
 * @return string - the html for the update
 */
function display_single_update(AOP_Case_Updates $update)
{

    /*if assigned user*/
    if ($update->assigned_user_id) {
        /*if internal update*/
        if ($update->internal) {
            $html = "<div id='caseStyleInternal'>" . getUpdateDisplayHead($update);
            $html .= "<div id='caseUpdate" . $update->id . "' class='caseUpdate'>";
            $html .= (html_entity_decode($update->description));
            $html .= displayAttachedImages($update);
            $html .= '</div></div>';

            return $html;
        } /*if standard update*/ else {
            $html = "<div id='lessmargin'><div id='caseStyleUser'>" . getUpdateDisplayHead($update);
            $html .= "<div id='caseUpdate" . $update->id . "' class='caseUpdate'>";
            $html .= (html_entity_decode($update->description));
            $html .= displayAttachedImages($update);
            $html .= '</div></div></div>';

            return $html;
        }
    }

    /*if contact user*/
    if($update->contact_id){
        $html = "<div id='extramargin'><div id='caseStyleContact'>".getUpdateDisplayHead($update);
        $html .= "<div id='caseUpdate".$update->id."' class='caseUpdate'>";
        $html .= (html_entity_decode($update->description));
        $html .= displayAttachedImages($update);
        $html .= "</div></div></div>";
        return $html;
    }

}

/**
 * Gets a single update and returns it
 *
 * @param AOP_Case_Updates $update
 * @return string - the html for the update
 */
function display_single_update_email(Email $update){

    /*if assigned user*/
    if($update->assigned_user_id){
        $html = "<div id='lessmargin'><div id='caseStyleUser'>" . getUpdateDisplayHead($update);
        $html .= "<div id='caseUpdate" . $update->id . "' class='caseUpdate'>";
        $html .= (html_entity_decode($update->description));
        $html .= displayAttachedImages($update);
        $html .= "</div></div></div>";
        return $html;
    }

    /*if contact user*/
    if($update->contact_id){
        $html = "<div id='extramargin'><div id='caseStyleContact'>".getUpdateDisplayHead($update);
        $html .= "<div id='caseUpdate".$update->id."' class='caseUpdate'>";
        $html .= (html_entity_decode($update->description));
        $html .= displayAttachedImages($update);
        $html .= "</div></div></div>";
        return $html;
    }

}

/**
 * Displays case attachments.
 *
 * @param $case
 *
 * @return string - html link
 */
function display_case_attachments($case)
{
    $html = '';
    $notes = $case->get_linked_beans('notes','Notes');
    if($notes){
        foreach($notes as $note){
            //$html .= "<a href='index.php?module=Notes&action=DetailView&record={$note->id}'>{$note->filename}</a>&nbsp;";
            if(preg_match("|\.pdf$|is", $note->filename)) {
                // Если вложение - PDF-файл
                // Ставим сразу ссылку на скачивание
                $html .= "<a href='index.php?entryPoint=download&id={$note->id}&type=Notes&inPage=true&ContentType=application/PDF' target='_blank'>{$note->filename}</a>&nbsp;";
            } else {
                // Все остальные вложнения-некартинки
                // Ставим сразу ссылку на скачивание
                $html .= "<a href='index.php?entryPoint=download&id={$note->id}&type=Notes'>{$note->filename}</a>&nbsp;";
            }
        }
    }

    return $html;
}

/**
 * The Quick edit for case updates which appears under update stream
 * Also includes the javascript for AJAX update.
 *
 * @param $case
 *
 * @return string - the html to be displayed and javascript
 */
function quick_edit_case_updates($case)
{
    global $action, $app_strings, $mod_strings;

    //on DetailView only
    if ($action !== 'DetailView') {
        return;
    }

    //current record id
    $record = $_GET['record'];

    //Get Users roles
    require_once 'modules/ACLRoles/ACLRole.php';
    $user = $GLOBALS['current_user'];
    $id = $user->id;
    $acl = new ACLRole();
    $roles = $acl->getUserRoles($id);

    //Return if user cannot edit cases
    if ($roles === 'no edit cases' || in_array('no edit cases', $roles)) {
        return '';
    }
    //$internalChecked = '';
    //if (isset($case->internal) && $case->internal) {
        $internalChecked = "checked='checked'";
    //}
    $internal = $mod_strings['LBL_AOP_INTERNAL'];
    $saveBtn = $app_strings['LBL_SAVE_BUTTON_LABEL'];
    $saveTitle = $app_strings['LBL_SAVE_BUTTON_TITLE'];

    $update_file_html = display_update_form('DetailView');

    $html = <<< EOD
    
    <form id='case_updates' name='case_updates_form' enctype="multipart/form-data">

    <div><label for="update_text">{$mod_strings['LBL_UPDATE_TEXT']}</label></div>
    <textarea id="update_text" name="update_text" cols="80" rows="4"></textarea>

    <div><label>{$mod_strings['LBL_INTERNAL']}</label>
    <input id='internal' type='checkbox' name='internal' tabindex=0 title='' value='1' $internalChecked ></input>
    </div>
    
    <div><label for='case_update_form'>{$mod_strings['LBL_CASE_UPDATE_FORM']}</label><br />
        {$update_file_html}
    </div>
    
    
    <input type='button' value='$saveBtn' onclick="caseUpdates('$record')" title="$saveTitle" name="button"> </input>


    </br>
    </form>


EOD;

    return $html;
}
