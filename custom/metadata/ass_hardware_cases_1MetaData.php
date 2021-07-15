<?php
// created: 2017-05-25 05:53:08
$dictionary["ass_hardware_cases_1"] = array (
  'true_relationship_type' => 'many-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'ass_hardware_cases_1' => 
    array (
      'lhs_module' => 'ass_hardware',
      'lhs_table' => 'ass_hardware',
      'lhs_key' => 'id',
      'rhs_module' => 'Cases',
      'rhs_table' => 'cases',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'ass_hardware_cases_1_c',
      'join_key_lhs' => 'ass_hardware_cases_1ass_hardware_ida',
      'join_key_rhs' => 'ass_hardware_cases_1cases_idb',
    ),
  ),
  'table' => 'ass_hardware_cases_1_c',
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
      'name' => 'ass_hardware_cases_1ass_hardware_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'ass_hardware_cases_1cases_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'ass_hardware_cases_1spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'ass_hardware_cases_1_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'ass_hardware_cases_1ass_hardware_ida',
        1 => 'ass_hardware_cases_1cases_idb',
      ),
    ),
  ),
);