<?php
 // created: 2016-10-26 13:51:38
$layout_defs["ass_hardware"]["subpanel_setup"]['ass_hardware_cases'] = array (
  'order' => 100,
  'module' => 'Cases',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_ASS_HARDWARE_CASES_FROM_CASES_TITLE',
  'get_subpanel_data' => 'ass_hardware_cases',
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
