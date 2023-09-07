<?php
  // Assuming that the transaction was successful
  $transaction_status = "success";

  if ($transaction_status == "success") {
?>

<!DOCTYPE html>
<html>
<head>
  <title>Transaction Successful</title>
  <style>
    body {
      background-color: lightgreen;
      text-align: center;
      font-family: Arial, sans-serif;
    }
    h1 {
      color: darkgreen;
      font-size: 48px;
      margin: 20px 0;
    }
    p {
      font-size: 24px;
      margin: 20px 0;
    }
    button {
      background-color: green;
      border: none;
      color: white;
      padding: 15px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 20px 0;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <h1>Successful Transaction</h1>
  <p>Thank you for your business!</p>
  <button onclick="window.location='index.php'">Continue</button>
</body>
</html>

<?php
  }
  
?>
