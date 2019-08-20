<?php
require_once('include/MVC/Controller/SugarController.php');

class SchedulersController extends SugarController {

    function action_Run() {


        include_once 'modules/Schedulers/Scheduler.php';
        include_once 'modules/Schedulers/_AddJobsHere.php';



        if (!is_admin($GLOBALS['current_user'])) die("Warning: You do not have permission to access this module!");

        if ($this->bean->id) {
            $seedScheduler = new Scheduler();
            $seedScheduler->retrieve($this->bean->id);
            if (!empty($seedScheduler->id)) {
                $function = preg_replace("|function::|is", "", $seedScheduler->job);
                call_user_func($function);
            }
        }
    }
    
    
}
?>

