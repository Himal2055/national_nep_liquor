<?php
include "initiate.php";

if (empty($_POST) === false) {

	$fname = sanitize_data_trim_spaces($_POST['fname']);
	$lname = sanitize_data_trim_spaces($_POST['lname']);
	$gender = sanitize_data_trim_spaces($_POST['gender']);
	$email = sanitize_data_trim_spaces($_POST['email']);
	$password = sanitize_data_trim_spaces($_POST['password']);
	$cpassword = sanitize_data_trim_spaces($_POST['cpassword']);
	
	if(empty($fname)||empty($lname)||empty($gender)||empty($email)||empty($password)||empty($cpassword)) {
		$_SESSION['error'] = "Please complete all fields";
	} else if (user_check($useremail) == true) {
		$_SESSION['error'] = "That email address is already registered";
	} else if ($password != $cpassword){
		$_SESSION['error'] = "Passwords do not match";
	} else {
	
		// ATTEMPT REGISTRATION
		$password = md5($password);
		try {
			global $db;
			
			$sql = "INSERT INTO user (fname, lname, gender, email, password)
					VALUES (?, ?, ?, ?, ?)";
			$stmt = $db->prepare($sql);	
			$stmt->bind_param('sssss',$fname,$lname,$gender,$email,$password);	
			$stmt->execute();
			
			header('Location: ../welcome.php');
		
		} catch (exception $e) {
			$_SESSION['error'] = "Problem connecting to database";
			header('Location: ../index.php');
		}
	}
}
	header('Location: ../register.php');
	exit();

?>