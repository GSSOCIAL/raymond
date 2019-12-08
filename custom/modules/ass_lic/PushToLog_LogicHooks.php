<?php 

class PushToLog_LogicHooks{
    /**
     * Write log
     */
    function add(SugarBean &$bean, $event, $arguments){
        global $current_user,$db,$timedate;

        //Check if log table exists
        if(!$db->query("DESCRIBE `licenses_log`",false)){ //No need to exit. If table doesnt exists - mysql drops error.
            
            //Create table
            $db->query("CREATE TABLE IF NOT EXISTS `licenses_log` (
                `id` INT(16) NOT NULL AUTO_INCREMENT,
                `license_id` VARCHAR(36) NOT NULL COMMENT 'License id',
                `registred` TIMESTAMP ON UPDATE CURRENT_TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                `action` ENUM('create','edit','delete','generate','copy') DEFAULT 'create',
                `hard_id` VARCHAR(36),
                `serial` VARCHAR(256) COMMENT 'Serial number from hardware',
                `valid_to` DATETIME COMMENT 'End license date',
                `types` VARCHAR(16) COMMENT 'License types array. Each seperated by comma',
                `filename` VARCHAR(256),
                `user_id` VARCHAR(36), PRIMARY KEY (`id`))",true);
        }

        //Check if log need skipped
        if($bean->skip_log) return $bean;

        //Add to log
        $Event_name = "generate";
        switch($event){
            case "before_save":
            case "after_save":
                if(empty($bean->fetched_row)){
                    $Event_name = !empty($bean->is_generated)?"generate":"create";
                }else{
                    $Event_name = "edit";
                }
            break;
            case "before_delete":
            case "after_delete":
                $Event_name = "delete";
            break;
        }
        $lic_type = str_replace(array("^"),array(""),$bean->lic_type);
        //Insert to log
        $valid_to = date($timedate->get_db_date_time_format(),dateval($bean->end_date));
        $db->query("INSERT INTO `licenses_log` (`license_id`,`action`,`user_id`,`hard_id`,`serial`,`valid_to`,`types`,`filename`) VALUES ('{$bean->id}','{$Event_name}','{$current_user->id}','{$bean->hard_id}','{$bean->name}','{$valid_to}','{$lic_type}','{$bean->filename}')",true);
        
        return $bean;
    }
}