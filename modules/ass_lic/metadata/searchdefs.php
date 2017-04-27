<?php
$module_name = 'ass_lic';
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
      'ass_lic_accounts_name' => 
      array (
        'type' => 'relate',
        'link' => true,
        'label' => 'LBL_ASS_LIC_ACCOUNTS_FROM_ACCOUNTS_TITLE',
        'id' => 'ASS_LIC_ACCOUNTSACCOUNTS_IDA',
        'width' => '10%',
        'default' => true,
        'name' => 'ass_lic_accounts_name',
      ),
      'end_date' => 
      array (
        'type' => 'date',
        'label' => 'LBL_END_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'end_date',
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
      'lic_type' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_LIC_TYPE',
        'width' => '10%',
        'name' => 'lic_type',
      ),
      'end_date' => 
      array (
        'type' => 'date',
        'label' => 'LBL_END_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'end_date',
      ),
      'ass_lic_accounts_name' => 
      array (
        'type' => 'relate',
        'link' => true,
        'label' => 'LBL_ASS_LIC_ACCOUNTS_FROM_ACCOUNTS_TITLE',
        'width' => '10%',
        'default' => true,
        'id' => 'ASS_LIC_ACCOUNTSACCOUNTS_IDA',
        'name' => 'ass_lic_accounts_name',
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
