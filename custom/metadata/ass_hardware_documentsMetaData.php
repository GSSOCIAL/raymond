<?php
// created: 2016-10-26 13:51:38
$dictionary["ass_hardware_documents"] = array (
  'true_relationship_type' => 'many-to-many',
  'relationships' => 
  array (
    'ass_hardware_documents' => 
    array (
      'lhs_module' => 'ass_hardware',
      'lhs_table' => 'ass_hardware',
      'lhs_key' => 'id',
      'rhs_module' => 'Documents',
      'rhs_table' => 'documents',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'ass_hardware_documents_c',
      'join_key_lhs' => 'ass_hardware_documentsass_hardware_ida',
      'join_key_rhs' => 'ass_hardware_documentsdocuments_idb',
    ),
  ),
  'table' => 'ass_hardware_documents_c',
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
      'name' => 'ass_hardware_documentsass_hardware_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'ass_hardware_documentsdocuments_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
    5 => 
    array (
      'name' => 'document_revision_id',
      'type' => 'varchar',
      'len' => '36',
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'ass_hardware_documentsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'ass_hardware_documents_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'ass_hardware_documentsass_hardware_ida',
        1 => 'ass_hardware_documentsdocuments_idb',
      ),
    ),
  ),
);