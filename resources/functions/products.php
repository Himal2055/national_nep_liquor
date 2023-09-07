<?php

//RETURN ARRAY OF PRODUCT DETAILS
function product_details ($id) {
	global $db;
	$result = $db->query("SELECT * FROM product
						  WHERE id = ".$id);
	return $result->fetch_assoc();
}

//RETURNS THUMBNAIL OF PRODUCT
function product_thumb ($product) {
	if  (empty($product['image'])){$product['image']="noimage.jpg";}
	return "
	<div class=\"thumb\">
		<a href=\"detail.php?product=".$product['id']."\">
			<h3>".$product['name']."</h3>
			<img src=\"product_images/".$product['image']."\" alt=\"".$product['name']."\">
		</a>
		<p>".$product['cl']."cl | ".$product['abv']."&#37; &nbsp; &nbsp; &pound;".number_format($product['price'], 2, '.', '')."</p>
		<a class=\"add-to-basket\" href=\"addtocart.php?id=".$product['id']."&quantity=1\">Add To Basket</a>
	</div>";
}

//RETURNS BAR OF PRODUCT
function product_bar ($product) {
	if  (empty($product['image'])){$product['image']="noimage.jpg";}
	return "
	<div class=\"bar\">
		<a href=\"detail.php?product=".$product['id']."\">
			<img src=\"product_images/".$product['image']."\" alt=\"".$product['name']."\">
		</a>
		<div class=\"details\">
			<h3>".$product['name']."</h3>
			<p>".$product['cl']."cl | ".$product['abv']."&#37;</p>
			<p class=\"desc\">".$product['description']."</p>
			<p>&pound;".number_format($product['price'], 2, '.', '').
			" <a class=\"add-to-basket\" href=\"addtocart.php?id=".$product['id']."&quantity=1\">Add To Basket</a></p>
		</div>
		<div class=\"space\"> </div>
	</div>";
}

//BUILDS DB QUERY FROM FILTERS
function construct_query () {
	$filters = array();
	$query = "SELECT * FROM product ";
	$limit = "";

	//SEARCH
	if (isset($_GET['search'])) {$filters[] = "name LIKE '%".$_GET['search']."%'";}
	
	//DRINK
	if (isset($_GET['drink']) && $_GET['drink'] != "all" && $_GET['drink'] != "other") {$filters[] = "drink = '".$_GET['drink']."'";}
	if (isset($_GET['drink']) && $_GET['drink'] == "other") {$filters[] = "drink NOT IN ('whiskey', 'gin', 'cognac')";}
	
	//PRICE
	if (isset($_GET['minprice']) && isset($_GET['maxprice'])) {
		$min = (float) $_GET['minprice'];
		$max = (float) $_GET['maxprice'];
		if (!empty($min) && !empty($max) && ($max > $min)) {
			$filters[] = "price BETWEEN ".$min." AND ".$max;
		}
	}
	
	//STRENGTH
	if (isset($_GET['strength']) && $_GET['strength'] != 1) {
		 {
		     if ($_GET['strength'] == 2) {$filters[] = "abv <= 41";}
		else if ($_GET['strength'] == 3) {$filters[] = "abv BETWEEN 41 AND 46";}
		else if ($_GET['strength'] == 4) {$filters[] = "abv > 46";}
		}
	}
		
	
	if (!empty($filters)) { $query .= "WHERE "; }
	$filterstring = implode(" AND ", $filters);
	if (isset($_GET['order'])){$filterstring.=" ORDER BY ".str_replace("-"," ",$_GET['order']);}
	return $query.$filterstring;
	
	
	
}

//GATHERS FILTERS FOR GET VARIABLE
function get_filters() {
	$filters = array();
	$filterstring = "";
	
	//SEARCH
	if (isset($_GET['search'])) {$filters[] = "search=".$_GET['search'];}
	
	//DRINK
	if (isset($_GET['drink']) && $_GET['drink'] != "all" && $_GET['drink'] != "other") {$filters[] = "drink=".$_GET['drink'];}
	if (isset($_GET['drink']) && $_GET['drink'] == "other") {$filters[] = "drink=other";}
	
	//PRICE
	if (isset($_GET['minprice']) && isset($_GET['maxprice'])) {
		$min = (float) $_GET['minprice'];
		$max = (float) $_GET['maxprice'];
		if (!empty($min) && !empty($max) && ($max > $min)) {
			$filters[] = "minprice=".$_GET['minprice']."&maxprice=".$_GET['maxprice'];
		}
	}
	
	//STRENGTH
	if (isset($_GET['strength']) && $_GET['strength'] != 1) {
		$filters[] = "strength=".$_GET['strength'];
	}

	//VIEW
	if (isset($_GET['view'])) {
		$filters[] = "view=".$_GET['view'];
	}

	//$_GET['drink'] != "all"
	if (!empty($filters)) {
		$filterstring = implode("&", $filters);
		if (isset($_GET['order'])){$filterstring.="&order=".$_GET['order'];}
		return $filterstring;
	}
}

//CHECKS IF PRODUCT EXISTS
function product_check($id) {

	//DECLARES DB CONNECTION AS GLOBAL
	global $db;
	
	$sql = "SELECT id
			FROM product
			WHERE id = ?";	
	$stmt = $db->prepare($sql);	
	$stmt->bind_param('s',$id);	
	$stmt->execute();
	
	return ($stmt->fetch()) ? true : false;
}
?>