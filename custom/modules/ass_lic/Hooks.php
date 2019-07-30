<?php
/**
 * Created by PhpStorm.
 * User: lulu
 * Date: 10.05.17
 * Time: 14:05
 */

class assLicHooks {
    function genLic (SugarBean &$bean, $event, $arguments) {
        make_license($bean,array());    
    }
}
