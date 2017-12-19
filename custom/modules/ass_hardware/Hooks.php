<?php

class hardwareHooks {

    #before save hooks
    function updateSerial($bean, $event, $arguments) {
        if (empty($bean->fetched_row)) {
            global $db, $sugar_config;

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
                $rank = $sugar_config['rank']; //количество знаков в Serial
                
                $serial = 1 + $row['serial'];
                $iterations = $rank - strlen(round(abs($serial)));
                $zero = '';
                for ($i = 0; $i < $iterations; $i++){
                    $zero .= '0';//если знаков в текущем serial меньше чем максимальное кол-во знаков, то дополняем слева нулями
                }

                $bean->name = $zero . $serial;
            }
        }
    }

}
