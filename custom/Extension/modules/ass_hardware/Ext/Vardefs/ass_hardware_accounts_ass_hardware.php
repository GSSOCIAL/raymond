<?php
// created: 2016-10-26 13:51:38
$dictionary["ass_hardware"]["fields"]["ass_hardware_accounts"] = array (
  'name' => 'ass_hardware_accounts',
  'type' => 'link',
  'relationship' => 'ass_hardware_accounts',
  'source' => 'non-db',
  'module' => 'Accounts',
  'bean_name' => 'Account',
  'vname' => 'LBL_ASS_HARDWARE_ACCOUNTS_FROM_ACCOUNTS_TITLE',
  'id_name' => 'ass_hardware_accountsaccounts_ida',
);
$dictionary["ass_hardware"]["fields"]["ass_hardware_accounts_name"] = array (
  'name' => 'ass_hardware_accounts_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_ASS_HARDWARE_ACCOUNTS_FROM_ACCOUNTS_TITLE',
  'save' => true,
  'id_name' => 'ass_hardware_accountsaccounts_ida',
  'link' => 'ass_hardware_accounts',
  'table' => 'accounts',
  'module' => 'Accounts',
  'rname' => 'name',
);
$dictionary["ass_hardware"]["fields"]["ass_hardware_accountsaccounts_ida"] = array (
  'name' => 'ass_hardware_accountsaccounts_ida',
  'type' => 'link',
  'relationship' => 'ass_hardware_accounts',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_ASS_HARDWARE_ACCOUNTS_FROM_ASS_HARDWARE_TITLE',
);
