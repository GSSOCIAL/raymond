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
                global $db,$current_user;

                //Delete
                foreach($ids as $id){
                    $License = BeanFactory::newBean("ass_lic",$id);
                    $License->mark_deleted($id);
                    $License->save();
                }
                
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
                $query = $db->query("SELECT l.filename,l.id,l.name FROM ass_lic l WHERE l.id IN ({$string_ids}) AND l.deleted=0",true);
                if($query){
                    $response["body"] = array();
                    while($row = $db->fetchByAssoc($query)){
                        if(file_exists("/var/www/html/upload/licenses/{$row['filename']}.license")){
                            $response["body"][$row["id"]] = array(
                                "name"=>$row["name"],
                                "key"=>htmlspecialchars_decode(file_get_contents("/var/www/html/upload/licenses/{$row['filename']}.license"))
                            );
                        }
                    }
                    if(!empty($response["body"])){
                        $response["status"] = true;
                    }
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
        case "download_log":
            require_once "custom/include/CSV.php";

            global $db;
            $CSV_Table = new CSV_Manager();

            $id = !empty($_REQUEST["license"])?$_REQUEST["license"]:1;

            //Add table head
            $CSV_Table->addHeader(array(
                "Date","Action","Hardware id","Serial","End date","Types","Filename","User id"
            ));
            if($rows_q = $db->query("SELECT t.registred,t.action,t.hard_id,t.serial,t.valid_to,t.types,t.filename,t.user_id FROM licenses_log t WHERE t.license_id='{$id}'",true)){
                while($row = $db->fetchByAssoc($rows_q)){
                    $CSV_Table->addRow($row);
                }
            }

            //Print as file
            ob_clean();
            ob_start();
            $now = gmdate("D, d M Y H:i:s");
            header('Content-Type: text/xml, charset=UTF-8; encoding=UTF-8');
            header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
            header("Cache-Control: max-age=0, no-cache, must-revalidate, proxy-revalidate");
            header("Last-Modified: {$now} GMT");
            header("Content-Disposition: attachment;filename={$id}.csv");
            header("Content-Transfer-Encoding: binary");

            echo(iconv("UTF-8","cp1251",$CSV_Table->get()));

            exit(ob_get_clean());
            return ob_get_clean();
        break;
    }
}
exit(json_encode($response));