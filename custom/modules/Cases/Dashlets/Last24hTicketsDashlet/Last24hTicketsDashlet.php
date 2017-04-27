<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
/*********************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.

 * SuiteCRM is an extension to SugarCRM Community Edition developed by Salesagility Ltd.
 * Copyright (C) 2011 - 2014 Salesagility Ltd.
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




require_once('include/Dashlets/DashletGeneric.php');


class Last24hTicketsDashlet extends DashletGeneric {

    var $myItemsOnly = false;

    function __construct($id, $def = null) {
        global $current_user, $app_strings;
		require('custom/modules/Cases/Dashlets/Last24hTicketsDashlet/Last24hTicketsDashlet.data.php');

        parent::__construct($id, $def);

        if(empty($def['title'])) $this->title = translate('LBL_LIST_LAST_24h_TICKETS', 'Cases');
        $this->searchFields = $dashletData['Last24hTicketsDashlet']['searchFields'];
        $this->columns = $dashletData['Last24hTicketsDashlet']['columns'];
        $this->seedBean = new aCase();
    }

    /**
     * @deprecated deprecated since version 7.6, PHP4 Style Constructors are deprecated and will be remove in 7.8, please update your code, use __construct instead
     */
    function Last24hTicketsDashlet($id, $def = null){
        $deprecatedMessage = 'PHP4 Style Constructors are deprecated and will be remove in 7.8, please update your code';
        if(isset($GLOBALS['log'])) {
            $GLOBALS['log']->deprecated($deprecatedMessage);
        }
        else {
            trigger_error($deprecatedMessage, E_USER_DEPRECATED);
        }
        self::__construct($id, $def);
    }

    function process($lvsParams = array())
    {
        // Все прикрепленные кейсы за последние 24 часа (добавить такой фильтр по времени)
        $lvsParams['custom_where'] = " AND (`cases`.`assigned_user_id` IS NOT NULL AND `cases`.`assigned_user_id` != '')";
        $lvsParams['custom_where'] .= " AND `cases`.`date_entered` >= STR_TO_DATE('".gmdate("Y-m-d H:i:s", strtotime("-24 hour"))."', '%Y-%m-%d %H:%i:%s')";
        parent::process($lvsParams);
    }

}

?>
