<?php
require_once('include/MVC/Controller/SugarController.php');

class UsersController extends SugarController {

	function action_LoginAs() { 
		global $current_user;
		if(!$current_user->is_admin) die('Error!');

		$user_bean = new User();
		$user_bean->retrieve($this->bean->id);
		if($user_bean->id) {
			$_SESSION['authenticated_user_id'] = $user_bean->id;
			SugarApplication::redirect("index.php");
		}
	}
}
?>