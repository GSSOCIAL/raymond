<?php
class caseUpdatedeliveryStatus{
    function proccess($bean,$a,$b){
        global $db;
        $status = $db->getOne("SELECT vk.activated
        FROM aop_case_updates acu
        INNER JOIN verification_keys vk ON vk.bean=acu.id
        WHERE acu.case_id='{$bean->id}'
        ORDER BY acu.date_entered DESC");
        $status = empty($status)?0:intval($status);
        switch($status){
            case 0:
                $bean->aop_case_updates_delivery_status = "<a href=\"#\" class=\"read-mark delivery-status delivery-status-0\" title=\"On check\"><span></span></a>";
            break;
            case 1:
                $bean->aop_case_updates_delivery_status = "<a href=\"#\" class=\"read-mark delivery-status delivery-status-1\" title=\"Delivered\"><span></span></a>";
            break;
            case 2:
                $bean->aop_case_updates_delivery_status = "<a href=\"#\" class=\"read-mark delivery-status delivery-status-2\" title=\"Probably undelivered\"><span></span></a>";
            break;
        }
        return $bean;
    }
}