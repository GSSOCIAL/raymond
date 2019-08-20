<?php
if(empty($hook_array['process_record'])){
    $hook_array['process_record'] = array();
}
$hook_array['process_record'][] = Array(
    10,
    'Display delivery status',
    'custom/modules/Cases/delivery_status.php',
    'caseUpdatedeliveryStatus',
    'proccess'
);