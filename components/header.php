<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title><?php echo $title; ?></title>
		<meta name="description" content="Jonny's liquor">
		<link type="text/css" rel="stylesheet" href="styles/main.css">
		
		<!-- PAGE SPECIFIC STYLES -->
		<link type="text/css" rel="stylesheet" href="<?php echo $style; ?>">

		<!-- MEDIA QUERY STYLESHEETS -->
		<link type="text/css" rel="stylesheet" media="screen and (max-width: 999px)" href="styles/tablet-styles.css" />
		<link type="text/css" rel="stylesheet" media="screen and (max-width: 499px)" href="styles/phone-styles.css" />

		<!-- FONTS -->
		<link href='http://fonts.googleapis.com/css?family=Oswald%7CDroid+Sans' rel='stylesheet' type='text/css'>
	</head>
	<body>
	
	
	
		<div class="container">
		
			<!-- TOP NAVIGATION -->
			<header>
				<div class="top-nav">
					<nav class="top-nav-left">
						<ul>
							<li><a href="index.php"><img src="images/nav-gun.png" alt="gun" height="40" class="gun"></a></li>
							<li><a href="browse.php?drink=whiskey">WHISKEY</a><p>&sdot;</p></li> 
							<li><a href="browse.php?drink=gin">GIN</a><p>&sdot;</p></li>
							<li><a href="browse.php?drink=cognac">COcktail</a><p>&sdot;</p></li>
							<li><a href="browse.php?drink=other">MORE</a></li>
						</ul>
					</nav>
					
					<div class="top-nav-right">
						<form method="get" action="browse.php" id="search-box">
							<input name="search" type="text" placeholder="Search..."/>
						</form>
						
							<?php 
							// CART BUTTON
							if (!empty($_SESSION['cart'])){
								$cartTotal = getCartTotal();
								echo "<a id=\"cart-button\" href=\"cart.php\">";
								// echo "<img src=\"images/cart.png\" alt=\"cart\" width=\"25\"> £".number_format($cartTotal, 2, '.', '');
								echo "</a>";
							}
							echo "<div id=\"user-area\">";
							//SHOWS EITHER 'MY ACCOUNT' OR 'LOGIN | REGISTER'
							if (logged_in()){
								include "user-area.php";
							} else {
								include "user-login.php";
							}
							
							?>
						</div>
					</div>
				</div>
			</header>
			
			