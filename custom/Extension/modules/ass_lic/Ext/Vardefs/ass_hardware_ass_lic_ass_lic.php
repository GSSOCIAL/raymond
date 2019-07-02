<?php
// created: 2016-10-26 13:51:38
$dictionary["ass_lic"]["fields"]["ass_hardware_ass_lic"] = array (
  'name' => 'ass_hardware_ass_lic',
  'type' => 'link',
  'relationship' => 'ass_hardware_ass_lic',
  'source' => 'non-db',
  'module' => 'ass_hardware',
  'bean_name' => 'ass_hardware',
  'vname' => 'LBL_ASS_HARDWARE_ASS_LIC_FROM_ASS_HARDWARE_TITLE',
  'id_name' => 'ass_hardware_ass_licass_hardware_ida',
);
$dictionary["ass_lic"]["fields"]["ass_hardware_ass_lic_name"] = array (
  'name' => 'ass_hardware_ass_lic_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_ASS_HARDWARE_ASS_LIC_FROM_ASS_HARDWARE_TITLE',
  'save' => true,
  'id_name' => 'ass_hardware_ass_licass_hardware_ida',
  'link' => 'ass_hardware_ass_lic',
  'table' => 'ass_hardware',
  'module' => 'ass_hardware',
  'rname' => 'name',
);
$dictionary["ass_lic"]["fields"]["ass_hardware_ass_licass_hardware_ida"] = array (
  'name' => 'ass_hardware_ass_licass_hardware_ida',
  'type' => 'link',
  'relationship' => 'ass_hardware_ass_lic',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_ASS_HARDWARE_ASS_LIC_FROM_ASS_LIC_TITLE',
);
