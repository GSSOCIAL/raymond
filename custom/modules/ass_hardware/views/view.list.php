<?php
/**
 * Created by PhpStorm.
 * User: lulu
 * Date: 14.03.17
 * Time: 16:16
 */

if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
require_once('include/MVC/View/views/view.list.php');

class ass_hardwareViewList extends ViewList {


    function display()
    {
        echo('<script type="text/javascript" src="custom/include/SugarFields/Fields/Cstmpass/clipboard.min.js"></script>');
        parent::display();


    }

}
