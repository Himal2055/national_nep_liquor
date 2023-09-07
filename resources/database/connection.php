<?php 

	//Student server
	//$db = new mysqli('localhost', 'c3333022', 'garden454','c3333022');
	
    //XAMPP server
	$db = new mysqli('localhost', 'root', '','simdb');
	
	
	
	
	if($db->connect_errno) {
		die('Unable to connect to database');
	}


?>