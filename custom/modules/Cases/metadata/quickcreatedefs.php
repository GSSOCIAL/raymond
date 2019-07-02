<?php
$viewdefs ['Cases'] = 
array (
  'QuickCreate' => 
  array (
    'templateMeta' => 
    array (
      'maxColumns' => '2',
      'widths' => 
      array (
        0 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
        1 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
      ),
      'useTabs' => false,
      'tabDefs' => 
      array (
        'DEFAULT' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 'name',
          1 => 'priority',
        ),
        1 => 
        array (
          0 => 'status',
          1 => 'account_name',
        ),
        2 => 
        array (
          0 => 'assigned_user_name',
          1 => 
          array (
            'name' => 'ass_hardware_cases_name',
            'label' => 'LBL_ASS_HARDWARE_CASES_FROM_ASS_HARDWARE_TITLE',
              'customCode' => '
          		{literal}
                        <script>
                            function popup_with_filter()
                            {
                                var account_id = document.getElementsByName("account_id")[0].value;
                                var account_name = document.getElementsByName("account_name")[0].value;
                                var initial_filter_str = "&parent_module=RT_ResursTranslator&ass_hardware_accountsaccounts_ida_advanced="+account_id+"&ass_hardware_accounts_name_advanced="+account_name;
                                open_popup("ass_hardware", 600, 400, initial_filter_str, true, false, {"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"id":"ass_hardware_casesass_hardware_ida","name":"ass_hardware_cases_name"}}, "single", true );
                            }
                        </script>
                        <input name="ass_hardware_cases_name" id="ass_hardware_cases_name" class="sqsEnabled yui-ac-input" size="" value="{/literal}{$fields.ass_hardware_cases_name.value}{literal}" type="text">
                        <input name="ass_hardware_casesass_hardware_ida" id="ass_hardware_casesass_hardware_ida" value="{/literal}{$fields.ass_hardware_casesass_hardware_ida.value}{literal}" type="hidden">
                        <span class="id-ff multiple">
                          <button type="button" name="btn_ass_hardware_cases_name" id="btn_ass_hardware_cases_name" class="button firstChild" value="Выбрать" onclick=\'popup_with_filter()\'>
                            <img src="themes/default/images/id-ff-select.png">
                          </button>
                          <button type="button" name="btn_clr_ass_hardware_cases_name" id="btn_clr_ass_hardware_cases_name" class="button lastChild" onclick=\'this.form.ass_hardware_cases_name.value = ""; this.form.ass_hardware_casesass_hardware_ida.value = "";\' value="Очистить">
                            <img src="themes/default/images/id-ff-clear.png">
                          </button>
                        </span>
            	{/literal}
                                ',
          ),
        ),
        3 => 
        array (
          0 => 'description',
        ),
      ),
    ),
  ),
);
?>
