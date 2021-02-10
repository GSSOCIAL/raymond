<?php

/**
 * Render updated (advanced) licenses generator application
 * @param SugarBean $bean 
 * @return String HTML field container;
 */
function displayAdvancedLicenseGenerator($bean){
    $s = new Sugar_Smarty();
    if($bean instanceof ass_hardware){
        $s->assign("HARDWARE_ID",$bean->hard_id);
        $s->assign("RECORD_ID",$bean->id);
        $s->assign("SERIAL",$bean->name);
        $license = str_replace("&quot;","",$bean->license);
        
        $s->assign("LICENSE",$license);
        $s->assign("OFFSET_DATE",date("Y-m-d",strtotime("+1 year")));
        $s->assign("CURRENT_DATE",date("Y-m-d"));
        return $s->fetch("custom/modules/ass_lic/tpls/advanced_generator.tpl");
    }
    return "invalid function call";
    return NULL;
}