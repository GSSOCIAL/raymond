<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');



class TemplateCstmpass extends TemplateText{
    var $max_size = 50;
    var $type='cstmpass';
    var $supports_unified_search = false;
	var $inline_edit = 0;
    
    /**
     * __construct
     * 
     * Constructor for TemplateCstmpass class. This constructor ensures that TemplateCstmpass instances have the
     * validate_usa_format vardef value.
     */
    function __construct()
	{
	}
	
	/**
	 * get_field_def
	 * 
	 * @see parent::get_field_def
	 * This method checks to see if the validate_usa_format key/value entry should be
	 * added to the vardef entry representing the module
	 */	
    function get_field_def(){
		$def = parent::get_field_def();
		$def['dbType'] = 'varchar';
		$def['studio'] = 'visible';
		$def['inline_edit'] = 0;
		$def['type'] = 'cstmpass';

		return $def;	
	}
}


?>
