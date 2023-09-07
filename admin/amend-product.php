<?php
	include "../resources/initiate.php";

	$cl = (double) $_POST['cl'];
	$price = (double) $_POST['price'];
	$drink = $_POST['drink'];
	$name = sanitize_data_trim_spaces($_POST['name']);
	$abv = sanitize_data_trim_spaces($_POST['abv']);
	$type = sanitize_data_trim_spaces($_POST['type']);
	$image = sanitize_data_trim_spaces($_POST['image']);
	$desc = sanitize_data_trim_spaces($_POST['desc']);

	if (empty($name)||!isset($abv)||!isset($cl)||!isset($price)||empty($image)||empty($desc)) {
		$_SESSION['report'] = "<p class=\"error\">Please complete all fields</p>";	
		header('Location: admin-area.php?page=productamend&id='.$_GET['id']);
		} else {
		$id = $_GET['id'];
		$query = "UPDATE product
				 SET name = '$name' , 
					 abv = '$abv' ,
					 drink = '$drink' ,
					 type = '$type' ,
					 image = '$image' ,
					 description = '$desc' ,
					 cl = $cl ,
					 price = $price
				 WHERE id = $id";
		$_SESSION['report'] = amend_db($query);
		header('Location: admin-area.php?page=product');
	}
	
	
	exit();

?>