<?php
getSystemUser();
require_once('modules/Administration/QuickRepairAndRebuild.php');
$randc = new RepairAndClear();
$randc->repairAndClearAll(array('clearAll'), array(translate('LBL_ALL_MODULES')), false, true);
