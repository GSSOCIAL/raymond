<?php

class hardwareHooks {

    #before save hooks
    function updateSerial($bean, $event, $arguments) {
        if (empty($bean->fetched_row)) {
            global $db;

            $query = "
                SELECT
                    MAX(`ass_hardware`.`name` + 0) AS `serial`
                FROM
                    `ass_hardware`
                WHERE
                    `ass_hardware`.`deleted` = 0
            ";

            $result = $db->query($query, 1);

            if ($row = $db->fetchByAssoc($result)) {
                $bean->name = 1 + $row['serial'];
            }
        }
    }

}
