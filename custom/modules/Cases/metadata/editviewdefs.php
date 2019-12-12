<?php
$viewdefs ['Cases'] = 
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
      'includes' => 
      array (
        0 => 
        array (
          'file' => 'include/javascript/bindWithDelay.js',
        ),
        1 => 
        array (
          'file' => 'modules/AOK_KnowledgeBase/AOK_KnowledgeBase_SuggestionBox.js',
        ),
        2 => 
        array (
          'file' => 'include/javascript/qtip/jquery.qtip.min.js',
        ),
      ),
      'useTabs' => false,
      'tabDefs' => 
      array (
        'LBL_CASE_INFORMATION' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
      'form' => 
      array (
        'enctype' => 'multipart/form-data',
      ),
    ),
    'panels' => 
    array (
      'lbl_case_information' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'name',
            'displayParams' => 
            array (
            ),
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'case_number',
            'type' => 'readonly',
          ),
          1 => 'priority',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'state',
            'comment' => 'The state of the case (i.e. open/closed)',
            'label' => 'LBL_STATE',
          ),
          1 => 'status',
        ),
        3 => 
        array (
          0 => 'type',
          1 => 'account_name',
        ),
        4 => 
        array (
          0 => 'assigned_user_name',
          1 => 
          array (
            'name' => 'ass_hardware_cases_name',
            'label' => 'LBL_ASS_HARDWARE_CASES_FROM_ASS_HARDWARE_TITLE',
              'displayParams' => array(
                  'initial_filter' => '{$INITIAL_FILTER_ACC}',
                  'field_to_name_array' => array(
                      'id' => 'ass_hardware_casesass_hardware_ida',
                      'name' => 'ass_hardware_cases_name',
                      'ip_eth0' => 'ip_eth0',
                      'instal_name' => 'instal_name',
                  ),
              ),


          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'resolution',
            'nl2br' => true,
          ),
          1 => 
          array (
            'name' => 'last_action_c',
            'studio' => 'visible',
            'label' => 'LBL_LAST_ACTION',
          ),
        ),
        6 =>
        array (
          0 =>
          array (
            'name' => 'ip_eth0',
            'studio' => 'visible',
            'label' => 'LBL_IP_ETH0',
          ),
          1 =>
          array (
            'name' => 'instal_name',
            'studio' => 'visible',
            'label' => 'LBL_INSTAL_NAME',
          ),
        ),
      ),
    ),
  ),
);
?>
