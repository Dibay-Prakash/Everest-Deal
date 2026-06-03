<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Page</title>
</head>
<body>
    <h2>Checkout Page</h2>
    <form action="process_payment.php" method="post">
        <h3>Delivery Options</h3>
        <input type="radio" name="delivery_option" value="delivery_on_college" checked> Delivery on College<br>
        
        <h3>Payment Options</h3>
        <input type="radio" name="payment_option" value="cash_on_delivery" checked> Cash on Delivery<br>
        <input type="radio" name="payment_option" value="online_payment"> Online Payment<br>

        <input type="submit" value="Pay Now">
    </form>
</body>
</html>
