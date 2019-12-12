<?php
 // created: 2017-05-25 05:53:08
$layout_defs["Cases"]["subpanel_setup"]['ass_hardware_cases_1'] = array (
  'order' => 100,
  'module' => 'ass_hardware',
  'subpanel_name' => 'ForCases',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_ASS_HARDWARE_CASES_1_FROM_ASS_HARDWARE_TITLE',
  'get_subpanel_data' => 'ass_hardware_cases_1',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopButtonQuickCreateHardware',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButtonHardware',
      'mode' => 'MultiSelect',
    ),
  ),
);
