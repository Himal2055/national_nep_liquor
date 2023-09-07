<?php 
	include "resources/initiate.php";
	$title = "national-nep-Liquor - Login";
	$style = "styles/register.css";
	include "components/header.php";
?>

<?php


if (empty($_POST) === false) {
	$useremail = sanitize_data_no_spaces($_POST['useremail']);
	$userpass = sanitize_data_no_spaces($_POST['userpass']);
	
	if(empty($useremail)||empty($userpass)) {
		$_SESSION['error'] = "You need to enter a username and password";
	} else if (user_check($useremail) === false) {
		$_SESSION['error'] = "No such user";
	} else {
		$login = login($useremail, $userpass);
		if ($login === false) {
			$_SESSION['error'] = "Incorrect password";
		} else {
			$_SESSION['id'] = $login;
			$_SESSION['error'] = null;
			header('Location: index.php');
			//IF LOGIN SUCCESSFUL, SETS SESSION ID VARIABLE AND SENDS USER TO HOMEPAGE
		}
	}
}
?>
<div class="banner">
	<img src="images/login.jpg" alt="Bar" class="banner-image">
	<div>
		<form method="post" action="login.php" class="reg-box">
			<h1>Sign in</h1>
			<table class="tab-form">
				<tr>
					<th>Email:</th>
					<td><input type="email" name="useremail" value="<?php if(isset($useremail)){echo htmlentities($useremail);} ?>"/></td>
				</tr>
				<tr>
					<th>Password:</th>
					<td><input type="password" name="userpass"/></td>
				</tr>
				<?php
				if (isset($_SESSION['error'])){
					echo "<tr><th colspan=\"2\" class=\"error\">".$_SESSION['error']."</th></tr>";
					$_SESSION['error'] = null;
				}?>

				<tr>
					<th colspan="2"><input type="submit" value="Sign in" name="submit"/></th>
				</tr>
			</table>
		</form>
	</div>
</div>	

<?php include "components/footer.php"; ?>