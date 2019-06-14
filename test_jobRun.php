<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
if(!defined('sugarEntry'))define('sugarEntry', true);
require_once('include/entryPoint.php');
require_once(__DIR__."/custom/modules/Schedulers/Ext/ScheduledTasks/scheduledtasks.ext.php");
if(file_exists(__DIR__."/custom/modules/Schedulers/Ext/Language/en_us.lang.ext.php")){
require_once(__DIR__."/custom/modules/Schedulers/Ext/Language/en_us.lang.ext.php");
}
//If receive form with task - run
if(!empty($_POST["submit"]) && !empty($_POST["job"])){
    //Check if method exists and call
    if(function_exists($_POST["job"])){
        call_user_func($_POST["job"]);
    }
}
?>
<form method="POST">
    <select name="job">
    <?php foreach($job_strings as $job){ ?>
        <option <?=!empty($_POST["job"])&&$_POST["job"]==$job?"selected ":""?>value="<?=$job?>"><?=!empty($mod_strings["LBL_".strtoupper($job)])?$mod_strings["LBL_".strtoupper($job)]:$job?></option>
    <?php } ?>
    </select>
    <input type="submit" name="submit" value="Run" />
</form>