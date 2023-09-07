<?php
	require_once "stripe-php-master/init.php";
	// require_once "products.php";

	$stripeDetails = array(
		"secretKey" => "sk_test_51MLRfXSElQU0nvNdT1zFFLYkf88AAEta8Q3G9Za9SCwxrk4GDLw9ynVKJIroz7VQIcs5iGzhQuJyvT1tIvOESyrO00Dr3QeQWK",
		"publishableKey" => "pk_test_51MLRfXSElQU0nvNdKp8B1nsSZY5jswlZCuaIZSSX15xJVDBsXBDXs3UmaJAmU1OVfDUo2rg10SqPcVmmJxZm3u2U00YEcZ6JN3"
	);

	// Set your secret key: remember to change this to your live secret key in production
	// See your keys here: https://dashboard.stripe.com/account/apikeys
	\Stripe\Stripe::setApiKey($stripeDetails['secretKey']);
?>
