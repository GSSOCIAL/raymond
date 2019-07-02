<?php
if (!defined('sugarEntry')) define('sugarEntry', true);

require_once('include/entryPoint.php');

global $db;

// Получаем настройки пользователя с ID = 1
$user_id = '1';
$sql = "SELECT * FROM `user_preferences` WHERE `category` = 'Home' AND `assigned_user_id` = '{$user_id}' AND `deleted` = 0";
$result = $db->query($sql, true);
while ($row = $db->fetchByAssoc($result)) {
    // Пробегаемся по найденным записям
    // но по идее она должна быть одна

    $arr = unserialize(base64_decode($row['contents']));
    $pages = $arr['pages'];

    // Меняем местами первую и вторую вкладки
    $arr['pages'][0] = $pages[1];
    $arr['pages'][1] = $pages[0];

    print_array($arr);

    // Запаковываем обратно массив
    $str_new = base64_encode(serialize($arr));

    // Обновляем настройки
    $sql = "UPDATE `user_preferences` SET `contents` = '{$str_new}' WHERE `id` = '".$row['id']."'";
    $db->query($sql, true);
    print_array($str_new);
}


