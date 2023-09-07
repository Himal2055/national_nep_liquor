<?php

//REMOVES WHITESPACE AND SOME SPECIAL CHARS
function sanitize_data_no_spaces($input) {
	global $db;
	$input = preg_replace('/\s+/', '', $input);//REMOVES ALL WHITESPACE
	$input = mysqli_real_escape_string($db, $input);
	$input = filter_var($input, FILTER_SANITIZE_STRING);
	return $input;
}

//TRIMS WHITESPACE AND REMOVES SOME SPECIAL CHARS
function sanitize_data_trim_spaces($input) {
	global $db;
	$input = trim($input);
	$input = mysqli_real_escape_string($db, $input);
	$input = filter_var($input, FILTER_SANITIZE_STRING);
	return $input;
}

//RETURNS NAME FROM ID
function display_name ($table, $id){

	global $db;
	if ($table == "product"){
		$name = $db->query("SELECT name FROM product WHERE id = ".$id)->fetch_object()->name;
	} else if ($table == "user"){
		$fname = $db->query("SELECT fname FROM user WHERE id = ".$id)->fetch_object()->fname;
		$lname = $db->query("SELECT lname FROM user WHERE id = ".$id)->fetch_object()->lname;
		$name = $fname." ".$lname;
	}
	return $name;
	
}

?>