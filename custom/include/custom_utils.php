<?php
/**
 * Generate license file from record
 * @param $bean License record object
 * @param Array $args Optional params (duraction)
 * @return Boolean Result
 */
function make_license($bean,$args){
    //Check if flag exists. If T - skip
    if($bean->file_generated) return $bean;
    
    //Setups
    $dir = "/var/www/html/upload/licenses";
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
        
        //Issue with output cmd - in Bean name & hardware id expecting ";" symbol + whitespaces. Remove both
        $name = trim(preg_replace('/[\W\s]/',"_",$bean->name)); 

        $hard_id = trim(preg_replace('/[\W\s]/',"_",$bean->hard_id));
        $hard_id2 = trim($bean->hard_id);

        $filename_parts = array(
            
        );
        $filename = "{$name}_{$diff->days}_{$bean->end_date}";
        $filename = trim(str_replace(array(";","/"," ","\\"),array("_","_","_","_"),$filename)); 

        $file = $dir."/".$filename.".license";
        
        $bean->filename = $filename;
        $bean->file_generated = true; //Recursion - Add flag that file created to skip.
        $bean->save();
        $bean->skip_log = true;

        $cmd = "for i in {$lic_type}; do echo \"------\"; cd /home/genlic; ./genlic -C {$name} -H {$hard_id2} -P \$i -D {$interval} ;done > {$file}";
        $bean->lic_key = $cmd;
        $logfile=fopen("/var/www/html/genlic.log","a+");
        fwrite($logfile,$cmd);
        exec($cmd);
        if(file_exists($file)) {
            $bean->lic_key = file_get_contents($file);
        }
        return true;
    }
    return false;
}

function replace4byte($string) {
    return preg_replace('%(?:
          \xF0[\x90-\xBF][\x80-\xBF]{2}      # planes 1-3
        | [\xF1-\xF3][\x80-\xBF]{3}          # planes 4-15
        | \xF4[\x80-\x8F][\x80-\xBF]{2}      # plane 16
    )%xs', '', $string);
}
/**
 * Generate random string eg key
 * @param number $length code length
 * @return string 
 */
function generateCode($length=6){
	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI_JKLMNOPRQSTUVWXYZ0123456789";
	$code = "";
	$clen = strlen($chars) - 1;  
	while (strlen($code) < $length) {
		$code .= $chars[mt_rand(0,$clen)];  
	}
	return $code;
}

/**
 * Get email addr which set as "Monitor Inbound Email address" verifier.
 * @param Boolean $with_id If true - return array with keys "id" and "addr". IF False - will return only addr
 */
function getEmailVerifierAddr($with_id=false){
	global $db;
	$InboundSystemAddressPrefs = $db->query("SELECT e.email_user AS `addr`,c.value AS `id` FROM config c INNER JOIN inbound_email e ON e.id=c.value WHERE c.name='inbound_email_address' AND c.category='system'");
	$InboundSystemAddressPrefs = (Object)$db->fetchByAssoc($InboundSystemAddressPrefs);
	return !empty($InboundSystemAddressPrefs->addr)?($with_id===false?$InboundSystemAddressPrefs->addr:(Object)array("id"=>$InboundSystemAddressPrefs->id,"addr"=>$InboundSystemAddressPrefs->addr)):NULL;
}

/**
 * Get email addr which set as "Report email adress". Important errors will send to this email
*/
function getEmailNotifyAddr(){
	global $db;
	return $db->getOne("SELECT c.value FROM config c WHERE c.name='email_report_addr' AND c.category='system'");
}

/**
 * Write content to specifed file
 * @param $content Content 
 * @param $file filename 
 */
function print_log($content,$file=null){
    if($file){
        ob_start();
    }else{
        echo '<pre class="print_data">';
    }
    print_r($content);
    if($file){
        $content = ob_get_contents(); 
    }else{
        echo '</pre>' . "\n";
    }
    if($file){
        $file = fopen("cache/{$file}.log","a+");
        fwrite($file, "\n\n******************************\n");
        fwrite($file, date("Y-m-d H:i:s") . "\n");
        fwrite($file, $content);
        fclose($file);
        empty($file);
        ob_end_clean();
    }
    return true;
}

/**
 * Convert to valid date format
 * @param String $value Date
 * @return String Timestamp if success. Null if couldnt parse date
 */
function dateval($value){
    $d = null;
    //Possible formats
    $formatting = array(
        "d/m/Y",
        "d.m.Y",
        "Y-m-d",
        "Y/m/d",
        "Y-m-d",
    );
    //Trying to parse from diff format
    foreach($formatting as $format){
        if($d = DateTime::createFromFormat($format,$value)){
            break;
        }
    }

    if($d){
        return $d->getTimestamp();
    }
    return $value;
}