<?php
// created: 2016-12-28 02:13:47
$subpanel_layout['list_fields'] = array (
  'instal_name' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_INSTAL_NAME',
    'width' => '10%',
    'default' => true,
  ),
  'name' => 
  array (
    'vname' => 'LBL_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '45%',
    'default' => true,
  ),
  'status' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'vname' => 'LBL_STATUS',
    'width' => '10%',
  ),
  'cluster' => 
  array (
    'type' => 'bool',
    'default' => true,
    'vname' => 'LBL_CLUSTER',
    'width' => '10%',
  ),
  'rapid' => 
  array (
    'type' => 'bool',
    'default' => true,
    'vname' => 'LBL_RAPID',
    'width' => '10%',
  ),
  'dcmsys_ver' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_DCMSYS_VER',
    'width' => '10%',
    'default' => true,
  ),
  'edit_button' => 
  array (
    'vname' => 'LBL_EDIT_BUTTON',
    'widget_class' => 'SubPanelEditButton',
    'module' => 'ass_hardware',
    'width' => '4%',
    'default' => true,
  ),
  'remove_button' => 
  array (
    'vname' => 'LBL_REMOVE',
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'ass_hardware',
    'width' => '5%',
    'default' => true,
  ),
);