<?php

//CHECKS IF USER EXISTS
function user_check($useremail) {

	//DECLARES DB CONNECTION AS GLOBAL
	global $db;
	
	$sql = "SELECT id
			FROM user
			WHERE email = ?";	
	$stmt = $db->prepare($sql);	
	$stmt->bind_param('s',$useremail);	
	$stmt->execute();
	
	return ($stmt->fetch()) ? true : false;
}

//RETURN ARRAY OF USER DETAILS
function user_details ($id) {
	global $db;
	$result = $db->query("SELECT * FROM user
						  WHERE id = ".$id);
	return $result->fetch_assoc();
}


//CHECKS CREDENTIALS AGAINST DB
function login ($useremail, $userpass) {

	global $db;
	$encrypt_pass = md5($userpass);

	$sql = "SELECT id
			FROM user
			WHERE email = ?
			AND password = ?";
	$stmt = $db->prepare($sql);	
	$stmt->bind_param('ss',$useremail,$encrypt_pass);	
	$stmt->execute();
	$stmt->bind_result($id);
	
	return ($stmt->fetch()) ? $id : false;
}


//CHECKS IF USER IS LOGGED IN
function logged_in() {
	return (isset($_SESSION['id'])) ? true : false ;
}
?>