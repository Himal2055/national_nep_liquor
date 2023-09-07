<?php 
session_start();

//COMMENT OUT STATEMENT BELOW FOR DEBUGGING
//error_reporting(0);


require "database/connection.php";
require "functions/generic.php";
require "functions/users.php";
require "functions/products.php";
require "functions/admin.php";
require "functions/cart.php";

$errors = array();
?>