<?php
if(!defined('sugarEntry'))define('sugarEntry', true);
require_once('include/entryPoint.php');
global $db;
$db->query("ALTER TABLE `verification_keys` ADD `bean` VARCHAR(42) NULL DEFAULT NULL AFTER `activated`;");
var_dump("ss");
?>