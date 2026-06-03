<?php
include("../connection/connection.php");

if (isset($_POST['submit'])) {
    $fullname = $_POST['fullname'];
    $puregistrationId = $_POST['registrationId'];
    $gender = $_POST['gender'];
    $password = $_POST['passkey'];
    $confirmpassword = $_POST['confirmpassword'];

    if ($password != $confirmpassword) 
    {
        echo "Passwords do not match!";
    } 
    else
     {
        // I have removed hashing of password.kinaki login vayena plain text bata hashing nai hanna paryo.
        // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO user_info (fullname, puregistrationId, gender, password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $fullname, $puregistrationId, $gender, $password);
        
        if ($stmt->execute()) 
        {
            header("Location: ../login/loginform.php");
            exit(); 
        } else
        {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }
}
?>
