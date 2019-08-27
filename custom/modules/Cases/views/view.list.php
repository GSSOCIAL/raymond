<?php

if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
require_once('modules/Cases/views/view.list.php');

class CustomCasesViewList extends CasesViewList{
    function display(){
        $ss = new Sugar_Smarty();
        $ss->display("custom/modules/Cases/tpls/view.edit.tpl");
        parent::display();
    }
}

?>
