<?php 

/**
 * End-function: Check if panel need to display
 */
function display_tab($Bean){
    $display_EditView=false;
    $display_DetailView=!(empty($Bean->name)||empty($Bean->hard_id));
    //Return 
    return array(
        "EditView"=>$display_EditView,
        "DetailView"=>$display_DetailView
    );
}
?>