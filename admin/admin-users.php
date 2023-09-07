<?php
	if(isset($_POST['usersubmit'])){
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$gender = $_POST['gender'];
		$email = $_POST['email'];
		$password = md5("password");
		$query = "INSERT INTO user
                    (fname, lname, gender, email, password)
                  VALUES
                    ('$fname','$lname','$gender','$email','$password')";
		$_SESSION['report'] = insert_db($query);
	}
?>

<div class="db-table">
	<h2>Users</h2>
<?php
	if(isset($_SESSION['report'])){
		echo $_SESSION['report'];
		$_SESSION['report'] = null;
	}
	global $db;
	$query="SELECT * FROM user";
	$fetch=mysqli_query($db, $query);


	echo "<table><tr>
					<th>ID</th>
					<th>FIRST NAME</th>
					<th>LAST NAME</th>
					<th>GENDER</th>
					<th>EMAIL</th>
					<th>ACTIONS</th>
				</tr>";
	while ($row=mysqli_fetch_assoc($fetch)){

		echo "<tr>
				<td>".$row['id']."</td>
				<td>".$row['fname']."</td>
				<td>".$row['lname']."</td>
				<td>".$row['gender']."</td>
				<td>".$row['email']."</td>
				<td>
					<a href=\"admin-area.php?page=useramend&id=".$row['id']."&table=user\">AMEND</a> |
					<a href=\"admin-area.php?page=delete&id=".$row['id']."&table=user\">DELETE</a></td>
				</td>
			</tr>";

	}
	echo "</table>";
?>
</div>


<div class="db-entry">
	<h2>User entry</h2>
	<form action="admin-area.php?page=user" method="post">
		<table class="tab-form">
			<tr>
				<th>First name</th>
				<td><input type="text" name="fname"/></td>
			</tr>
			<tr>
				<th>Last name</th>
				<td><input type="text" name="lname"/></td>
			</tr>
			<tr>
				<th>Gender</th>
				<td>
					<select name="gender">
						<option value="Male">Male</option>
						<option value="Female">Female</option>
					</select>
				</td>
			</tr>
			<tr>
				<th>Email</th>
				<td><input type="email" name="email"/></td>
			</tr>
			<tr>
				<th colspan="2"><input type="submit" name="usersubmit" value="Submit"></th>
			</tr>
		</table>
	</form>

</div>