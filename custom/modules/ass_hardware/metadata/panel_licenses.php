<?php 

/**
 * End-function: Check if panel need to display
 */
function display_tab($Bean){
    $display_EditView=false;
    $display_DetailView=true;
    //Return 
    return array(
        "EditView"=>$display_EditView,
        "DetailView"=>$display_DetailView
    );
}
?>