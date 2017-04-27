<?php
// created: 2016-10-26 13:51:38
$dictionary["ass_hardware_cases"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'ass_hardware_cases' => 
    array (
      'lhs_module' => 'ass_hardware',
      'lhs_table' => 'ass_hardware',
      'lhs_key' => 'id',
      'rhs_module' => 'Cases',
      'rhs_table' => 'cases',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'ass_hardware_cases_c',
      'join_key_lhs' => 'ass_hardware_casesass_hardware_ida',
      'join_key_rhs' => 'ass_hardware_casescases_idb',
    ),
  ),
  'table' => 'ass_hardware_cases_c',
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
      'name' => 'ass_hardware_casesass_hardware_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'ass_hardware_casescases_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'ass_hardware_casesspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'ass_hardware_cases_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'ass_hardware_casesass_hardware_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'ass_hardware_cases_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'ass_hardware_casescases_idb',
      ),
    ),
  ),
);