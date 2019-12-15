<?php 
if(!defined('sugarEntry'))define('sugarEntry', true);
require_once('include/entryPoint.php');
//If receive form with task - run
if(!empty($_POST["submit"]) && !empty($_POST["query"])){
    global $db;
    $q = $db->query($_POST["query"]);
    if(!$q){
        echo("\n<b>Query error. <a href=\"test_viewlog.php\">View</a> suitecrm.log for details</b>:\n");
        var_dump($db->database);
    }else{
        switch($_POST["mode"]){
        case "unique":
            var_dump($q);
        break;
        case "show_results":
            var_dump($q);
            if($q){
            echo("\n<b>Results:</b>:\n");
                while($row = $db->fetchByAssoc($q)){
                    var_dump($row);
                }
            }
        break;
        }
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