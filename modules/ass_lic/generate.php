<?php
/**
 *  Generate new license file.
 *  POST params accepted from POST Body as decoded JSON string
 *  Required data:
 *      name: serial
 *      id: hardware id
 *      end_date: end license date (yyyy-mm-dd)
 *      type: array of hardware licenses types
 *      duraction: number of days of license duraction
 *  Other fields:
 *      hardware_id: record id of hardware mod. If passed - will attach license to hardware
 *  Body Example:
 *  {
 *      "name":"\nE2860HA-0010-EP\n",
 *      "id":"\n44\n",
 *      "end_date":"",
 *      "type":null,
 *      "duraction":"",
 *      "hardware_id":"68aa68f4-84cb-8d97-0e41-5d0b5f398e7c"
 *  }
 *  if success - return new license record id
 */
$data = json_decode(file_get_contents('php://input'));
$response = array(
    "status"=>false,
    "message"=>"",
    "errors"=>array(),
);
//Bean id doesnt passed - create new record
if(empty($_REQUEST["bean_id"])){
    global $current_user;

    //Check for required fields.
    foreach(array(
        "name"=>"text",
        "id"=>"text",
        "end_date"=>"date",
        "type"=>"array",
        "duraction"=>"number") as $field=>$type){
        if(empty($data->{$field})){
            $response["errors"][] = "Field \"{$field}\" doesnt passed or empty!";
            continue;
        }
        switch($type){
            case "array":
                if(!is_array($data->{$field})){
                    $response["errors"][] = "Field \"{$field}\" must be array, ".gettype($data[$field])." passed";
                    continue;
                }
            break;
        }
    }
    if(count($response["errors"])>0){
        $response["message"] = "Validation errors.";
        exit(json_encode($response));
    }
    //All fields ok - filter fields
    foreach($data as $k=>$v){
        switch($k){
            case "name":
            case "hardware_id":
                $data->{$k} = trim(str_replace(array("\n","<br/>"),array("",""),$v));
            break;
        }
    }
    //Create record.
    $License = BeanFactory::newBean("ass_lic");
    $License->assigned_user_id = $current_user->id;
    
    $License->hard_id=$data->id;

    if(!empty($data->duraction) && intval($data->duraction)>0){
        $License->end_date=date("Y-m-d",strtotime("+ {$data->duraction} days"));
    }else{
        $License->end_date=$data->end_date;
    }

    if(!empty($data->hardware_id)){
        $License->ass_hardware_ass_licass_hardware_ida=$data->hardware_id;
    }

    $License->lic_type="^".implode("^,^",$data->type)."^";
    
    $name = array();
    //Generate serial
    $duraction = 0;
    $t1 = new DateTime(date("Y-m-d",strtotime("today")));
    $t2 = new DateTime(date("Y-m-d",strtotime($License->end_date)));
    $diff = $t1->diff($t2);
    
    $types = "";
    foreach($data->type as $index){
        $types .= $index;
    }
    
    $name[] = $current_user->full_name;
    $name[] = $data->name; //Hardware serial #
    $name[]=str_replace(" ","",$types); //Add Type
    $name[]=$diff->days; //Add Duraction
    $name[]=date("dmY");
    $name[]=date("dmY",strtotime($License->end_date));

    $License->name=implode("_",$name);

    if($id = $License->save()){
        make_license($License,array());

        //Write log
        print_log(array(
            "action"=>"generate",
            "id"=>$id,
            "user"=>"{$current_user->full_name} ({$current_user->id})",
            "serial"=>$data->name,
            "hardware_id"=>trim($data->id),
            "date"=>date("d.m.Y"),
            "to"=>date("d.m.Y",strtotime($License->end_date)),
            "types"=>$data->type,
            "duraction"=>$diff->days
        ),"licenses");

        $response["status"]=true;
        $License = $License->retrieve($id);
        $response["body"]=array(
            "id"=>$id,
            "name"=>$License->name,
            "access"=>array(
                "delete"=>ACLController::checkAccess("ass_lic","delete",true)?"1":"0",
                "view"=>ACLController::checkAccess("ass_lic","view",true)?"1":"0",
                "export"=>ACLController::checkAccess("ass_lic","export",true)?"1":"0",

            )
        );
    }
}
exit(json_encode($response));