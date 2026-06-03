<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
     session_start();
    include('../connection/connection.php');
    
   
    
    
    ?>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/index.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>afterloginpage</title>
</head>
<body>
    <div class="content">
        <p>This is where you can find amazing products at great prices.</p>
    </div>

    <div class="navbar">
        <a href="../views/afterloginpage.php" class="left">Home</a>
        <div class="search">
            <input type="text" id="searchInput" placeholder="Search...">
            <button id="searchButton" type="button">Search</button>
        </div>
        
        <!-- cart page ma ja ja ja  -->
        <a href="../views/Cart.php" >
            <div class="cart">
                <div id="quantity">My cart [0]</div>
            </div>
        </a>

        <!-- Login and Signup buttons -->
        <div class="logoutbutton">
    <form action="../login/logout_process.php" method="post">
        <button type="submit" class="logoutbutton" name="logout">Log Out</button>
    </form>

    
</div>

        <?php
            
            if(isset($_SESSION['pu_registrationId'])) {
                echo "<p>Welcome, " . $_SESSION['pu_registrationId'] . "!</p>";
            } else {
                echo "<p>Welcome, Guest!</p>";
            }
            ?>
        
    </div>

    <div id="display" class="display">
        <table>
            <?php
            if(isset($_GET['query'])) {
                $search_query = $_GET['query'];
                $sql = "SELECT * FROM project_images WHERE title LIKE '%$search_query%'";
                $result = mysqli_query($conn, $sql);

                if(mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        echo '
                                <div><img src="../upload_image/uploads/'.$row['images'].'" width="400px" height="250px"></div>
                                <div>Name of Item: '.$row['title'].'</div>
                                <div>Renting Price: '.$row['rentingprice'].'</div>
                                <div>Selling Price: '.$row['sellingprice'].'</div>
                                <div>'.$row['description'].'</div>
                                <div>


                                    <a href="/">
                                        <button class="add_to_cart"

                             
                                        data-title="'.$row['title'].'" data-rentingprice="'.$row['rentingprice'].'" data-sellingprice="'.$row['sellingprice'].'" data-description="'.$row['description'].'">Add to Cart</button>
                                    </a>
                                </div>
                                <input type="hidden" name="image" value="'.$row['title'].'">
                        ';
                    }
                } else {
                    echo '<tr><td colspan="5">No records found</td></tr>';
                }
            } else {
                // If no search query is provided, display all products
                $res = mysqli_query($conn, "SELECT * FROM project_images ORDER BY id DESC");
                if (!$res) {
                    die("Error: " . mysqli_error($conn)); 
                }

                if (mysqli_num_rows($res) > 0) {
                    while($row = mysqli_fetch_array($res)) {
                        echo '<tr>
                                <div><img src="../upload_image/uploads/'.$row['images'].'" width="400px" height="250px"></div>
                                <div>Name of Item: '.$row['title'].'</div>
                                <div>Renting Price: '.$row['rentingprice'].'</div>
                                <div>Selling Price: '.$row['sellingprice'].'</div>
                                <div>'.$row['description'].'</div>
                                <div>
                                    
                                        <button class="add_to_cart" data-title="'.$row['title'].'" data-rentingprice="'.$row['rentingprice'].'" data-sellingprice="'.$row['sellingprice'].'" data-description="'.$row['description'].'">Add to Cart</button>
                                    
                                </div>
                              </tr>';
                    }
                } else {
                    echo '<tr><td info="5">No records found</td></tr>';
                }
            }
            ?>
        </table>
    </div>

    <script src="script.js"></script>
    

</body>
</html>
