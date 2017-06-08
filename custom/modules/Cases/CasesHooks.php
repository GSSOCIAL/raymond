<?php

class CasesHooks {

    function before_save(&$bean, $event, $arguments) { 
        if ( !empty($bean->fetched_row['id']) ) {
            $fields = $bean->getFieldDefinitions();
            $changed = false;
            foreach ( $fields as $field => $def ) {
                if ( $def['source'] != 'non-db' && !in_array($field, array('date_modified', 'date_entered')) && $bean->$field != $bean->fetched_row[$field] ) {
                    $changed = true; 
                    break;
                }
            }
            if ( $changed ) {
                if ( $bean->status == 'Open_New' ) {
                    $bean->status = 'Open_Assigned';
                }
            }
        }
    }

    function after_relationship_add(&$bean, $event, $arguments) {
        if ( !empty($bean->fetched_row['id']) && $bean->status == 'Open_New' ) {
            if ( $bean->fetched_row['account_id'] != $arguments['related_id'] || $arguments['related_module'] != 'Accounts' ) { 
                $bean->status = 'Open_Assigned';
                $bean->save();
            }
        }
    }

}