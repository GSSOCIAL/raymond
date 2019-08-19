<?php
 // created: 2016-10-26 13:51:38
$layout_defs["Accounts"]["subpanel_setup"]['ass_hardware_accounts'] = array (
  'order' => 100,
  'module' => 'ass_hardware',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_ASS_HARDWARE_ACCOUNTS_FROM_ASS_HARDWARE_TITLE',
  'get_subpanel_data' => 'ass_hardware_accounts',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopButtonQuickCreate',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
  ),
);
