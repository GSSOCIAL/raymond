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
$dictionary['ass_hardware']['fields']['advanced_license_generator'] = array (
    'required' => false,
    'name' => 'advanced_license_generator',
    'vname' => 'LBL_ADVANCED_LICENSE_GENERATOR',
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
            'name' => 'displayAdvancedLicenseGenerator',
            'returns' => 'html',
            'include' => 'custom/modules/ass_lic/advanced_license_generator.php'
        ),
);