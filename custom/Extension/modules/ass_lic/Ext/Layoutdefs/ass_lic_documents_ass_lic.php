<?php
 // created: 2016-10-26 13:51:38
$layout_defs["ass_lic"]["subpanel_setup"]['ass_lic_documents'] = array (
  'order' => 100,
  'module' => 'Documents',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_ASS_LIC_DOCUMENTS_FROM_DOCUMENTS_TITLE',
  'get_subpanel_data' => 'ass_lic_documents',
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
