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
            if(!empty($License->filename) && file_exists("/var/www/html/upload/licenses/{$License->filename}.license")){
                header("Content-Disposition: attachment; filename={$License->filename}.license");
            
                print htmlspecialchars_decode($License->lic_key);
                exit();
            }else{
                header("Content-Disposition: attachment; filename={$License->name}.license");
            
                print htmlspecialchars_decode($License->lic_key);
                exit();
            }
        break;
        case "get":
            if(!empty($License->filename) && file_exists("/var/www/html/upload/licenses/{$License->filename}.license")){
                $response["body"] = htmlspecialchars_decode(file_get_contents("/var/www/html/upload/licenses/{$License->filename}.license"));
            }else{
                $response["body"] = htmlspecialchars_decode($License->lic_key);
            }
            $response["status"] = true;
        break;
    }
}
exit(json_encode($response));