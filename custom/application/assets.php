<?php

class CustomAssets{
    /**
     * connect user defined scripts
     * @param String $event Event name
     * @param Mixed $args Arguments
     * @return Boolean true
     */
    function render_javascript($event,$args){
        //Do not render for ajax
        if(is_array($_REQUEST) && !array_key_exists("to_pdf",$_REQUEST) && !array_key_exists("to_json",$_REQUEST)){
            //Vue library & components
            if(file_exists("custom/include/js/vue/vue.min.js")){
                echo("<script type=\"text/javascript\" src=\"custom/include/js/vue/vue.min.js\"></script>");
            }
            if(file_exists("custom/include/js/vue/components/basic.js")){
                echo("<script type=\"text/javascript\" src=\"custom/include/js/vue/components/basic.js\"></script>");
            }
            //Scroll
            if(file_exists("custom/include/js/fakescroll/fakescroll.js")){
                echo("<script type=\"text/javascript\" src=\"custom/include/js/fakescroll/fakescroll.js\"></script>");
            }
        }
        return true;
    }
}