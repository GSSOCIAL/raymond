<?php
require_once('modules/DynamicFields/templates/Fields/TemplateCstmpass.php');

function get_body(&$ss, $vardef){
	return $ss->fetch('modules/DynamicFields/templates/Fields/Forms/cstmpass.tpl');
}