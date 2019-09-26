<?php
require_once('include/SugarFields/SugarFieldHandler.php');

function display($focus, $field, $value, $view){
    $smarty = new Sugar_Smarty();
    $Ass_Lic = new ass_lic();
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
    global $db;
    $list = $db->query(
        "SELECT l.id,l.name FROM ass_lic l 
        INNER JOIN ass_hardware_ass_lic_c hal ON l.id=hal.ass_hardware_ass_licass_lic_idb AND hal.deleted=0
        WHERE l.deleted=0
        AND hal.ass_hardware_ass_licass_hardware_ida='{$focus->id}'
        ORDER BY l.date_entered DESC");
    if($list){
        while($row = $db->fetchByAssoc($list)){
            $licenses[]=$row;
        }
    }
    $smarty->assign("licenses",$licenses);
    return $smarty->fetch("modules/ass_lic/tpls/license.tpl");
}