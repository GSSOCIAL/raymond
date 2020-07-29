<?php
$listViewDefs ['Cases'] = 
array (
  'CASE_NUMBER' => 
  array (
    'width' => '5%',
    'label' => 'LBL_LIST_NUMBER',
    'default' => true,
  ),
  'NAME' => 
  array (
    'width' => '25%',
    'label' => 'LBL_LIST_SUBJECT',
    'link' => true,
    'default' => true,
  ),
  'ACCOUNT_NAME' => 
  array (
    'width' => '20%',
    'label' => 'LBL_LIST_ACCOUNT_NAME',
    'module' => 'Accounts',
    'id' => 'ACCOUNT_ID',
    'link' => true,
    'default' => true,
    'ACLTag' => 'ACCOUNT',
    'related_fields' => 
    array (
      0 => 'account_id',
    ),
  ),
  'ASS_HARDWARE_CASES_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_ASS_HARDWARE_CASES_FROM_ASS_HARDWARE_TITLE',
    'id' => 'ASS_HARDWARE_CASESASS_HARDWARE_IDA',
    'width' => '10%',
    'default' => true,
  ),
  'TYPE' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_TYPE',
    'width' => '10%',
    'default' => true,
  ),
  'PRIORITY' => 
  array (
    'width' => '10%',
    'label' => 'LBL_LIST_PRIORITY',
    'default' => true,
  ),
  'LAST_ACTION_C' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_LAST_ACTION',
    'width' => '10%',
  ),
  'DATE_ENTERED' => 
  array (
    'width' => '10%',
    'label' => 'LBL_DATE_ENTERED',
    'default' => true,
  ),
  'DATE_MODIFIED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_MODIFIED',
    'width' => '10%',
    'default' => true,
  ),
  'STATUS' => 
  array (
    'width' => '10%',
    'label' => 'LBL_LIST_STATUS',
    'default' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '10%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => true,
  ),
  'UPDATE_TEXT' => 
  array (
    'type' => 'text',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_UPDATE_TEXT',
    'sortable' => false,
    'width' => '10%',
  ),
  'INTERNAL' => 
  array (
    'type' => 'bool',
    'studio' => 'visible',
    'label' => 'LBL_INTERNAL',
    'width' => '10%',
    'default' => false,
  ),
  'AOP_CASE_UPDATES_THREADED' => 
  array (
    'type' => 'function',
    'studio' => 'visible',
    'label' => 'LBL_AOP_CASE_UPDATES_THREADED',
    'width' => '10%',
    'default' => false,
  ),
);
?>
