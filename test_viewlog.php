<?php
header('content-type: application/xml'); 
$log = file_get_contents("suitecrm.log");
if($log){
    $xml = simplexml_load_string("<?xml version='1.0'?> 
    <log>
    </log>");
    foreach(explode("\n",$log) as $error){
        $xml->addChild("error",$error);    
    }
    echo $xml->saveXML();
}
?>