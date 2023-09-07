<?php
	include "../resources/initiate.php";

	$fname = sanitize_data_trim_spaces($_POST['fname']);
	$lname = sanitize_data_trim_spaces($_POST['lname']);
	$gender = $_POST['gender'];
	$email = sanitize_data_trim_spaces($_POST['email']);

	if (empty($fname)||empty($lname)||empty($gender)||empty($email)) {
		$_SESSION['report'] = "Please complete all fields";	
		header('Location: admin-area.php?page=useramend');
		} else {
		$id = $_GET['id'];
		$query = "UPDATE user
				 SET fname = '$fname',
					 lname = '$lname',
					 gender = '$gender',
					 email = '$email'
				 WHERE id = $id";
		$_SESSION['report'] = amend_db($query);
		header('Location: admin-area.php?page=user');
	}
	
	
	exit();

?>