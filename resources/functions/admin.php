<?php

//CHECKS ADMIN CREDENTIALS AGAINST DB
function admin_login ($adminuser, $adminpass){

	global $db;
	$encrypt_user = md5($adminuser);
	$encrypt_pass = md5($adminpass);

	$sql = "SELECT adminuser
			FROM admin
			WHERE adminuser = ?
			AND adminpass = ?";
	$stmt = $db->prepare($sql);	
	$stmt->bind_param('ss',$encrypt_user,$encrypt_pass);	
	$stmt->execute();
	//$stmt->bind_result($count);
	
	return ($stmt->fetch()) ? true : false;
	
}

//INSERTS INTO DB - RETURNS REPORT
function insert_db ($query){

	global $db;
	if (mysqli_query($db, $query)){
		return '<p class="success">Row successfully inserted</p>';
	} else {
		return '<p class="error">There was a problem inserting row</p>';
	}
}

//AMENDS A ROW - RETURNS REPORT
function amend_db ($query){

	global $db;
	if (mysqli_query($db, $query)){
		return '<p class="success">Row successfully amended</p>';
	} else {
		return '<p class="error">There was a problem amending row</p>';
	}
}

//DELETES FROM DB - RETURNS REPORT
function delete_db ($table, $id){

	global $db;
	$query = "DELETE FROM ".$table
		   ." WHERE ID = ".$id;
	if (mysqli_query($db, $query)){
		return '<p class="success">Row successfully deleted</p>';
	} else {
		return '<p class="error">There was a problem deleting row</p>';
	}
}



?>