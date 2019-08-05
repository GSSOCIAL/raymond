<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
$allowed_methods = array(
    "export"=>true
);
$response = array(
    "status"=>false,
    "errors"=>array(),
    "message"=>"",
    "body"=>"",
    "request"=>array(
        "method"=>""
    )
);
if(!empty($allowed_methods[$_REQUEST["method"]])&&$allowed_methods[$_REQUEST["method"]]===true){
    $response["request"]["method"] = $_REQUEST["method"];
    switch($_REQUEST["method"]){
        case "export":
            require_once "custom/include/beanExport.php";
            if(empty($_REQUEST["mod"]) || empty($_REQUEST["record"]) || empty($_REQUEST["to_format"])){
                $response["errors"][] = $response["message"] = "Required arguments dont passed";
                $GLOBALS["log"]->error("BeanExport fault: Required arguments dont passed. modules/Home/beanServer.php at 23");
                exit(json_encode($response));
            }
            if(array_search($_REQUEST["to_format"],BeanExport::extension_supported)===false){
                $response["errors"][] = $response["message"] = "Extension \"{$_REQUEST['to_format']}\" not supported";
                $GLOBALS["log"]->error(sprintf("BeanExport fault: Extension \"{$_REQUEST['to_format']}\" not supported! Supported: %s. modules/Home/beanServer.php at 28",implode(",",array_values(BeanExport::extension_supported))));
                exit(json_encode($response));
            }
            $BeanExport = new BeanExport($_REQUEST["mod"],$_REQUEST["record"]);
            $BeanExport->force_download = !empty($_REQUEST["download"]) && $_REQUEST["download"] == "true";
            if($content = $BeanExport->{"to_".$_REQUEST["to_format"]}()){
                $response["status"] = true;
                $response["body"]=$content;
                $response["request"]["record_id"]=$_REQUEST["record"];
                $response["request"]["module"]=$_REQUEST["mod"];
                $response["request"]["extension"]=$_REQUEST["to_format"];
            }else{
                $response["errors"][] = $response["message"] = "Couldnt export bean.";
                exit(json_encode($response));
            }
        break;
    }
}else{
    $response["errors"][] = $response["message"] = "Unexpected method passed";
}
exit(json_encode($response));
?>