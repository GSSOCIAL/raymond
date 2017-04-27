<?php
 // created: 2016-10-26 13:51:38
$layout_defs["Contacts"]["subpanel_setup"]['ass_lic_contacts'] = array (
  'order' => 100,
  'module' => 'ass_lic',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_ASS_LIC_CONTACTS_FROM_ASS_LIC_TITLE',
  'get_subpanel_data' => 'ass_lic_contacts',
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
