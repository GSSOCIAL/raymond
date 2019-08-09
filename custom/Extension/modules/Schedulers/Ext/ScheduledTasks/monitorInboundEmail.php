<?php 
 //WARNING: The contents of this file are auto-generated

 
/*
https://trello.com/c/ZSsv4opE
Check if Inbound Emails works. Send and compare emails for spec keys

CREATE TABLE SYNTAX - important
CREATE TABLE `dcmsys`.`verification_keys` ( `id` INT(12) UNSIGNED NOT NULL AUTO_INCREMENT , `code` VARCHAR(32) NOT NULL , `thru` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `activated` BOOLEAN NOT NULL DEFAULT FALSE ,`bean` VARCHAR(42) NULL, PRIMARY KEY (`id`)) ENGINE = InnoDB;
*/ 
$job_strings[] = 'monitorInboundEmail';
function monitorInboundEmail(){
    require_once('include/SugarPHPMailer.php');  
    global $db;
    $InboundSystemAddressPrefs = getEmailVerifierAddr(true);
    $Subject = "Inbound Email Verification"; //Letter subject. We will compare incoming mail subjects with this one
    $DDATA = array(
        "mailbox_access"=>false,
        "has_unread_messages"=>false
    );
    $KeysTableExist = $db->query("DESCRIBE `verification_keys`");
    $DDATA["table_exist"] = $KeysTableExist !== false;
    $VerificationPassed=false;
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
                // get all the keys which are msgnos;
                $newMsgs = array_keys($msgNoToUIDL);
            }
            if($ieX->connectMailserver() == 'true'){
                $connectToMailServer = true;
            }
            if($connectToMailServer){
                $DDATA["mailbox_access"]=true;
                if(!$ieX->isPop3Protocol()) {
                    $newMsgs = $ieX->getNewMessageIds();
                }
                if(is_array($newMsgs)){
                    $DDATA["has_unread_messages"]=true;
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
                                if($out && count($out)>2){
                                    $record = is_array($out[1])?$out[1][0]:$out[1];
                                    $code = is_array($out[2])?$out[2][0]:$out[2];
                                    //Second type. Find code & record 
                                    if($key_id = $db->getOne(sprintf("SELECT k.id FROM verification_keys k WHERE k.code='%s' AND k.activated=0 AND k.bean='%s'",md5($code),$record))){
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
            }
        }
        imap_expunge($ieX->conn);
        imap_close($ieX->conn, CL_EXPUNGE);
        //Checked. Send new code
        $code = generateCode();
        if(!$db->query(sprintf("INSERT INTO `verification_keys`(`code`,`thru`) VALUES ('%s','%s')",md5($code),date("Y-m-d H:i:s",strtotime("+3 hours"))))){
            $GLOBALS["log"]->error("INBOUND EMAIL VERIFY Error - Couldnt save key");
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
    }
    if(!$VerificationPassed){
        $GLOBALS["log"]->error("Monitor Inbound emails failed.  Couldnt verify code");
        $Email = new Email();  
        $defaults = $Email->getSystemDefaultEmail();  
        $system_mail = new SugarPHPMailer();  
        $system_mail->setMailerForSystem();  
        $system_mail->From = $defaults['email'];  
        $system_mail->FromName = $defaults['name'];  
        $system_mail->Subject = "Inbound mailboxes error. Couldnt verify code";
        $Body = "System cant verify mailboxes. Please check that email service works and contact administrator.\n\nDebug data:\n";
        $Body .= "email account: ".(!empty($InboundSystemAddressPrefs)?$InboundSystemAddressPrefs->addr . " ({$InboundSystemAddressPrefs->id})":" EMPTY")."\n";
        $Body .= "mailbox access: ".($DDATA["mailbox_access"]===true?"y":"n")."\n";
        $Body .= "unread messages: ".($DDATA["has_unread_messages"]===true?"y":"n")."\n";
        $Body .= "key table exists: ".($DDATA["table_exist"]===true?"y":"n")."\n";
        $system_mail->Body = $Body;
        $system_mail->prepForOutbound();  
        $system_mail->AddAddress($defaults['email']);  
        @$system_mail->Send();
        echo("Email settings fault to verify. Please contact administrator");
    }else{
        echo("Email settings verified success");
    }
    return true;
}

?>