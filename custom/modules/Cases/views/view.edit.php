<?php
/*********************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.
 *
 * SuiteCRM is an extension to SugarCRM Community Edition developed by Salesagility Ltd.
 * Copyright (C) 2011 - 2016 Salesagility Ltd.
 *
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 *
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 *
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 *
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 *
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo and "Supercharged by SuiteCRM" logo. If the display of the logos is not
 * reasonably feasible for  technical reasons, the Appropriate Legal Notices must
 * display the words  "Powered by SugarCRM" and "Supercharged by SuiteCRM".
 ********************************************************************************/
require_once('include/MVC/View/views/view.edit.php');
require_once('include/SugarTinyMCE.php');

class CasesViewEdit extends ViewEdit {

    function __construct(){
        parent::__construct();
    }

    /**
     * @deprecated deprecated since version 7.6, PHP4 Style Constructors are deprecated and will be remove in 7.8, please update your code, use __construct instead
     */
    function CasesViewEdit(){
        $deprecatedMessage = 'PHP4 Style Constructors are deprecated and will be remove in 7.8, please update your code';
        if(isset($GLOBALS['log'])) {
            $GLOBALS['log']->deprecated($deprecatedMessage);
        }
        else {
            trigger_error($deprecatedMessage, E_USER_DEPRECATED);
        }
        self::__construct();
    }


    function display(){

        $this->ss->assign('INITIAL_FILTER_ACC', "&ass_hardware_accountsaccounts_ida_advanced=" . urlencode($this->bean->account_id) . "&ass_hardware_accounts_name_advanced=" . urlencode($this->bean->account_name));

        parent::display();

        global $sugar_config;
        $new = empty($this->bean->id);
        if($new){
            ?>
            <script>
                $(document).ready(function(){
                    $('#update_text').closest('.edit-view-row-item').html('');
                    $('#update_text_label').closest('.edit-view-row-item').html('');
                    $('#internal').closest('.edit-view-row-item').html('');
                    $('#internal_label').closest('.edit-view-row-item').html('');
                    $('#addFileButton').closest('.edit-view-row-item').html('');
                    $('#case_update_form_label').closest('.edit-view-row-item').html('');
                });
            </script>
        <?php
        }

        $tiny = new SugarTinyMCE();
        echo $tiny->getInstance('update_text,description', 'email_compose_light');


        $quicksearch_js = <<<EQQ
        <script type="text/javascript" language="javascript">
            sqs_objects['EditView_ass_hardware_cases_name']['group'] = "and"; 
            sqs_objects['EditView_ass_hardware_cases_name']['conditions'].push({"name":"ass_hardware_accountsaccounts_ida","op":"equal","end":"%","value":$('#account_id').val()}); 
        </script>
EQQ;

        echo $quicksearch_js;

    }

}