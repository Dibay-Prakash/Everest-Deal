<?php
session_start();
include("../connection/connection.php");

if (isset($_POST['login'])) {
    $puregistrationId = $_POST['registrationId'];
    $password = $_POST['password'];

    $query = "SELECT * FROM user_info WHERE puregistrationId='$puregistrationId'";
    $data = mysqli_query($conn, $query);

    if (!$data) {
        // Display MySQL error if query fails
        echo "Query Error: " . mysqli_error($conn);
    } else {
        $total = mysqli_num_rows($data);

        if ($total == 1) {
            $row = mysqli_fetch_assoc($data);
            // Check if the password matches
            if ($password == $row['password']) {
                echo "Login successful";
                $_SESSION['pu_registrationId'] = $puregistrationId;
                header('Location: http://localhost/EverestDeal/indexpage.php');
                exit();
            } else {
                echo "Invalid credentials";
            }
        } else {
            echo "Invalid credentials";
        }
    }
}
?>
