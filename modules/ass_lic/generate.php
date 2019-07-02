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
    $License->name=$data->name;
    $License->hard_id=$data->id;
    $License->end_date=$data->end_date;
    if(!empty($data->hardware_id)){
        $License->ass_hardware_ass_licass_hardware_ida=$data->hardware_id;
    }
    $License->lic_type="^".implode("^,^",$data->type)."^";
    if($id = $License->save()){
        $response["status"]=true;
        $response["body"]=array(
            "id"=>$id,
            "name"=>$data->name
        );
    }
}
exit(json_encode($response));