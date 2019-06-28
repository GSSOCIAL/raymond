<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
/**
 * Download license file
 */
if(empty($_REQUEST["record"])){
    exit(json_encode(array("status"=>false,"message"=>"record not defined")));
}
$record = $_REQUEST["record"];
$response = array(
    "status"=>false,
    "record_id"=>$record,
    "message"=>null
);
$License = BeanFactory::getBean("ass_lic",$_REQUEST["record"]);
if($License){
    switch($_REQUEST["method"]){
        case "download":
            header("Content-type: text/plain");
            header("Content-Disposition: attachment; filename={$License->name}_license.txt");
            print htmlspecialchars_decode($License->lic_key);
            exit();
        break;
        case "get":
            $response["body"] = htmlspecialchars_decode($License->lic_key);
            $response["status"] = true;
        break;
    }
}
exit(json_encode($response));