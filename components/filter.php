
<form>
	<table>
		<tr>
			<td class="heading"><h3>Drink</h3></td>
			<td>
				<select name="drink">
					<option value="all" <?php if(isset($_GET['drink'])&&$_GET['drink']=="all"){echo "selected";} ?> >All</option>
					<option value="whiskey" <?php if(isset($_GET['drink'])&&$_GET['drink']=="whiskey"){echo "selected";} ?> >Whiskey</option>
					<option value="gin"<?php if(isset($_GET['drink'])&&$_GET['drink']=="gin"){echo "selected";} ?> >Gin</option>
					<option value="cognac"<?php if(isset($_GET['drink'])&&$_GET['drink']=="cognac"){echo "selected";} ?> >Cognac</option>
					<option value="other"<?php if(isset($_GET['drink'])&&$_GET['drink']=="other"){echo "selected";} ?> >Other</option>
				</select>
			</td>
			
			<!-- SENDS VIEW TYPE (BAR/THUMB) TO NEXT PAGE -->
			<input type="hidden" name="view" value="<?php if(isset($_GET['view'])){echo $_GET['view'];} ?>">
			
			<td class="heading"><h3>Price</h3></td>
			<td id="pricelabels">
				Between<br>And
			</td>
			<td>
				<input class="price" type="text" name="minprice" <?php if(isset($_GET['minprice'])){echo "value=".(float) $_GET['minprice'];} ?> ><br>
				<input class="price" type="text" name="maxprice" <?php if(isset($_GET['maxprice'])){echo "value=".(float) $_GET['maxprice'];} ?> >
			</td>

			<td class="heading"><h3>Strength</h3></td>
			<td>
				<select name="strength">
					<option value=1 <?php if(isset($_GET['strength'])&&$_GET['strength']=="1"){echo "selected";} ?> >Any</option>
					<option value=2 <?php if(isset($_GET['strength'])&&$_GET['strength']=="2"){echo "selected";} ?> >Up to 41&#37;</option>
					<option value=3 <?php if(isset($_GET['strength'])&&$_GET['strength']=="3"){echo "selected";} ?> >41&#37; to 46&#37;</option>
					<option value=4 <?php if(isset($_GET['strength'])&&$_GET['strength']=="4"){echo "selected";} ?> >Over 46&#37;</option>
				</select>
			</td>
			<td class="heading"><h3>Order by</h3></td>
			<td>
				<select name="order">
					<option value="name-ASC"<?php if(isset($_GET['order'])&&$_GET['order']=="name-ASC"){echo "selected";} ?> >Name asc</option>
					<option value="name-DESC" <?php if(isset($_GET['order'])&&$_GET['order']=="name-DESC"){echo "selected";} ?> >Name desc</option>
					<option value="price-ASC" <?php if(isset($_GET['order'])&&$_GET['order']=="price-ASC"){echo "selected";} ?> >Price asc</option>
					<option value="price-DESC" <?php if(isset($_GET['order'])&&$_GET['order']=="price-DESC"){echo "selected";} ?> >Price desc</option>
				</select>
			</td>
			<td>
				<input type="submit" name="filter" value="Filter">
			</td>
		</tr>
	</table>
</form>