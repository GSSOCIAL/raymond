<?php
/**
 * Generate license file from record
 * @param $bean License record object
 * @param Array $args Optional params (duraction)
 * @return Boolean Result
 */
function make_license($bean,$args){
    //Setups
    $dir = "upload/licenses";
    $__dir="";
    foreach(explode("/",$dir) as $path){
        $__dir .= $path."/";
        if(!file_exists($__dir)){
            mkdir($__dir);
        }
    }
    if(empty($bean->lic_key) && !empty($bean->name) && !empty($bean->hard_id) && !empty($bean->end_date) && !empty($bean->lic_type) ){
        //License expires interval
        $datetime1 = new DateTime('now');
        if(empty($args["duraction"]) ||  intval($args["duraction"]) <= 0){
            $datetime2 = date_create_from_format('Y-m-d',$bean->end_date);
        }else{
            $datetime2 = date_create_from_format("Y-m-d",date("Y-m-d",strtotime("+ {$args['duraction']}days")));
        }
        $diff = $datetime1->diff($datetime2);
        $interval = $diff->format('%a');
        $lic_type = str_replace('^', '', $bean->lic_type);
        $lic_type = str_replace(',', ' ', $lic_type);
        $id = $bean->id;
        $filename = "{$bean->name}_{$diff->days}_{$bean->end_date}";
        $file = $dir."/".$filename.".license";
        $cmd = "for i in {$lic_type}; do echo \"------\"; cd /home/genlic; ./genlic -C {$bean->name} -H {$bean->hard_id} -P \$i -D {$interval} ;done > ".$file;
        $bean->lic_key = $cmd;
        exec($cmd);
        if(file_exists($file)) {
            $bean->lic_key = file_get_contents($file);
        }
        return true;
    }
    return false;
}