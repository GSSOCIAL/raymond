<?php
$viewdefs['Cases'] = array(
    'DetailView' => array(
        'templateMeta' => array(
            'form' => array(
                'buttons' => array (
                    'EDIT',
                    'DUPLICATE',
                    'DELETE',
                    'FIND_DUPLICATES',
                    array(
                        'customCode' => '
                        <div class="button-wrapper">
                            {literal}
                            <dropdown-panel label="export">
                                <template scope="dd">
                                    <section class="dropdown-content">
                                        <switch-field
                                        label="With internals"
                                        placeholder="Export with internal updates"
                                        ref="with_internals"
                                        ></switch-field>
                                        <ul>
                                            <li>
                                                <a v-on:click=\'export_document("xml");dd.close();\' {/literal}title="{$MOD.LBL_CONVERT_TO_XML}"{literal}>{/literal}{$MOD.LBL_CONVERT_TO_XML_BUTTON}{literal}</a>
                                            </li>
                                            <li>
                                                <a v-on:click=\'export_document("csv");dd.close();\' {/literal}title="{$MOD.LBL_CONVERT_TO_CSV}"{literal}>{/literal}{$MOD.LBL_CONVERT_TO_CSV_BUTTON}{literal}</a>
                                            </li>
                                            <li>
                                                <a v-on:click=\'export_document("html");dd.close();\' {/literal}title="{$MOD.LBL_CONVERT_TO_HTML}"{literal}>{/literal}{$MOD.LBL_CONVERT_TO_HTML_BUTTON}{literal}</a>
                                            </li>
                                            <li>
                                                <a v-on:click=\'export_document("docx");dd.close();\' {/literal}title="{$MOD.LBL_CONVERT_TO_DOCX}"{literal}>{/literal}{$MOD.LBL_CONVERT_TO_DOCX_BUTTON}{literal}</a>
                                            </li>
                                        </ul>
                                    </section>
                                </template>
                            </dropdown-panel>
                            {/literal}
                        </div>',
                    ),
                    array(
                        'customCode' => '<input type="submit" class="button" title="{$MOD.LBL_CONVERT_TO_XML}" onclick="window.bean_server.export(\'xml\');return false;" value="{$MOD.LBL_CONVERT_TO_XML_BUTTON}"/>',
                    ),
                    array(
                        'customCode' => '<input type="submit" class="button" title="{$MOD.LBL_CONVERT_TO_CSV}" onclick="window.bean_server.export(\'csv\');return false;" value="{$MOD.LBL_CONVERT_TO_CSV_BUTTON}"/>',
                    ),
                    array(
                        'customCode' => '<input type="submit" class="button" title="{$MOD.LBL_CONVERT_TO_HTML}" onclick="window.bean_server.export(\'html\');return false;" value="{$MOD.LBL_CONVERT_TO_HTML_BUTTON}"/>',
                    ),
                    array(
                        'customCode' => '<input type="submit" class="button" title="{$MOD.LBL_CONVERT_TO_DOCX}" onclick="window.bean_server.export(\'docx\');return false;" value="{$MOD.LBL_CONVERT_TO_DOCX_BUTTON}"/>',
                    ),
                ),
            ),
            'maxColumns' => '2',
            'widths' => array(
                0 => array(
                    'label' => '10',
                    'field' => '30',
                ),
                1 => array(
                    'label' => '10',
                    'field' => '30',
                ),
            ),
            'includes' => array(
                array(
                    'file' => 'custom/include/js/bean_export.js',
                ),
                array(
                    'file' => "modules/Cases/js/copyToClipboard.js",
                ),
                array(
                    'file' => 'include/javascript/tinymce/tinymce.min.js',
                ),
                array(
                    'file' => 'custom/modules/Cases/include/detail.js',
                ),
            ),
            'useTabs' => true,
            'tabDefs' => 
            array (
                'LBL_CASE_INFORMATION' => 
                array (
                'newTab' => true,
                'panelDefault' => 'expanded',
                ),
                'LBL_AOP_CASE_UPDATES' => 
                array (
                'newTab' => false,
                'panelDefault' => 'expanded',
                ),
            ),
        ),
        'panels' => array (
            'lbl_case_information' => 
            array (
                array(
                    0 => array(
                        'name' => 'case_number',
                        'label' => 'LBL_CASE_NUMBER',
                    ),
                    1 => 'priority',
                ),
                array(
                    0 => array(
                        'name' => 'state',
                        'comment' => 'The state of the case (i.e. open/closed)',
                        'label' => 'LBL_STATE',
                    ),
                    1 => 'status',
                ),
                array(
                    0 => 'type',
                    1 => 'account_name',
                ),
                array(
                    0 =>array(
                            'name' => 'assigned_user_name',
                            'label' => 'LBL_ASSIGNED_TO',
                    ),
                    1 =>array (
                        'name' => 'ass_hardware_cases_name',
                    ),
                ),
                array (
                    0 => array (
                        'name' => 'date_entered',
                        'customCode' => '{$fields.date_entered.value} {$APP.LBL_BY} {$fields.created_by_name.value}',
                    ),
                    1 => array (
                        'name' => 'date_modified',
                        'label' => 'LBL_DATE_MODIFIED',
                        'customCode' => '{$fields.date_modified.value} {$APP.LBL_BY} {$fields.modified_by_name.value}',
                    ),
                ),
                array (
                    0 => 'resolution',
                    1 => array (
                        'name' => 'last_action_c',
                        'studio' => 'visible',
                        'label' => 'LBL_LAST_ACTION',
                    ),
                ),
                array(
                    0 =>array (
                        'name' => 'ip_eth0',
                        'studio' => 'visible',
                        'label' => 'LBL_IP_ETH0',
                    ),
                    1 =>array (
                        'name' => 'instal_name',
                        'studio' => 'visible',
                        'label' => 'LBL_INSTAL_NAME',
                    ),
                ),
                array (
                    0 =>array (
                        'name' => 'copyWebPassword',
                        'customCode' => '{$COPY_WEB_PASSWORD_BUTTON}',
                    ),
                    1 =>array (
                        'name' => 'copyRootPassword',
                        'customCode' => '{$COPY_ROOT_PASSWORD_BUTTON}',
                    ),
                ),
            ),
            'LBL_AOP_CASE_UPDATES' => array(
                array(
                    array(
                        'name' => 'aop_case_updates_threaded',
                        'studio' => 'visible',
                        'label' => 'LBL_AOP_CASE_UPDATES_THREADED',
                    ),
                ),
            ),
        ),
    ),
);
?>
