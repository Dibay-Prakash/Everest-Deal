<?php
include("../connection/connection.php");

if (isset($_POST['submit'])) {
    $fullname = $_POST['fullname'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $college = $_POST['college'];
    $contact = $_POST['contact'];
    $puregistrationId = $_POST['registrationId'];

    $stmt = $conn->prepare("INSERT INTO seller_info (name, address, contact, gender, college,registrationId) VALUES (?, ?, ?, ?, ?,?)");
    $stmt->bind_param("ssssss", $fullname, $address, $contact, $gender, $college,$puregistrationId);
    
    if ($stmt->execute()) {
        
       echo"hello";
        // header("Location:sellerplace.php ");

        exit(); 
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>