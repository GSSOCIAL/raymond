<?php
$module_name = 'ass_hardware';
$viewdefs [$module_name] = 
array (
  'QuickCreate' => 
  array (
    'templateMeta' => 
    array (
      'maxColumns' => '2',
      'widths' => 
      array (
        0 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
        1 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
      ),
      'useTabs' => false,
      'tabDefs' => 
      array (
        'DEFAULT' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 'name',
          1 => 
          array (
            'name' => 'ass_hardware_accounts_name',
            'label' => 'LBL_ASS_HARDWARE_ACCOUNTS_FROM_ACCOUNTS_TITLE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'hd_type',
            'studio' => 'visible',
            'label' => 'LBL_HD_TYPE',
          ),
          1 => 
          array (
            'name' => 'os',
            'studio' => 'visible',
            'label' => 'LBL_OS',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'status',
            'studio' => 'visible',
            'label' => 'LBL_STATUS',
          ),
          1 => 
          array (
            'name' => 'dcmsys_ver',
            'label' => 'LBL_DCMSYS_VER',
          ),
        ),
      ),
    ),
  ),
);
?>
