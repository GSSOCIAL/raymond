<?php
class Customass_hardwareController extends SugarController{
    /**
     * Save license file
     */
    function action_update_license(){
        if(array_key_exists("record",$_REQUEST)){
            $focus = BeanFactory::getBean("ass_hardware",$_REQUEST["record"]);
            if($focus instanceof ass_hardware){
                $body = file_get_contents("php://input");
                if(strpos($body,".days")!==false){
                    $focus->license = $body;
                    $focus->save();

                    echo(json_encode(array(
                        "result"=>true
                    )));
                    exit();
                }
            }
        }
        echo(json_encode(array(
            "result"=>false
        )));
        exit();
    }

    /**
     * Generate license
     */
    function action_generate_license(){
        global $current_user;
        if(!is_array($_REQUEST) || !array_key_exists("record",$_REQUEST)){
            echo(json_encode(array(
                "result"=>false,
                "description"=>"hardware instance doesnt passed in request"
            )));
            die();
        }

        $bean = BeanFactory::getBean("ass_hardware",$_REQUEST["record"]);
        if(!empty($bean) && $bean instanceof ass_hardware && !empty($bean->id)){
            $dir = "/var/www/html/upload/licenses";
            $__dir="";
            foreach(explode("/",$dir) as $path){
                $__dir .= $path."/";
                if(!file_exists($__dir)){
                    mkdir($__dir);
                }
            }

            if(empty($bean->hard_id)){
                echo(json_encode(array(
                    "result"=>false,
                    "description"=>"'hardware id' field couldn't be empty"
                )));
                die();
            }

            //Create new license file
            $license = BeanFactory::newBean("ass_lic");
            $license->name = $bean->name;
            $license->hard_id = $bean->hard_id;
            $license->ass_hardware_ass_licass_hardware_ida = $bean->id;
            $license->end_date = date("Y-m-d",strtotime("+3 days",strtotime("+ {$_REQUEST['days']} days",strtotime($_REQUEST['start_date']))));
            
            $name = trim(preg_replace('/[\W\s]/',"_",$bean->name));
            $hard_id = trim($bean->hard_id);

            $filename_parts = array(
                $bean->name,
                $current_user->user_name,
                $_REQUEST['days'],
                date("Y-m-d",strtotime($_REQUEST['start_date'])),
                $license->end_date
            );
            $filename = implode("_",$filename_parts);
            $filename = trim(str_replace(array(";","/"," ","\\"),array("_","_","_","_"),$filename)); 

            $file = $dir."/".$filename.".license";
            
            $context = file_get_contents("php://input");
            if(strpos($context,".days")!==false){
                $license->filename = $filename;
                $license->file_generated = true; //Recursion - Add flag that file created to skip.
                $license->save();
                $license->skip_log = true;

                $cmd = "cd /home/genlic2; ./genlic {$bean->hard_id} {$context} {$file}";
                $license->lic_key = $cmd;

                $logfile=fopen("/var/www/html/genlic.log","a+");
                fwrite($logfile,$cmd);
                exec($cmd);
                if(file_exists($file)){
                    //Сохраняем
                    $bean->license = $context;
                    $bean->save();

                    $license->lic_key = file_get_contents($file);
                    $license->save();
                    echo(json_encode(array(
                        "result"=>true
                    )));
                    die();
                }else{
                    echo(json_encode(array(
                        "result"=>false,
                        "description"=>"could fetch generated file - {$file}"
                    )));
                    die();
                }
            }else{
                echo(json_encode(array(
                    "result"=>false,
                    "description"=>"invalid license context format"
                )));
                die();
            }
        }
        echo(json_encode(array(
            "result"=>false,
            "description"=>"could retrieve hardware record - {$_REQUEST['record']}"
        )));
        die();
    }

    /**
     * List available licenses
     */
    function action_getLicenses(){
        global $db,$current_user;
        $licenses = array();
    
        if($this->bean){
            $list = $db->query("SELECT l.id,l.name,
            IF(l.created_by='{$current_user->id}','1','0') AS `is_owner` 
            FROM ass_lic l 
            INNER JOIN ass_hardware_ass_lic_c hal ON l.id=hal.ass_hardware_ass_licass_lic_idb AND hal.deleted=0
            WHERE l.deleted=0
            AND hal.ass_hardware_ass_licass_hardware_ida='{$this->bean->id}'
            ORDER BY l.date_entered DESC",true);
            if($list){
                while($row = $db->fetchByAssoc($list)){
                    if(!ACLController::checkAccess("ass_lic","view",$row["is_owner"]=="1")) continue;
                    $row["access"]=array(
                        "delete"=>ACLController::checkAccess("ass_lic","delete",$row["is_owner"]=="1"),
                        "export"=>ACLController::checkAccess("ass_lic","export",$row["is_owner"]=="1"),
                        "view"=>ACLController::checkAccess("ass_lic","view",$row["is_owner"]=="1")
                    );
                    $licenses[]=$row;
                }
            }
        }

        echo(json_encode($licenses));
        die();
    }
}