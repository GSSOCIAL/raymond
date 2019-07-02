<?php
// created: 2016-10-26 13:51:38
$dictionary["ass_lic_accounts"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'ass_lic_accounts' => 
    array (
      'lhs_module' => 'Accounts',
      'lhs_table' => 'accounts',
      'lhs_key' => 'id',
      'rhs_module' => 'ass_lic',
      'rhs_table' => 'ass_lic',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'ass_lic_accounts_c',
      'join_key_lhs' => 'ass_lic_accountsaccounts_ida',
      'join_key_rhs' => 'ass_lic_accountsass_lic_idb',
    ),
  ),
  'table' => 'ass_lic_accounts_c',
  'fields' => 
  array (
    0 => 
    array (
      'name' => 'id',
      'type' => 'varchar',
      'len' => 36,
    ),
    1 => 
    array (
      'name' => 'date_modified',
      'type' => 'datetime',
    ),
    2 => 
    array (
      'name' => 'deleted',
      'type' => 'bool',
      'len' => '1',
      'default' => '0',
      'required' => true,
    ),
    3 => 
    array (
      'name' => 'ass_lic_accountsaccounts_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'ass_lic_accountsass_lic_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'ass_lic_accountsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'ass_lic_accounts_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'ass_lic_accountsaccounts_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'ass_lic_accounts_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'ass_lic_accountsass_lic_idb',
      ),
    ),
  ),
);