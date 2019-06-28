<?php
$module_name = 'ass_hardware';
$viewdefs [$module_name] = 
array (
  'EditView' => 
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
      'useTabs' => true,
      'tabDefs' => 
      array (
        'DEFAULT' => 
        array (
          'newTab' => true,
          'panelDefault' => 'expanded',
        ),
        'LBL_PANEL_LICENSES' =>array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL1' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL2' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL3' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
      'syncDetailEditViews' => true,
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
            'name' => 'hd_type',
            'studio' => 'visible',
            'label' => 'LBL_HD_TYPE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'instal_name',
            'label' => 'LBL_INSTAL_NAME',
          ),
          1 => 
          array (
            'name' => 'ass_hardware_accounts_name',
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
            'name' => 'rapid',
            'label' => 'LBL_RAPID',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'dcmsys_ver',
            'label' => 'LBL_DCMSYS_VER',
          ),
          1 => 
          array (
            'name' => 'os',
            'studio' => 'visible',
            'label' => 'LBL_OS',
          ),
        ),
      ),
      'lbl_panel_licenses'=>array(
        0=>array(
          0=>array(
            'name' => 'license_generator',
            'studio' => 'visible',
            'hideLabel' => true,
          ),
        )
      ),
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'pass_w',
            'label' => 'LBL_PASS_W',
          ),
          1 => 
          array (
            'name' => 'pass_r',
            'label' => 'LBL_PASS_R',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'ssh_user',
            'label' => 'LBL_SSH_USER',
          ),
          1 => 
          array (
            'name' => 'ssh_pass',
            'label' => 'LBL_SSH_PASS',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'ip_eth0',
            'label' => 'LBL_IP_ETH0',
          ),
          1 => 
          array (
            'name' => 'ip_eth1',
            'label' => 'LBL_IP_ETH1',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'ip_ipmi',
            'label' => 'LBL_IP_IPMI',
          ),
          1 => 
          array (
            'name' => 'ipmi_pass',
            'label' => 'LBL_IPMI_PASS',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'hostname',
            'label' => 'LBL_HOSTNAME',
          ),
          1 => 
          array (
            'name' => 'hard_id',
            'label' => 'LBL_HARD_ID',
          ),
        ),
      ),
      'lbl_editview_panel2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'cluster',
            'label' => 'LBL_CLUSTER',
          ),
          1 => 
          array (
            'name' => 'ass_hardware_ass_hardware_name',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'ip_oth',
            'label' => 'LBL_IP_OTH',
          ),
          1 => 
          array (
            'name' => 'vip',
            'label' => 'LBL_VIP',
          ),
        ),
      ),
      'lbl_editview_panel3' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'tech_cont',
            'studio' => 'visible',
            'label' => 'LBL_TECH_CONT',
          ),
        ),
        1 => 
        array (
          0 => 
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
