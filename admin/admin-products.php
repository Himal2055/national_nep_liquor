<?php
	if(isset($_POST['productsubmit'])){
	$cl = (double) $_POST['cl'];
	$price = (double) $_POST['price'];
	$drink = $_POST['drink'];
	$name = sanitize_data_trim_spaces($_POST['name']);
	$abv = sanitize_data_trim_spaces($_POST['abv']);
	$type = sanitize_data_trim_spaces($_POST['type']);
	$image = sanitize_data_trim_spaces($_POST['image']);
	$desc = sanitize_data_trim_spaces($_POST['desc']);
		$query = "INSERT INTO product
                    (name, drink, type, cl, abv, price, description, image)
                  VALUES
                    ('$name','$drink','$type','$cl','$abv','$price', '$desc','$image')";
		$_SESSION['report'] = insert_db($query);
	}
?>

<div class="db-table">
	<h2>Products</h2>
<?php
	include "../components/filter.php";
	if(isset($_SESSION['report'])){
		echo $_SESSION['report'];
		$_SESSION['report'] = null;
	}
	global $db;
	$query=construct_query();//"SELECT * FROM product";
	$fetch=mysqli_query($db, $query);


	echo "<table><tr>
					<th>ID</th>
					<th>DRINK</th>
					<th>TYPE</th>
					<th>NAME</th>
					<th>ABV</th>
					<th>VOLUME</th>
					<th>PRICE</th>
					<th>IMAGE</th>
					<th>ACTIONS</th>
				</tr>";
	while ($row=mysqli_fetch_assoc($fetch)){
		if (empty($row['image'])){$row['image']="noimage.jpg";}
		echo "<tr>
				<td>".$row['id']."</td>
				<td>".$row['drink']."</td>
				<td>".$row['type']."</td>
				<td>".$row['name']."</td>
				<td>".$row['abv']."&#37;</td>
				<td>".$row['cl']."cl</td>
				<td>&pound;".$row['price']."</td>
				<td><img src=\"../product_images/".$row['image']."\" height=\"50\" alt=\"".$row['name']."\"</td>
				<td>
					<a href=\"admin-area.php?page=productamend&id=".$row['id']."&table=product\">EDIT</a> |
					<a href=\"admin-area.php?page=delete&id=".$row['id']."&table=product\">DELETE</a>
				</td>
			</tr>";

	}
	echo "</table>";
?>
</div>
<div class="db-entry">
	<h2>Product entry</h2>
	<form action="admin-area.php" method="post">
		<table class="tab-form">
			<tr>
				<th>Name</th>
				<td><input type="text" name="name"/></td>
			</tr>
			<tr>
				<th>ABV</th>
				<td><input type="text" name="abv"/></td>
			</tr>
			<tr>
				<th>Volume (cl)</th>
				<td><input type="text" name="cl"/></td>
			</tr>

			<tr>
				<th>Drink</th>
				<td>
					<select name="drink">
						<option value="Whiskey">Whiskey</option>
						<option value="Gin">Gin</option>
						<option value="Beer">Beer</option>
						<option value="Vodka">Vodka</option>
						<option value="Tequila">Tequila</option>
						<option value="Cognac">Cognac</option>
						<option value="Rum">Rum</option>
					</select>
				</td>
			</tr>
			<tr>
				<th>Type</th>
				<td><input type="text" name="type"/></td>
			</tr>
			<tr>
				<th>Price</th>
				<td><input type="text" name="price"/></td>
			</tr>
			<tr>
				<th>Image</th>
				<td><input type="text" name="image"/></td>
			</tr>
			<tr>
				<th>Description</th>
				<td><textarea name="desc" maxlength="500"></textarea></td>
			</tr>
			<tr>
				<th colspan="2"><input class="dbutton" type="submit" name="productsubmit" value="Submit"></th>
			</tr>
		</table>
	</form>

</div>