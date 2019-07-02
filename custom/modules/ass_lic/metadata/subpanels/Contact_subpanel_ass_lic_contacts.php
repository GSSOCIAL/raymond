<?php
// created: 2016-10-26 15:10:25
$subpanel_layout['list_fields'] = array (
  'name' => 
  array (
    'vname' => 'LBL_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '45%',
    'default' => true,
  ),
  'end_date' => 
  array (
    'type' => 'date',
    'vname' => 'LBL_END_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'lic_type' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'vname' => 'LBL_LIC_TYPE',
    'width' => '10%',
  ),
  'ass_hardware_ass_lic_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'vname' => 'LBL_ASS_HARDWARE_ASS_LIC_FROM_ASS_HARDWARE_TITLE',
    'id' => 'ASS_HARDWARE_ASS_LICASS_HARDWARE_IDA',
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'ass_hardware',
    'target_record_key' => 'ass_hardware_ass_licass_hardware_ida',
  ),
  'edit_button' => 
  array (
    'vname' => 'LBL_EDIT_BUTTON',
    'widget_class' => 'SubPanelEditButton',
    'module' => 'ass_lic',
    'width' => '4%',
    'default' => true,
  ),
  'remove_button' => 
  array (
    'vname' => 'LBL_REMOVE',
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'ass_lic',
    'width' => '5%',
    'default' => true,
  ),
);