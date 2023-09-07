<?php
include "initiate.php";

if (empty($_POST) === false) {

	$useremail = sanitize_data_trim_spaces($_POST['useremail']);
	$userpass = sanitize_data_trim_spaces($_POST['userpass']);
	
	if(empty($useremail)||empty($userpass)) {
		$_SESSION['error'] = "You need to enter a username and password";
	} else if (user_check($useremail) === false) {
		$_SESSION['error'] = "No such user";
	} else {
		$login = login($useremail, $userpass);
		if ($login === false) {
			$_SESSION['error'] = "Incorrect password";
		} else {
			$_SESSION['id'] = $login;
			$_SESSION['error'] = null;
			
		}
	}
	
	header('Location: ../index.php');
	exit();

}


?>