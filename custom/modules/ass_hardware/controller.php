<?php
class Customass_hardwareController extends SugarController{
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
}