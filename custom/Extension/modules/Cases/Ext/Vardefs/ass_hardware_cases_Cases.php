<?php
// created: 2016-10-26 13:51:38
$dictionary["Case"]["fields"]["ass_hardware_cases"] = array (
  'name' => 'ass_hardware_cases',
  'type' => 'link',
  'relationship' => 'ass_hardware_cases',
  'source' => 'non-db',
  'module' => 'ass_hardware',
  'bean_name' => 'ass_hardware',
  'vname' => 'LBL_ASS_HARDWARE_CASES_FROM_ASS_HARDWARE_TITLE',
  'id_name' => 'ass_hardware_casesass_hardware_ida',
);
$dictionary["Case"]["fields"]["ass_hardware_cases_name"] = array (
  'name' => 'ass_hardware_cases_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_ASS_HARDWARE_CASES_FROM_ASS_HARDWARE_TITLE',
  'save' => true,
  'id_name' => 'ass_hardware_casesass_hardware_ida',
  'link' => 'ass_hardware_cases',
  'table' => 'ass_hardware',
  'module' => 'ass_hardware',
  'rname' => 'name',
);
$dictionary["Case"]["fields"]["ass_hardware_casesass_hardware_ida"] = array (
  'name' => 'ass_hardware_casesass_hardware_ida',
  'type' => 'link',
  'relationship' => 'ass_hardware_cases',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_ASS_HARDWARE_CASES_FROM_CASES_TITLE',
);
