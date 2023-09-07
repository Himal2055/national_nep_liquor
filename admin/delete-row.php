<?php
	require "../resources/initiate.php";
	$_SESSION['report'] = delete_db ($_GET['table'],$_GET['id']);
	header('Location: admin-area.php?page='.$_GET['table']);
?>