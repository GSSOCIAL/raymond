<?php
$module_name = 'ass_hardware';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'INSTAL_NAME' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_INSTAL_NAME',
    'width' => '10%',
    'default' => true,
  ),
  'ASS_HARDWARE_ACCOUNTS_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_ASS_HARDWARE_ACCOUNTS_FROM_ACCOUNTS_TITLE',
    'id' => 'ASS_HARDWARE_ACCOUNTSACCOUNTS_IDA',
    'width' => '10%',
    'default' => true,
  ),
  'STATUS' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_STATUS',
    'width' => '10%',
  ),
  'CLUSTER' => 
  array (
    'type' => 'bool',
    'default' => true,
    'label' => 'LBL_CLUSTER',
    'width' => '10%',
  ),
  'RAPID' => 
  array (
    'type' => 'bool',
    'default' => true,
    'label' => 'LBL_RAPID',
    'width' => '10%',
  ),
  'DCMSYS_VER' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_DCMSYS_VER',
    'width' => '10%',
    'default' => true,
  ),
  'HOSTNAME' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_HOSTNAME',
    'width' => '10%',
    'default' => false,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => false,
  ),
);
?>
