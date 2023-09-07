<?php 
	include "resources/initiate.php";
	$title = "national-nep Liquor - Registration";
	$style = "styles/register.css";
	
	if (empty($_POST) === false) {

		$fname = sanitize_data_trim_spaces($_POST['fname']);
		$lname = sanitize_data_trim_spaces($_POST['lname']);
		$gender = sanitize_data_trim_spaces($_POST['gender']);
		$email = sanitize_data_trim_spaces($_POST['email']);
		$password = sanitize_data_trim_spaces($_POST['password']);
		$cpassword = sanitize_data_trim_spaces($_POST['cpassword']);
		
		if(empty($fname)||empty($lname)||empty($gender)||empty($email)||empty($password)||empty($cpassword)) {
			$_SESSION['error'] = "Please complete all fields";
		} else if (user_check($email) == true) {
			$_SESSION['error'] = "That email address is already registered";
		} else if ($password != $cpassword){
			$_SESSION['error'] = "Passwords do not match";
		} else {
		
			// ATTEMPT REGISTRATION
			$password = md5($password);
			try {
				global $db;
				
				$sql = "INSERT INTO user (fname, lname, gender, email, password)
						VALUES (?, ?, ?, ?, ?)";
				$stmt = $db->prepare($sql);	
				$stmt->bind_param('sssss',$fname,$lname,$gender,$email,$password);	
				$stmt->execute();
				$_SESSION['id'] = login($email, $password);
				header('Location: welcome.php');
				//ATTEMPTS LOGIN WITH NEW DETAILS, SETS SESSION ID AND REDIRECTS TO WELCOME PAGE
			
			} catch (exception $e) {
				$_SESSION['error'] = "Problem connecting to database";
				header('Location: register.php');
			}
		}

	}
	
	include "components/header.php";
?>

<div class="banner">
	<img src="images/register.jpg" alt="Bar" class="banner-image">
	<div class="reg-box">
		<form method="post" action="register.php" class="reg-box">
			<h1>Register</h1>
			<table class="tab-form">
				<tr>
					<th>First name:</th>
					<td><input type="text" name="fname" value="<?php if(isset($fname)){echo htmlentities($fname);} ?>"/></td>
				</tr>
				<tr>
					<th>Last name:</th>
					<td><input type="text" name="lname" value="<?php if(isset($lname)){echo htmlentities($lname);} ?>"/></td>
				</tr>
				<tr>
					<th>Gender:</th>
					<td>Male<input type="radio" name="gender" value="Male" checked/>
						Female<input type="radio" name="gender" value="Female"/></td>
				</tr>
				<tr>
					<th>Email:</th>
					<td><input type="email" name="email" value="<?php if(isset($email)){echo htmlentities($email);} ?>"/></td>
				</tr>
				<tr>
					<th>Password:</th>
					<td><input type="password" name="password" /></td>
				</tr>
				<tr>
					<th>Confirm password:</th>
					<td><input type="password" name="cpassword" /></td>
				</tr>
				<?php
				if (isset($_SESSION['error'])){
					echo "<tr><th colspan=\"2\" class=\"error\">".$_SESSION['error']."</th></tr>";
					$_SESSION['error'] = null;
				}?>
				<tr>
					<th colspan="2"><input type="submit" value="Register" name="submit"/></th>
				</tr>
			</table>
		</form>
	</div>
</div>


<?php include "components/footer.php"; ?>