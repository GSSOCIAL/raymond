<?php
include_once 'modules/Schedulers/Scheduler.php';
include_once 'modules/Schedulers/_AddJobsHere.php';

if(!is_admin($GLOBALS['current_user'])) die("Warning: You do not have permission to access this module!");

if(isset($_REQUEST['record']) AND $_REQUEST['record']) {
	$seedScheduler = new Scheduler();
	$seedScheduler->retrieve($_REQUEST['record']);
	if(!empty($seedScheduler->id)) {
		$function = preg_replace("|function::|is", "", $seedScheduler->job);
		call_user_func($function);
	}
}