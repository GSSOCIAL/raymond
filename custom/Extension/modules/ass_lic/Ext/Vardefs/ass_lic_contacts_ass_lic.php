<?php
// created: 2016-10-26 13:51:38
$dictionary["ass_lic"]["fields"]["ass_lic_contacts"] = array (
  'name' => 'ass_lic_contacts',
  'type' => 'link',
  'relationship' => 'ass_lic_contacts',
  'source' => 'non-db',
  'module' => 'Contacts',
  'bean_name' => 'Contact',
  'vname' => 'LBL_ASS_LIC_CONTACTS_FROM_CONTACTS_TITLE',
  'id_name' => 'ass_lic_contactscontacts_ida',
);
$dictionary["ass_lic"]["fields"]["ass_lic_contacts_name"] = array (
  'name' => 'ass_lic_contacts_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_ASS_LIC_CONTACTS_FROM_CONTACTS_TITLE',
  'save' => true,
  'id_name' => 'ass_lic_contactscontacts_ida',
  'link' => 'ass_lic_contacts',
  'table' => 'contacts',
  'module' => 'Contacts',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["ass_lic"]["fields"]["ass_lic_contactscontacts_ida"] = array (
  'name' => 'ass_lic_contactscontacts_ida',
  'type' => 'link',
  'relationship' => 'ass_lic_contacts',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_ASS_LIC_CONTACTS_FROM_ASS_LIC_TITLE',
);
