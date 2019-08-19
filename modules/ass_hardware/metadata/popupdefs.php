<?php
$popupMeta = array (
    'moduleMain' => 'ass_hardware',
    'varName' => 'ass_hardware',
    'orderBy' => 'ass_hardware.name',
    'whereClauses' => array (
  'name' => 'ass_hardware.name',
  'ass_hardware_accounts_name' => 'ass_hardware.ass_hardware_accounts_name',
),
    'searchInputs' => array (
  1 => 'name',
  4 => 'ass_hardware_accounts_name',
),
    'searchdefs' => array (
  'name' => 
  array (
    'type' => 'name',
    'link' => true,
    'label' => 'LBL_NAME',
    'width' => '10%',
    'name' => 'name',
  ),
  'ass_hardware_accounts_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_ASS_HARDWARE_ACCOUNTS_FROM_ACCOUNTS_TITLE',
    'id' => 'ASS_HARDWARE_ACCOUNTSACCOUNTS_IDA',
    'width' => '10%',
    'name' => 'ass_hardware_accounts_name',
  ),
),
    'listviewdefs' => array (
  'NAME' => 
  array (
    'type' => 'name',
    'link' => true,
    'label' => 'LBL_NAME',
    'width' => '10%',
    'default' => true,
    'name' => 'name',
  ),
  'STATUS' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_STATUS',
    'width' => '10%',
    'name' => 'status',
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
    'name' => 'ass_hardware_accounts_name',
  ),
),
);
