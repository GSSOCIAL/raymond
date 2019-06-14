<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
if(!defined('sugarEntry'))define('sugarEntry', true);
require_once('include/entryPoint.php');
//If receive form with task - run
if(!empty($_POST["submit"]) && !empty($_POST["query"])){
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