<?php
/**
 * Created by PhpStorm.
 * User: lulu
 * Date: 10.05.17
 * Time: 14:05
 */

class assLicHooks {
    function genLic (SugarBean &$bean, $event, $arguments) {

        if (empty($bean->lic_key) && !empty($bean->name) && !empty($bean->hard_id) && !empty($bean->end_date) && !empty($bean->lic_type) ) {
            //если с полями всё норма

            //Высчитываем интервал в днях между текущей датой и датой окончания лицензии
            $datetime1 = new DateTime('now');
            $datetime2 = date_create_from_format('Y-m-d', $bean->end_date);

            $interval = $datetime1->diff($datetime2);
            $interval = $interval->format('%a');

            //собираем поле тип лицензии
            $lic_type = str_replace('^', '', $bean->lic_type);
            $lic_type = str_replace(',', ' ', $lic_type);

            //временный файл в котором  будут хранитсья ключи лицензий
            $file_path = 'cache/'.create_guid();

            //собираем команду для генерации лицензий
            //$cmd = "for i in {$lic_type}; do echo \"------\"; ./genlic -C {$bean->name} -H {$bean->hard_id} -P \$i -D {$interval} ;done > ".$file_path;
            $cmd = "for i in {$lic_type}; do echo \"------\"; cd /home/genlic; ./genlic -C {$bean->name} -H {$bean->hard_id} -P \$i -D {$interval} ;done > ".$file_path;
            $bean->lic_key = $cmd;
            exec($cmd);

            //Если сгенерился файл с ключами, то сохраняем его содержимое в поле и удаляем файл.
            if(file_exists($file_path)) {
                $bean->lic_key = file_get_contents($file_path);
                unlink($file_path);
            }
        }
        
        
    }
}