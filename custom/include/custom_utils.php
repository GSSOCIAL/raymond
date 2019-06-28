<?php

function replace4byte($string) {
    return preg_replace('%(?:
          \xF0[\x90-\xBF][\x80-\xBF]{2}      # planes 1-3
        | [\xF1-\xF3][\x80-\xBF]{3}          # planes 4-15
        | \xF4[\x80-\x8F][\x80-\xBF]{2}      # plane 16
    )%xs', '', $string);
}

/**
 * Generate license file from record
 * @param $bean 
 */
function make_license($bean){
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
        $datetime2 = date_create_from_format('Y-m-d', $bean->end_date);

        $interval = $datetime1->diff($datetime2);
        $interval = $interval->format('%a');

        $lic_type = str_replace('^', '', $bean->lic_type);
        $lic_type = str_replace(',', ' ', $lic_type);

        $id = $bean->id;
        $file = $dir."/".$id.".license";

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