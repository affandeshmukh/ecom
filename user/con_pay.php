<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment Page</title>
  <style>
  body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

.payment-container {
  background-color: #f4f4f4;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
  text-align: center;
}

.payment-options {
  display: flex;
  flex-direction: column;
  align-items: center;
  margin-bottom: 20px;
}

.payment-options label {
  margin: 5px;
}

.pay-button {
  background-color: #4CAF50;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-size: 16px;
}

.pay-button:hover {
  background-color: #45a049;
}

  </style>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="payment-container">
    <h2>Select Payment Method</h2>
    <div class="payment-options">
      <label for="upi">UPI</label>
      <input type="radio" id="upi" name="payment-method">
      <label for="net-banking">Net Banking</label>
      <input type="radio" id="net-banking" name="payment-method">
      <label for="debit-card">Debit Card</label>
      <input type="radio" id="debit-card" name="payment-method">
      <label for="credit-card">Credit Card</label>
      <input type="radio" id="credit-card" name="payment-method">
    </div>
    <button class="pay-button">Pay Now</button>
  </div>
</body>
</html>
