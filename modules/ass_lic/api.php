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
        case "calc_end_date":
            switch($data->focus){
                case "expires":
                    if($end_point=strtotime("+ {$data->duraction} days")){
                        $response["status"]=true;
                        $response["body"]=array(
                            "time"=>$end_point,
                            "type"=>"expires",
                            "date"=>date("Y-m-d",$end_point)
                        );
                    }else{
                        $response["message"] = "Could create date";
                    }
                break;
                case "end_date":
                    if($end_point = strtotime($data->end_date)){
                        $d1 = new DateTime(date("Y-m-d",strtotime("today")));
                        $d2 = new DateTime(date("Y-m-d",$end_point));
                        $diff = $d1->diff($d2);
                        //The end date is earlier than today.
                        if($diff->invert){
                            $response["status"] = true;
                            $response["body"]=array(
                                "duraction"=>0
                            );
                        }else{
                            $response["status"] = true;
                            $response["body"]=array(
                                "duraction"=>$diff->days,
                                "type"=>"end_date"
                            );
                        }
                    }else{
                        $response["message"] = "Could convert end date";
                    }
                break;
            }
        break;
    }
}
exit(json_encode($response));