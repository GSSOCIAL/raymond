<?php
/**
 *  Custom AJAX methods
 *  POST params accepted from POST Body as decoded JSON string
 *  Required $_REQUEST data:
 *      method: string
 */
$data = json_decode(file_get_contents('php://input'));
$response = array(
    "status"=>false,
    "message"=>"",
    "errors"=>array(),
    "body"=>null,
    "request"=>null
);
if(empty($_REQUEST["method"])){
    
}else{
    $response["request"] = array(
        "method"=>$_REQUEST["method"],
        "input"=>array()
    );
    switch($_REQUEST["method"]){
        /**
         * Will delete records and license files
         */
        case "delete":
            $ids = $data->ids;
            if(empty($ids)){
                $response["errors"][] = "Ids doesnt passed";
                $response["message"] = "Required param dont passed";
            }else{
                if(!is_array($ids)){
                    $ids = array($ids);
                }
                global $db;
                //Delete records
                $string_ids = "'".implode("','",$ids)."'";
                $query = $db->query("DELETE FROM `ass_lic` WHERE `id` IN ({$string_ids})");
                //Delete license files
                $dir = "upload/licenses";
                foreach($ids as $id){
                    if(file_exists("{$dir}/{$id}.license")){
                        unlink("{$dir}/{$id}.license");
                    }
                }
                $response["status"] = true;
                $response["request"]["input"]["ids"] = $ids;
            }
        break;
        /**
         * Return license file content
         */
        case "get":
            $ids = $data->ids;
            if(empty($ids)){
                $response["errors"][] = "Ids doesnt passed";
                $response["message"] = "Required param dont passed";
            }else{
                if(!is_array($ids)){
                    $ids = array($ids);
                }
                global $db;
                $string_ids = "'".implode("','",$ids)."'";
                $query = $db->query("SELECT l.lic_key,l.id,l.name FROM ass_lic l WHERE l.id IN ({$string_ids}) AND l.deleted=0");
                if($query){
                    $response["body"] = array();
                    while($row = $db->fetchByAssoc($query)){
                        $response["body"][$row["id"]] = array(
                            "name"=>$row["name"],
                            "key"=>htmlspecialchars_decode($row["lic_key"])
                        );
                    }
                    $response["status"] = true;
                    $response["request"]["input"]["ids"] = $ids;
                }
            }
        break;
        case "generate":
        break;
    }
}
exit(json_encode($response));