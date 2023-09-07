<?php $product = product_details($_GET['id']); ?>
<h1>Edit product details</h1>

<form action="amend-product.php?id=<?php echo $_GET['id']; ?>" method="post" class="amend-table">
	<table class="tab-form">
		<tr>
			<th>Name</th>
			<td><input type="text" name="name" value="<?php echo $product['name']; ?>"/></td>
		</tr>
		<tr>
			<th>ABV</th>
			<td><input type="text" name="abv" value="<?php echo $product['abv']; ?>"/></td>
		</tr>
		<tr>
			<th>Volume (cl)</th>
			<td><input type="text" name="cl"value="<?php echo $product['cl']; ?>"/></td>
		</tr>

		<tr>
			<th>Drink</th>
			<td>
				<select name="drink">
					<option value="Whiskey" <?php if ($product['drink']=="Whiskey"){echo "selected";} ?>>Whiskey</option>
					<option value="Gin" <?php if ($product['drink']=="Gin"){echo "selected";} ?>>Gin</option>
					<option value="Cognac" <?php if ($product['drink']=="Cognac"){echo "selected";} ?>>Cognac</option>
					<option value="Vodka" <?php if ($product['drink']=="Vodka"){echo "selected";} ?>>Vodka</option>
					<option value="Tequila" <?php if ($product['drink']=="Tequila"){echo "selected";} ?>>Tequila</option>
				</select>
			</td>
		</tr>
		<tr>
			<th>Type</th>
			<td><input type="text" name="type" value="<?php echo $product['type']; ?>"/></td>
		</tr>
		<tr>
			<th>Price</th>
			<td><input type="text" name="price" value="<?php echo $product['price']; ?>"/></td>
		</tr>
		<tr>
			<th>Image</th>
			<td><input type="text" name="image" value="<?php echo $product['image']; ?>"/></td>
		</tr>
		<tr>
			<th>Description</th>
			<td><textarea name="desc" maxlength="500"><?php echo $product['description']; ?></textarea></td>
		</tr>
		<tr>
			<th>Created</th>
			<td><?php echo $product['created']; ?></td>
		</tr>
	</table>
	<?php
		if(isset($_SESSION['report'])){
			echo $_SESSION['report'];
			$_SESSION['report'] = null;
		}
	?>
	<br>
	<input type="submit" class="dbutton" name="amendsubmit" value="SAVE CHANGES">
	<a class="dbutton" href="admin-area.php?<?php echo "table=".$_GET['table']; ?>">CANCEL</a>
</form>