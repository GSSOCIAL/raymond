<?php
$module_name = 'ass_lic';
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
            'name' => 'hard_id',
            'label' => 'LBL_HARD_ID',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'lic_type',
            'studio' => 'visible',
            'label' => 'LBL_LIC_TYPE',
          ),
          1 => 
          array (
            'name' => 'end_date',
            'label' => 'LBL_END_DATE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'lic_key',
            'studio' => 'visible',
            'label' => 'LBL_LIC_KEY',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'ass_lic_accounts_name',
            'label' => 'LBL_ASS_LIC_ACCOUNTS_FROM_ACCOUNTS_TITLE',
          ),
          1 => 
          array (
            'name' => 'ass_hardware_ass_lic_name',
            'label' => 'LBL_ASS_HARDWARE_ASS_LIC_FROM_ASS_HARDWARE_TITLE',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'ass_lic_contacts_name',
            'label' => 'LBL_ASS_LIC_CONTACTS_FROM_CONTACTS_TITLE',
          ),
          1 => 
          array (
            'name' => 'description',
            'comment' => 'Full text of the note',
            'label' => 'LBL_DESCRIPTION',
          ),
        ),
      ),
    ),
  ),
);
?>
