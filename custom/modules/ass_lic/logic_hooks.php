<?php
/**
 * Created by PhpStorm.
 * User: lulu
 * Date: 10.05.17
 * Time: 14:03
 */

$hook_array['before_save'] = Array();
$hook_array['before_save'][] = Array(77, 'generate license after save', 'custom/modules/ass_lic/Hooks.php','assLicHooks', 'genLic');