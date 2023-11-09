<!DOCTYPE html>
<html>
<head>
    <title>Payment Form</title>
</head>
<body>
    <h1>Payment Form</h1>
    
    <!-- Your payment form fields go here -->
    <form action="{{ url('/initiate-payment') }}" method="post">
        @csrf

        <label for="card_number">Card Number:</label>
        <input type="text" name="card_number" id="card_number" required>

        <label for="expiry_date">Expiry Date:</label>
        <input type="text" name="expiry_date" id="expiry_date" placeholder="MM/YY" required>

        <label for="cvv">CVV:</label>
        <input type="text" name="cvv" id="cvv" required>

        <label for="amount">Amount:</label>
        <input type="text" name="amount" id="amount" required>

        <!-- Add other necessary payment fields -->

        <input type="submit" value="Submit Payment">
    </form>
</body>
</html>
