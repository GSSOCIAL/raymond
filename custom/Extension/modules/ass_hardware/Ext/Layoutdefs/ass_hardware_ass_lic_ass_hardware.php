<?php
 // created: 2016-10-26 13:51:38
$layout_defs["ass_hardware"]["subpanel_setup"]['ass_hardware_ass_lic'] = array (
  'order' => 100,
  'module' => 'ass_lic',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_ASS_HARDWARE_ASS_LIC_FROM_ASS_LIC_TITLE',
  'get_subpanel_data' => 'ass_hardware_ass_lic',
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
