<?php
	include "resources/initiate.php";
	$title = "Johnny's Liquor - ".display_name("product", $_GET['product']);
	$style = "styles/detail.css";
	include "components/header.php";
	$detail = product_details($_GET['product']);
?>
<div id="product-box">
<?php echo "
	<h1>".$detail['name']."</h1>
	<div class=\"details\">
		<ul>
			<li><span class=\"attribute\">Type: </span>".$detail['type']."</li>
			<li><span class=\"attribute\">Volume: </span>".$detail['cl']."cl</li>
			<li><span class=\"attribute\">ABV: </span>".$detail['abv']."&#37;</li>
		</ul>
		<p>".$detail['description']."</p>
	</div>
	<img src=\"product_images/".$detail['image']."\" alt=\"".$detail['name']."\">
	<div class=\"actions\">
		<span class=\"price\">&pound;".number_format($detail['price'], 2, '.', '')."</span>
		<span class=\"price-exc-vat\">Price exc. VAT: &pound;".number_format($detail['price']/1.2, 2, '.', '')."</span>
		<form action=\"addtocart.php?\">
			<input type=\"hidden\" name=\"id\" value=\"".$detail['id']."\" />
			Quantity: <input type=\"number\" name=\"quantity\" value=\"1\" />
			<br/>
			<button class=\"add-to-basket\" type=\"submit\">Add To Basket</button>
		</form>
	</div>

" ?>

</div>
<div id="divider">
</div>
<!-- <h2>Similar Products</h2> -->
<?php
	// RETURNS 4 RANDOM PRODUCTS FROM SAME CATEGORY
	// $sql = "SELECT * FROM product WHERE drink = '".$detail['drink']."' AND id != '".$detail['id']."' ORDER BY RAND() LIMIT 4";
	// $page=mysqli_query($db, $sql);
	// while ($row=mysqli_fetch_assoc($page)) { 
		// echo product_thumb($row);
	// }


?>
<?php include "components/footer.php"; ?>