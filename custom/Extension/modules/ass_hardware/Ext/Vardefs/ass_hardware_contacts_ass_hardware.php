<?php
// created: 2016-10-26 13:51:38
$dictionary["ass_hardware"]["fields"]["ass_hardware_contacts"] = array (
  'name' => 'ass_hardware_contacts',
  'type' => 'link',
  'relationship' => 'ass_hardware_contacts',
  'source' => 'non-db',
  'module' => 'Contacts',
  'bean_name' => 'Contact',
  'vname' => 'LBL_ASS_HARDWARE_CONTACTS_FROM_CONTACTS_TITLE',
  'id_name' => 'ass_hardware_contactscontacts_ida',
);
$dictionary["ass_hardware"]["fields"]["ass_hardware_contacts_name"] = array (
  'name' => 'ass_hardware_contacts_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_ASS_HARDWARE_CONTACTS_FROM_CONTACTS_TITLE',
  'save' => true,
  'id_name' => 'ass_hardware_contactscontacts_ida',
  'link' => 'ass_hardware_contacts',
  'table' => 'contacts',
  'module' => 'Contacts',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["ass_hardware"]["fields"]["ass_hardware_contactscontacts_ida"] = array (
  'name' => 'ass_hardware_contactscontacts_ida',
  'type' => 'link',
  'relationship' => 'ass_hardware_contacts',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_ASS_HARDWARE_CONTACTS_FROM_ASS_HARDWARE_TITLE',
);
