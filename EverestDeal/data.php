<?php 
    include('../EverestDeal/connection/connection.php');
    
    $sql = "SELECT * FROM project_images";
    $results = mysqli_query($conn, $sql);
    $json_array = array();

    while ($data = mysqli_fetch_assoc($results))
     {
        $json_array[] = $data;
    }

    // Encode the array as JSON
    $encoded_data = json_encode($json_array);

    echo"$encoded_data";

    
?>
