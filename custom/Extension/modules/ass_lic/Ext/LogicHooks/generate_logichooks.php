<?php
$hook_array["before_save"][] = Array(
    10,
    "Add log data",
    "custom/modules/ass_lic/PushToLog_LogicHooks.php",
    "PushToLog_LogicHooks",
    "add"
);
$hook_array["before_delete"][] = Array(
    10,
    "Add log data",
    "custom/modules/ass_lic/PushToLog_LogicHooks.php",
    "PushToLog_LogicHooks",
    "add"
);