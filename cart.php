
<?php
    require_once "config.php";
?>
<?php
	include "resources/initiate.php";
	$title = "Johnny's Liquor";
	$style = "styles/cart.css";
	
	
	foreach ($_POST as $id => $quantity){
		if ($quantity == 0){
			unset($_SESSION['cart'][$id]);
		} else {
			$_SESSION['cart'][$id] = $quantity;
		}
	}
	
	include "components/header.php";
?>

<div id="page">
	<div id="container">
	<h1>Shopping Cart</h1>
		<form id="q" method="post">
			<table id="cart">
				<tr>
					<th></th><th>Product Name</th><th>Price</th><th>Quantity</th><th>Sub-total</th>
				</tr>

		<?php
			$total = 0;
			$names= '';
			foreach($_SESSION['cart'] as $id => $quantity){
						$details = product_details($id);
						$subtotal = $details['price']*$quantity;
						// $previous = $names;
						// $current = $details['name'];
						// $names = $previous.$current;
						echo "<tr>";
						echo "<td><img src=\"product_images/".$details['image']."\" alt=\"".$details['name']."\" width=\"200\" ></td>";
						echo "<td><a href=\"detail.php?product=".$id."\" >".$details['name']."</a></td>";
						echo "<td>&pound;".number_format($details['price'], 2, '.', '')."</td>";
						echo "<td><input type=\"number\" name =\"".$id."\" min=\"0\" value=\"".$quantity."\" style=\" width:3rem; \"/></td>";
						echo "<td>&pound;".number_format($subtotal, 2, '.', '')."</td>";
						echo "</tr>";	
						$total += $subtotal;
					}
		?>
			</table>
		</form>
		<button form="q" formaction="cart.php" type="submit" id="update">Update Cart</button>
		
		<div id="cart-total">
			<?php
				echo "<strong>&pound;".number_format($total, 2, '.', '')."<strong>";
				// echo "<br><a class=\"redbutton\" href=\"checkout-charge.php\">pay with card</a><a class=\"redbutton\" href=\"#\">Checkout</a>";
			?>
		</div>
		<div class="clear"></div>
	</div>
</div>
<form action="stripeIPN.php" method="POST">
	
	<div>

	<!-- <?php echo $total ?> -->
	<!-- <?php echo $details ?> -->
	</div>
                              <script
                                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                data-key="pk_test_51MLRfXSElQU0nvNdKp8B1nsSZY5jswlZCuaIZSSX15xJVDBsXBDXs3UmaJAmU1OVfDUo2rg10SqPcVmmJxZm3u2U00YEcZ6JN3"
                                data-amount=<?php echo $total ?>
                                
                                data-description="widget"
                                data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                                data-locale="auto">
                              </script>
                            </form>
<?php
	include "components/footer.php";
?>