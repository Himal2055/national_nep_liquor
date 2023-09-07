<?php $user = user_details($_GET['id']); ?>
<h1>User details</h1>

<form action="amend-user.php?id=<?php echo $_GET['id']; ?>" method="post" class="amend-table">
	<table class="tab-form">
		<tr>
			<th>First name</th>
			<td><input type="text" name="fname" value="<?php echo $user['fname']; ?>"/></td>
		</tr>
		<tr>
			<th>Last name</th>
			<td><input type="text" name="lname" value="<?php echo $user['lname']; ?>"/></td>
		</tr>
		<tr>
			<th>Gender</th>
			<td>
				<select name="gender">
					<option value="Male" <?php if ($user['gender']=="Male"){echo "selected";} ?>>Male</option>
					<option value="Female" <?php if ($user['gender']=="Female"){echo "selected";} ?>>Female</option>
				</select>
			</td>
		</tr>
		<tr>
			<th>Email</th>
			<td><input type="email" name="email" value="<?php echo $user['email']; ?>"/></td>
		</tr>
		<tr>
			<th colspan="2"><input type="submit" name="usersubmit" value="Submit"></th>
		</tr>
	</table>
</form>

