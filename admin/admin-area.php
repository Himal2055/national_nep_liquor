<?php 
include "../resources/initiate.php";
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>national-nep-Liquor - Admin</title>
		<meta name="description" content="national-nep-Liquor admin page">
		<link type="text/css" rel="stylesheet" href="../styles/main.css">
		
		<!-- PAGE SPECIFIC STYLES -->
		<link type="text/css" rel="stylesheet" href="../styles/admin.css">

		<!-- FONTS -->
		<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
	</head>
	<body>
		<div id="window">
			<h1><span>national-nep-Liquor//</span>Administration</h1>
			<a href="admin-area.php?page=product" class="table">PRODUCTS</a>
			<a href="admin-area.php?page=user" class="table">USERS</a>
			<a href="admin-area.php?page=todays-orders" class="table">todays-orders</a>
			<a href="../resources/logout.php" id="logout">LOG OUT</a>
			<div id="workspace">
				<?php 
					if(!isset($_GET['page'])){$_GET['page']="products";}
					switch ($_GET['page']) {
						case "user": include "admin-users.php";
						break;
						case "product": include "admin-products.php";
						break;
						case "delete": include "admin-delete.php";
						break;
						case "productamend": include "admin-products-amend.php";
						break;
						case "useramend": include "admin-users-amend.php";
						break;
						default: include "admin-products.php";
					};
				?>
			</div>
		</div>
	</body>
</html>