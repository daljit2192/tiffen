<?php 
	require_once('../classes/user.php'); 
	$userObj = new User;
	$users = $userObj->getUsers();

	$user = array();
	if (isset($_POST['login'])){
		$userData = array('email'=>$_POST["email"],'password'=>md5($_POST["password"]));
	    $user = $userObj->loginAdmin($userData);
	}
?>