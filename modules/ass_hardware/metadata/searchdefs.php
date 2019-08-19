<?php
$module_name = 'ass_hardware';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'instal_name' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_INSTAL_NAME',
        'width' => '10%',
        'default' => true,
        'name' => 'instal_name',
      ),
      'status' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_STATUS',
        'width' => '10%',
        'name' => 'status',
      ),
      'ass_hardware_accounts_name' => 
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
    'advanced_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'instal_name' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_INSTAL_NAME',
        'width' => '10%',
        'default' => true,
        'name' => 'instal_name',
      ),
      'status' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_STATUS',
        'width' => '10%',
        'name' => 'status',
      ),
      'ass_hardware_accounts_name' => 
      array (
        'type' => 'relate',
        'link' => true,
        'label' => 'LBL_ASS_HARDWARE_ACCOUNTS_FROM_ACCOUNTS_TITLE',
        'width' => '10%',
        'default' => true,
        'id' => 'ASS_HARDWARE_ACCOUNTSACCOUNTS_IDA',
        'name' => 'ass_hardware_accounts_name',
      ),
      'hd_type' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_HD_TYPE',
        'width' => '10%',
        'name' => 'hd_type',
      ),
      'os' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_OS',
        'width' => '10%',
        'name' => 'os',
      ),
      'rapid' => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_RAPID',
        'width' => '10%',
        'name' => 'rapid',
      ),
      'cluster' => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_CLUSTER',
        'width' => '10%',
        'name' => 'cluster',
      ),
      'dcmsys_ver' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_DCMSYS_VER',
        'width' => '10%',
        'default' => true,
        'name' => 'dcmsys_ver',
      ),
    ),
  ),
  'templateMeta' => 
  array (
    'maxColumns' => '3',
    'maxColumnsBasic' => '4',
    'widths' => 
    array (
      'label' => '10',
      'field' => '30',
    ),
  ),
);
?>
