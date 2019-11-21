<?php
require_once('include/SugarFields/SugarFieldHandler.php');

function display($focus, $field, $value, $view){
    global $current_user;
    
    $smarty = new Sugar_Smarty();
    $Ass_Lic = new ass_lic();
    $should_display = true; //Define if panel should display
    $fields = array(
        "end_date",
        "license_expires"=>array(
            "label"=>"Number of days"
        ),
        "lic_type"
    );
    global $mod_strings,$app_list_strings;
    foreach($fields as $name=>$obj){
        if(is_array($obj)){
            continue;
        }
        $properties = $Ass_Lic->field_name_map[$obj];
        $properties["label"]=translate($Ass_Lic->field_name_map[$obj]["vname"],"ass_lic");
        if($Ass_Lic->field_name_map[$obj]["type"] == "enum" || $Ass_Lic->field_name_map[$obj]["type"] == "multienum"){
            //Parse options
            if(!empty($app_list_strings[$Ass_Lic->field_name_map[$obj]["options"]])){
                $properties["list"] = $app_list_strings[$Ass_Lic->field_name_map[$obj]["options"]];
            }
        }
        unset($fields[$name]);
        $fields[$obj] = $properties;
    }
    $smarty->assign("fields",$fields);
    //Get list of licenses
    $licenses = array();
    global $db,$current_user;
    
    $list = $db->query("SELECT l.id,l.name,
        IF(l.created_by='{$current_user->id}','1','0') AS `is_owner` 
        FROM ass_lic l 
        INNER JOIN ass_hardware_ass_lic_c hal ON l.id=hal.ass_hardware_ass_licass_lic_idb AND hal.deleted=0
        WHERE l.deleted=0
        AND hal.ass_hardware_ass_licass_hardware_ida='{$focus->id}'
        ORDER BY l.date_entered DESC",true);
    if($list){
        while($row = $db->fetchByAssoc($list)){
            if(!ACLController::checkAccess("ass_lic","view",$row["is_owner"]=="1")) continue;
            $row["access"]=array(
                "delete"=>ACLController::checkAccess("ass_lic","delete",$row["is_owner"]=="1"),
                "export"=>ACLController::checkAccess("ass_lic","export",$row["is_owner"]=="1"),
                "view"=>ACLController::checkAccess("ass_lic","view",$row["is_owner"]=="1")
            );
            $licenses[]=$row;
        }
    }
    //Get hardware
    if(empty(trim($focus->hard_id)) || empty($focus->name)){
        $should_display = false;
    }
    
    $smarty->assign("display",$should_display);
    $smarty->assign("licenses",$licenses);
    //Setup access
    $smarty->assign("ACL_EDIT",ACLController::checkAccess("ass_lic","edit",true,"module",true));
    return $smarty->fetch("modules/ass_lic/tpls/license.tpl");
}