
<?php
    require_once "config.php";
?>
  <?php
	include "resources/initiate.php";
	$title = "national-nep- Liquor";
	$style = "styles/cart.css";
	
	
	if (!isset($_SESSION['cart'])){
		$_SESSION['cart']=array();
	}
	$wasAddedToCart = addToCart($_GET['id'],$_GET['quantity']);
	
	include "components/header.php";
?>

<div id="page">

	<?php	
		if($wasAddedToCart){
			$details = product_details($_GET['id']);
			
			echo "<img class=\"pimage\" src=\"product_images/".$details['image']."\" alt=\"".$details['name']."\">";
			echo "<p class=\"bigoldtext\"><strong>".$details['name']." (".$_GET['quantity'].")</strong> was added to cart.<br/><br/>Where would you like to go next?</p>";
			echo "<a class=\"\" href=\"config.php\">.</a> <a class=\"redbutton\" href=\"cart.php\">View Cart</a>";
			
		} else {
			echo "<p class=\"error\">There was a problem retrieving the item details</p>";
		}
		
	?>
	<div class="clear"> </div>
</div>


<?php
	include "components/footer.php";
?>

