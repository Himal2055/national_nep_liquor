<?php 
	include "resources/initiate.php";
	$title = "national-nepLiquor - Whiskey";
	$style = "styles/account.css";
	include "components/header.php";
	
	$loggedin = logged_in();
	if (!$loggedin){
		header('index.php');
	} else {
		$details = user_details($_SESSION['id']);
	}
	
	global $db;
	if(isset($_POST['detailssubmit'])){
		try {
			$fname = sanitize_data_trim_spaces($_POST['fname']);
			$lname = sanitize_data_trim_spaces($_POST['lname']);
			$gender = sanitize_data_trim_spaces($_POST['gender']);
			$sql = "UPDATE user
					SET fname = ?,
						lname = ?,
						gender = ?
					WHERE id = ?";
			$stmt = $db->prepare($sql);	
			$stmt->bind_param('ssss',$fname,$lname,$gender,$_SESSION['id']);
			$stmt->execute();
			$_SESSION['report'] = "<tr><td class=\"success\"colspan=2>Update successful</td></tr>";
		} catch (exception $e) {
			$_SESSION['report'] = "<tr><td class=\"error\"colspan=2>Update failed</td></tr>";
		}
	} elseif (isset($_POST['passwordsubmit'])){
		try {
			$password = sanitize_data_trim_spaces($_POST['password']);
			$npassword = sanitize_data_trim_spaces($_POST['npassword']);
			$cpassword = sanitize_data_trim_spaces($_POST['cpassword']);
			
			$password = md5($password);
			$npassword = md5($npassword);
			$cpassword = md5($cpassword);
			
			if($password != $details['password']){
				$_SESSION['report'] = "<tr><td class=\"error\"colspan=2>Wrong password</td></tr>";
			} elseif ($npassword != $cpassword){
				$_SESSION['report'] = "<tr><td class=\"error\"colspan=2>Passwords do not match</td></tr>";
			} else {
				$sql = "UPDATE user
						SET password = ?
						WHERE id = ?";
				$stmt = $db->prepare($sql);	
				$stmt->bind_param('si',$npassword,$details['id']);
				$stmt->execute();
				$_SESSION['report'] = "<tr><td class=\"success\"colspan=2>Update successful</td></tr>";
			}
		} catch (exception $e) {
			$_SESSION['report'] = "<tr><td class=\"error\"colspan=2>Update failed</td></tr>";
		}
	}
	
	
	
	$loggedin = logged_in();
	if (!$loggedin){
		header('index.php');
	} else {
		$details = user_details($_SESSION['id']);
	}
?>

<div class="banner">
	<h1>My Account</h1>
	<div class="reg-box">
	<!-- <img src="images/logo.png" alt="Jonny's Liquor" id="gateway-logo"> -->
		<div class="form">
			<form method="post" action="account.php" class="reg-box">
				<table class="tab-form">
					<tr>
						<th>First name:</th>
						<td><input type="text" name="fname" value="<?php echo htmlentities($details['fname']); ?>"/></td>
					</tr>
					<tr>
						<th>Last name:</th>
						<td><input type="text" name="lname" value="<?php echo htmlentities($details['lname']); ?>"/></td>
					</tr>
					<tr>
						<th>Gender:</th>
						<td>Male<input type="radio" name="gender" value="Male" <?php if($details['gender']=="Male"){echo "checked";} ?>/>
							Female<input type="radio" name="gender" value="Female"<?php if($details['gender']=="Female"){echo "checked";} ?>/></td>
					</tr>
					<tr>
						<th colspan="2"><input type="submit" value="Update details" name="detailssubmit"/></th>
					</tr>
				</table>
			</form>
			<hr />
			<form method="post" action="account.php" class="reg-box">
				<table class="tab-form">
					<tr>
						<th>Email:</th>
						<td><?php echo $details['email']; ?></td>
					</tr>
					<tr>
						<th>Old password:</th>
						<td><input type="password" name="password" /></td>
					</tr>
					<tr>
						<th>New Password:</th>
						<td><input type="password" name="npassword" /></td>
					</tr>
					<tr>
						<th>Confirm password:</th>
						<td><input type="password" name="cpassword" /></td>
					</tr>
					<?php
					if (isset($_SESSION['report'])){
						echo $_SESSION['report'];
						$_SESSION['error'] = null;
					}?>
					<tr>
						<th colspan="2"><input type="submit" value="Change password" name="passwordsubmit"/></th>
					</tr>
				</table>
			</form>
		</div>
	</div>
</div>

<?php include "components/footer.php"; ?>