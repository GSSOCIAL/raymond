<?php
// created: 2016-10-26 13:51:38
$dictionary["ass_lic"]["fields"]["ass_lic_accounts"] = array (
  'name' => 'ass_lic_accounts',
  'type' => 'link',
  'relationship' => 'ass_lic_accounts',
  'source' => 'non-db',
  'module' => 'Accounts',
  'bean_name' => 'Account',
  'vname' => 'LBL_ASS_LIC_ACCOUNTS_FROM_ACCOUNTS_TITLE',
  'id_name' => 'ass_lic_accountsaccounts_ida',
);
$dictionary["ass_lic"]["fields"]["ass_lic_accounts_name"] = array (
  'name' => 'ass_lic_accounts_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_ASS_LIC_ACCOUNTS_FROM_ACCOUNTS_TITLE',
  'save' => true,
  'id_name' => 'ass_lic_accountsaccounts_ida',
  'link' => 'ass_lic_accounts',
  'table' => 'accounts',
  'module' => 'Accounts',
  'rname' => 'name',
);
$dictionary["ass_lic"]["fields"]["ass_lic_accountsaccounts_ida"] = array (
  'name' => 'ass_lic_accountsaccounts_ida',
  'type' => 'link',
  'relationship' => 'ass_lic_accounts',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_ASS_LIC_ACCOUNTS_FROM_ASS_LIC_TITLE',
);
