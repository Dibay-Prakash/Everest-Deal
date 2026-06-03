<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

try {
    // Creating connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error)
    {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }

    

} 
catch (Exception $e)
{
    
    echo "Connection failed: " . $e->getMessage();
}
?>
