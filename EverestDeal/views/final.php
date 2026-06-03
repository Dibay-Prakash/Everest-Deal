<?php
session_start();
// No need to include connection.php if you're not interacting with the database here
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Final Page</title>
</head>
<body>
    <?php
    if(isset($_SESSION['pu_registrationId'])) {
        echo "<p>You are still with us, " . $_SESSION['pu_registrationId'] . "!</p>";
    } else {
        echo "<p>Welcome, Guest!</p>";
    }
    ?>

    <div id="itemDetails">
        <h2>Item Details</h2>
        <p><strong>Name:</strong> <span id="itemName"></span></p>
        <p><strong>Renting Price:</strong> <span id="itemRentingPrice"></span></p>
        <p><strong>Selling Price:</strong> <span id="itemSellingPrice"></span></p>
    </div>

    <!-- JavaScript to retrieve data from local storage and populate the item details -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Retrieve item details from local storage
            let itemName = localStorage.getItem('itemName');
            let itemRentingPrice = localStorage.getItem('itemRentingPrice');
            let itemSellingPrice = localStorage.getItem('itemSellingPrice');

            // Populate the item details in the HTML
            document.getElementById('itemName').textContent = itemName;
            document.getElementById('itemRentingPrice').textContent = itemRentingPrice;
            document.getElementById('itemSellingPrice').textContent = itemSellingPrice;
        });
    </script>
</body>
</html>
