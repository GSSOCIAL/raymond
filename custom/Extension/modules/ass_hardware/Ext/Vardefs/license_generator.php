<?php
$dictionary['ass_hardware']['fields']['license_generator'] = array (
    'required' => false,
    'name' => 'license_generator',
    'vname' => 'LBL_LINE_LICGEN',
    'type' => 'function',
    'source' => 'non-db',
    'massupdate' => 0,
    'importable' => 'false',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => 0,
    'audited' => true,
    'reportable' => false,
    'inline_edit' => false,
    'function' =>
        array(
            'name' => 'display',
            'returns' => 'html',
            'include' => 'modules/ass_lic/license_generator.php'
        ),
);