<?php
// created: 2016-12-28 04:40:52
$subpanel_layout['list_fields'] = array (
  'instal_name' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_INSTAL_NAME',
    'width' => '10%',
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
  'name' => 
  array (
    'vname' => 'LBL_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '45%',
    'default' => true,
  ),
  'ass_hardware_accounts_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'vname' => 'LBL_ASS_HARDWARE_ACCOUNTS_FROM_ACCOUNTS_TITLE',
    'id' => 'ASS_HARDWARE_ACCOUNTSACCOUNTS_IDA',
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'Accounts',
    'target_record_key' => 'ass_hardware_accountsaccounts_ida',
  ),
  'rapid' => 
  array (
    'type' => 'bool',
    'default' => true,
    'vname' => 'LBL_RAPID',
    'width' => '10%',
  ),
  'cluster' => 
  array (
    'type' => 'bool',
    'default' => true,
    'vname' => 'LBL_CLUSTER',
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