<?php
/**
 * Created by PhpStorm.
 * User: lulu
 * Date: 03.05.17
 * Time: 11:34
 */

global $current_user;

$serial = $_REQUEST['serial'];
$hard_id = $_REQUEST['hard_id'];
$lic_type = $_REQUEST['lic_type'];
$end_date = $_REQUEST['end_date'];

//Проверка все ли поля заполнены
$err_text = '';
if (empty($serial)){
    $err_text = 'serial';
}
if (empty($hard_id)){
    $err_text =  'hard_id';
}
if (empty($lic_type)){
    $err_text =  'lic_type';
}
if (empty($end_date)){
    $err_text =  'end_date';
}

if (!empty($err_text)) {//если есть не заполненное поле то возвращаем ошибку.
    echo json_encode(array('error' => 1, 'text' => $err_text));
} else {
    //если с полями всё норма
    //получаем формат даты у текущего пользователя
    $dateFormat = $current_user->getPreference("datef");

    //Высчитываем интервал в днях между текущей датой и датой окончания лицензии
    $datetime1 = new DateTime('now');
    $datetime2 = date_create_from_format($dateFormat, $end_date);

    $interval = $datetime1->diff($datetime2);
    $interval = $interval->format('%a');

    //собираем поле тип лицензии
    $lic_type = implode($lic_type, ' ');

    //временный файл в котором  будут хранитсья ключи лицензий
    $file_path = 'cache/'.create_guid();

    //собираем команду для генерации лицензий
    $cmd = "for i in {$lic_type}; do echo \"------\"; ./genlic -C {$serial} -H {$hard_id} -P \$i -D {$interval} ;done > ".$file_path;

    exec($cmd);

    //Если сгенерился файл с ключами, то отправляем его содержимое обратно и удаляем файл, если не сгенерился то отправялем ошибку.
    if(file_exists($file_path)) {
        $exec_result = file_get_contents($file_path);
        unlink($file_path);
        echo json_encode(array('error' => 0, 'text' => $exec_result));
    } else {
        echo json_encode(array('error' => 2, 'text' => 'Failed to create license.'));
    }

}

