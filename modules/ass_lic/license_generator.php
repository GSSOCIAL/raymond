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
    //Get hardware
    if(empty(trim($focus->hard_id)) || empty($focus->name)){
        $should_display = false;
    }
    
    $smarty->assign("hardware_id",$focus->id);
    $smarty->assign("display",$should_display);
    $smarty->assign("licenses",$licenses);
    //Setup access
    $smarty->assign("ACL_EDIT",ACLController::checkAccess("ass_lic","edit",true,"module",true));
    //Default
    $end_date_default = strtotime("+ 400 days");
    $end_date_default = date("Y-m-d",$end_date_default);
    $smarty->assign("end_date_default",$end_date_default);
    
    return $smarty->fetch("modules/ass_lic/tpls/license.tpl");
}