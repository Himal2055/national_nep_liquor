<?php
namespace Phppot;

require_once __DIR__ . '/config.php';
$currencies = Config::getCurrency();
$country = Config::getAllCountry();

?>
<h1>Stripe payment integration via custom form</h1>
<div class="phppot-container">
    <div id="payment-box"
        data-consumer-key="<?php echo Config::STRIPE_PUBLISHIABLE_KEY; ?>"
        data-create-order-url="<?php echo Config::CREATE_STRIPE_ORDER;?>"
        data-return-url="<?php echo Config::THANKYOU_URL;?>">
        <div class="row">
            <div class="label">
                Name <span class="error-msg" id="name-error"></span>
            </div>
            <input type="text" name="customer_name" class="input-box"
                id="customer_name">
        </div>
        <div class="row">
            <div class="label">
                Email <span class="error-msg" id="email-error"></span>
            </div>
            <input type="text" name="email" class="input-box" id="email">
        </div>
        <div class="row">
            <div class="label">
                Address <span class="error-msg" id="address-error"></span>
            </div>
            <input type="text" name="address" class="input-box"
                id="address">
        </div>
        <div class="row">
            <div class="label">
                Country <span class="error-msg" id="country-error"></span>
            </div>
            <input list="country-list" name="country" class="input-box"
                id="country">
            <datalist id="country-list">
                <?php foreach ($country as $key => $val) { ?>
             <option value="<?php echo $key;?>"><?php echo $val;?></option>
                <?php }?>
                    </datalist>
        </div>
        <div class="row">
            <div class="label">
                Postal code <span class="error-msg" id="postal-error"></span>
            </div>
            <input type="text" name="postal_code" class="input-box"
                id="postal_code">
        </div>
        <div class="row">
            <div class="label">
                Description <span class="error-msg" id="notes-error"></span>
            </div>
            <input type="text" name="notes" class="input-box" id="notes">
        </div>
        <div class="row">
            <div class="label">
                Amount <span class="error-msg" id="price-error"></span>
            </div>
            <input type="text" name="price" class="input-box" id="price">
        </div>
        <div class="row">
            <div class="label">
                Currency <span class="error-msg" id="currency-error"></span>
            </div>
            <input list="currency-list" name="currency"
                class="input-box" id="currency">
            <datalist id="currency-list">
            <?php foreach ($currencies as $key => $val) { ?>
             <option value="<?php echo $key;?>"><?php echo $val;?></option>
                <?php }?>
                    </datalist>

        </div>
        <div class="row">
            <div id="card-element">
                <!--Stripe.js injects the Card Element-->
            </div>
        </div>
        <div class="row">
            <button class="btnAction" id="btn-payment"
                onclick="confirmOrder(event);">
                <div class="spinner hidden" id="spinner"></div>
                <span id="button-text">Send Payment</span>
            </button>
            <p id="card-error" role="alert"></p>
        </div>

    </div>
        <?php
        if (! empty($_GET["action"]) && $_GET["action"] == "success") {
            ?><div class="success">Thank you for the payment.</div>
    <?php
        }
        ?>

<script src="https://js.stripe.com/v3/"></script>
    <script src="./assets/js/card.js"></script>
	<script>
    var stripeKey = document.querySelector('#payment-box').dataset.consumerKey;
var createOrderUrl = document.querySelector('#payment-box').dataset.createOrderUrl;
var returnUrl = document.querySelector('#payment-box').dataset.returnUrl;
var stripe = Stripe(stripeKey);
var elements = stripe.elements();
var style = {
	base: {
		color: "#32325d",
		fontFamily: 'Arial, sans-serif',
		fontSmoothing: "antialiased",
		fontSize: "16px",
		"::placeholder": {
			color: "#32325d"
		}
	},
	invalid: {
		fontFamily: 'Arial, sans-serif',
		color: "#fa755a",
		iconColor: "#fa755a"
	}
};
var card = elements.create("card", {
	hidePostalCode: true,
	style: style
});
// Stripe injects an iframe into the DOM
card.mount("#card-element");
card
	.on(
		"change",
		function(event) {
			// Disable the Pay button if there are no card details in
			// the Element
			document.querySelector("button").disabled = event.empty;
			document.querySelector("#card-error").textContent = event.error ? event.error.message
				: "";
		});

function confirmOrder(event) {
	var valid = formValidate();
	if (valid) {
		var purchase = {
			email: document.getElementById("email").value,
			notes: document.getElementById("notes").value,
			unitPrice: document.getElementById("price").value,
			currency: document.getElementById("currency").value,
			name: document.getElementById("customer_name").value,
			address: document.getElementById("address").value,
			country: document.getElementById("country").value,
			postalCode: document.getElementById("postal_code").value
		};

		// Disable the button until we have Stripe set up on the page
		// document.querySelector("btnSubmit").disabled = true;
		fetch(createOrderUrl, {
			method: "POST",
			headers: {
				"Content-Type": "application/json",

			},
			body: JSON.stringify(purchase)
		}).then(function(result) {
			return result.json();
		}).then(function(data) {
			// Complete payment when the submit button is clicked
			payWithCard(stripe, card, data.clientSecret, data.orderHash);
		});
		// Calls stripe.confirmCardPayment
		// If the card requires authentication Stripe shows a pop-up modal
		// to
		// prompt the user to enter authentication details without leaving
		// your
		// page.
		var payWithCard = function(stripe, card, clientSecret, orderHash) {
			loading(true);
			stripe.confirmCardPayment(clientSecret, {
				payment_method: {
					card: card
				}
			}).then(function(result) {
				if (result.error) {
					// Show error to your customer
					showError(result.error.message);
				} else {
					// The payment succeeded!
					orderComplete(result.paymentIntent.id, orderHash);
				}
			});
		};
		/* ------- UI helpers ------- */
		// Shows a success message when the payment is complete
		var orderComplete = function(paymentIntentId, orderHash) {
			loading(false);
			window.location.href = returnUrl + "?orderId=" + orderHash;
		};
		// Show the customer the error from Stripe if their card fails to
		// charge
		var showError = function(errorMsgText) {
			loading(false);
			var errorMsg = document.querySelector("#card-error");
			errorMsg.textContent = errorMsgText;
			setTimeout(function() {
				errorMsg.textContent = "";
			}, 10000);
		};
		// Show a spinner on payment submission
		var loading = function(isLoading) {
			if (isLoading) {
				// Disable the button and show a spinner
				document.querySelector("button").disabled = true;
				document.querySelector("#spinner").classList.remove("hidden");
				document.querySelector("#button-text").classList.add("hidden");
			} else {
				document.querySelector("button").disabled = false;
				document.querySelector("#spinner").classList.add("hidden");
				document.querySelector("#button-text").classList
					.remove("hidden");
			}

		};
	}
}
</script>