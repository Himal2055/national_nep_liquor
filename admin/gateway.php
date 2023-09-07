<?php 
include "../resources/initiate.php"; 

if (empty($_POST) === false) {

	$adminuser = sanitize_data_no_spaces($_POST['adminuser']);
	$adminpass = sanitize_data_no_spaces($_POST['adminpass']);
	
	if(empty($adminuser)||empty($adminpass)) {
		$_SESSION['error'] = "You need to enter a username and password";
	} else {
		if(admin_login($adminuser, $adminpass)){
			$_SESSION['error'] = null;
			header('Location: admin-area.php');
			exit();
		}else{
			$_SESSION['error'] = "Incorrect password";
		}
	}
}

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Johnny's Liquor - Admin</title>
		<meta name="description" content="Jonny's Liquor admin page">
		<link type="text/css" rel="stylesheet" href="../styles/main.css">
		
		<!-- PAGE SPECIFIC STYLES -->
		<link type="text/css" rel="stylesheet" href="../styles/admin.css">

		<!-- FONTS -->
		<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
	</head>
	<body>
		<div id="admin-gate">
			<!-- <img src="../images/logo.png" alt="Jonny's Liquor" id="gateway-logo"> -->
				<form method="post" action="gateway.php">
					<table class="tab-form">
						<tr>
							<th colspan="2"><h2>Administration</h2></th>
						</tr>
						<tr>
							<th>Username:</th>
							<td><input type="text" name="adminuser" value="<?php if(isset($adminuser)){echo htmlentities($adminuser);} ?>"/></td>
						</tr>
						<tr>
							<th>Password:</th>
							<td><input type="password" name="adminpass"/></td>
						</tr>
						<?php
						if (isset($_SESSION['error'])){
							echo "<tr><th colspan=\"2\" class=\"error\">".$_SESSION['error']."</th></tr>";	
						}?>

						<tr>
							<th colspan="2"><input type="submit" value="Log in" name="submit"/></th>
						</tr>
					</table>
				</form>
		</div>
	</body>
</html>