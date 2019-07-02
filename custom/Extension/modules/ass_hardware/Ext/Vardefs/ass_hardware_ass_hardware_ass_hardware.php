<?php
// created: 2016-10-26 13:51:38
$dictionary["ass_hardware"]["fields"]["ass_hardware_ass_hardware"] = array (
  'name' => 'ass_hardware_ass_hardware',
  'type' => 'link',
  'relationship' => 'ass_hardware_ass_hardware',
  'source' => 'non-db',
  'module' => 'ass_hardware',
  'bean_name' => 'ass_hardware',
  'vname' => 'LBL_ASS_HARDWARE_ASS_HARDWARE_FROM_ASS_HARDWARE_L_TITLE',
  'id_name' => 'ass_hardware_ass_hardwareass_hardware_ida',
);
$dictionary["ass_hardware"]["fields"]["ass_hardware_ass_hardware"] = array (
  'name' => 'ass_hardware_ass_hardware',
  'type' => 'link',
  'relationship' => 'ass_hardware_ass_hardware',
  'source' => 'non-db',
  'module' => 'ass_hardware',
  'bean_name' => 'ass_hardware',
  'vname' => 'LBL_ASS_HARDWARE_ASS_HARDWARE_FROM_ASS_HARDWARE_R_TITLE',
  'id_name' => 'ass_hardware_ass_hardwareass_hardware_ida',
);
$dictionary["ass_hardware"]["fields"]["ass_hardware_ass_hardware_name"] = array (
  'name' => 'ass_hardware_ass_hardware_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_ASS_HARDWARE_ASS_HARDWARE_FROM_ASS_HARDWARE_R_TITLE',
  'save' => true,
  'id_name' => 'ass_hardware_ass_hardwareass_hardware_ida',
  'link' => 'ass_hardware_ass_hardware',
  'table' => 'ass_hardware',
  'module' => 'ass_hardware',
  'rname' => 'name',
);
$dictionary["ass_hardware"]["fields"]["ass_hardware_ass_hardware_name"] = array (
  'name' => 'ass_hardware_ass_hardware_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_ASS_HARDWARE_ASS_HARDWARE_FROM_ASS_HARDWARE_L_TITLE',
  'save' => true,
  'id_name' => 'ass_hardware_ass_hardwareass_hardware_ida',
  'link' => 'ass_hardware_ass_hardware',
  'table' => 'ass_hardware',
  'module' => 'ass_hardware',
  'rname' => 'name',
);
$dictionary["ass_hardware"]["fields"]["ass_hardware_ass_hardwareass_hardware_ida"] = array (
  'name' => 'ass_hardware_ass_hardwareass_hardware_ida',
  'type' => 'link',
  'relationship' => 'ass_hardware_ass_hardware',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'left',
  'vname' => 'LBL_ASS_HARDWARE_ASS_HARDWARE_FROM_ASS_HARDWARE_R_TITLE',
);
$dictionary["ass_hardware"]["fields"]["ass_hardware_ass_hardwareass_hardware_ida"] = array (
  'name' => 'ass_hardware_ass_hardwareass_hardware_ida',
  'type' => 'link',
  'relationship' => 'ass_hardware_ass_hardware',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'left',
  'vname' => 'LBL_ASS_HARDWARE_ASS_HARDWARE_FROM_ASS_HARDWARE_L_TITLE',
);
