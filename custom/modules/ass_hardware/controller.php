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

            $filename = "{$name}_{$license->end_date}";
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
                if(file_exists($file)) {
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
}