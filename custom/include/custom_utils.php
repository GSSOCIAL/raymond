<?php

function replace4byte($string) {
    return preg_replace('%(?:
          \xF0[\x90-\xBF][\x80-\xBF]{2}      # planes 1-3
        | [\xF1-\xF3][\x80-\xBF]{3}          # planes 4-15
        | \xF4[\x80-\x8F][\x80-\xBF]{2}      # plane 16
    )%xs', '', $string);
}

/**
 * Generate random string
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
	$InboundSystemAddressPrefs = $db->query("SELECT e.name AS `addr`,c.value AS `id` FROM config c INNER JOIN inbound_email e ON e.id=c.value WHERE c.name='inbound_email_address' AND c.category='system'");
	$InboundSystemAddressPrefs = (Object)$db->fetchByAssoc($InboundSystemAddressPrefs);
	return !empty($InboundSystemAddressPrefs->addr)?($with_id===false?$InboundSystemAddressPrefs->addr:array("id"=>$InboundSystemAddressPrefs->id,"addr"=>$InboundSystemAddressPrefs->addr)):NULL;
}