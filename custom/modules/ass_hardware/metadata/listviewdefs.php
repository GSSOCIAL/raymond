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
  'PASS_R' => 
  array (
    'type' => 'cstmpass',
    'studio' => 'visible',
    'label' => 'LBL_PASS_R',
    'width' => '10%',
    'default' => true,
  ),
  'PASS_W' => 
  array (
    'type' => 'cstmpass',
    'studio' => 'visible',
    'label' => 'LBL_PASS_W',
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
  'HD_TYPE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_HD_TYPE',
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
  'OS' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_OS',
    'width' => '10%',
  ),
  'HOSTNAME' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_HOSTNAME',
    'width' => '10%',
    'default' => false,
  ),
  'VIP' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_VIP',
    'width' => '10%',
    'default' => false,
  ),
  'ASS_HARDWARE_CONTACTS_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_ASS_HARDWARE_CONTACTS_FROM_CONTACTS_TITLE',
    'id' => 'ASS_HARDWARE_CONTACTSCONTACTS_IDA',
    'width' => '10%',
    'default' => false,
  ),
);
?>
