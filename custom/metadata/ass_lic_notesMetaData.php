<?php
// created: 2016-10-26 13:51:38
$dictionary["ass_lic_notes"] = array (
  'true_relationship_type' => 'many-to-many',
  'relationships' => 
  array (
    'ass_lic_notes' => 
    array (
      'lhs_module' => 'ass_lic',
      'lhs_table' => 'ass_lic',
      'lhs_key' => 'id',
      'rhs_module' => 'Notes',
      'rhs_table' => 'notes',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'ass_lic_notes_c',
      'join_key_lhs' => 'ass_lic_notesass_lic_ida',
      'join_key_rhs' => 'ass_lic_notesnotes_idb',
    ),
  ),
  'table' => 'ass_lic_notes_c',
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
      'name' => 'ass_lic_notesass_lic_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'ass_lic_notesnotes_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'ass_lic_notesspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'ass_lic_notes_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'ass_lic_notesass_lic_ida',
        1 => 'ass_lic_notesnotes_idb',
      ),
    ),
  ),
);