<?php

$dictionary["Case"]["fields"]["spent_time"] = array (
    "name" => "spent_time",
    "type" => "enum",
    "vname" => "LBL_SPENT_TIME",
    "reportable" => false,
    "inline_edit"=>true,
    "options"=>"cases_timespent_list"
);

/**
 * Created by PhpStorm.
 * User: lulu
 * Date: 19.01.18
 * Time: 13:14
 */

$dictionary["Case"]["fields"]["ip_eth0"] = array (
    'required' => false,
    'name' => 'ip_eth0',
    'vname' => 'LBL_IP_ETH0',
    'type' => 'varchar',
    'massupdate' => 0,
    'no_default' => false,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => false,
    'inline_edit' => true,
    'reportable' => true,
    'unified_search' => false,
    'merge_filter' => 'disabled',
    'len' => '255',
    'size' => '20',
);

$dictionary["Case"]["fields"]['instal_name'] =
  array (
      'required' => false,
      'name' => 'instal_name',
      'vname' => 'LBL_INSTAL_NAME',
      'type' => 'varchar',
      'massupdate' => 0,
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'inline_edit' => true,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'len' => '255',
      'size' => '20',
  );




//$dictionary["Case"]["fields"]["ip_eth1"] = array (
//    'required' => false,
//    'name' => 'ip_eth1',
//    'vname' => 'LBL_IP_ETH1',
//    'type' => 'varchar',
//    'massupdate' => 0,
//    'no_default' => false,
//    'comments' => '',
//    'help' => '',
//    'importable' => 'true',
//    'duplicate_merge' => 'disabled',
//    'duplicate_merge_dom_value' => '0',
//    'audited' => false,
//    'inline_edit' => true,
//    'reportable' => true,
//    'unified_search' => false,
//    'merge_filter' => 'disabled',
//    'len' => '255',
//    'size' => '20',
//);
//
//$dictionary["Case"]["fields"]["ip_ipmi"] = array (
//    'required' => false,
//    'name' => 'ip_ipmi',
//    'vname' => 'LBL_IP_IPMI',
//    'type' => 'varchar',
//    'massupdate' => 0,
//    'no_default' => false,
//    'comments' => '',
//    'help' => '',
//    'importable' => 'true',
//    'duplicate_merge' => 'disabled',
//    'duplicate_merge_dom_value' => '0',
//    'audited' => false,
//    'inline_edit' => true,
//    'reportable' => true,
//    'unified_search' => false,
//    'merge_filter' => 'disabled',
//    'len' => '255',
//    'size' => '20',
//);


$dictionary['Case']['fields']['description']['dbType']='longtext';
