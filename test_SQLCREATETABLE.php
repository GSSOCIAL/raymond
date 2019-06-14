<?php 
if(!defined('sugarEntry'))define('sugarEntry', true);
require_once('include/entryPoint.php');
require_once(__DIR__."/custom/modules/Schedulers/Ext/ScheduledTasks/scheduledtasks.ext.php");
require_once(__DIR__."/custom/modules/Schedulers/Ext/Language/en_us.lang.ext.php");
//If receive form with task - run
if(!empty($_POST["submit"]) && !empty($_POST["job"])){
    global $db;
    $q = $db->query($_POST["query"]);
    switch($_POST["mode"]){
        case "unique":
            var_dump($q);
        break;
        case "show_results":
            var_dump($q);
            echo("\n<b>Results:</b>:\n");
            while($row = $db->fetchByAssocc($q)){
                var_dump($row);
            }
        break;
    }
}
?>
<form method="POST">
    <textarea name="query"><?=!empty($_POST["query"])?$_POST["query"]:""?></textarea>
    <select name="mode">
        <option value="unique">only query</option>
        <option value="show_results">show results (FOR SELECT)</option>
    </select>
    <input type="submit" name="submit" value="Run" />
</form>