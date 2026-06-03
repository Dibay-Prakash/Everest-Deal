<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
    // include('../EverestDeal/upload_image/upload.php');
    include('../EverestDeal/connection/connection.php');
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index.com</title>
    
    
</head>
<body>
    <div class="content">
        <p>This is where you can find amazing products at great prices.</p>
    </div>

    <div class="navbar">
        <a href="../views/index.php" class="left">Home</a>
        <div class="search">
            <input type="text" id="search" value="search" onmousedown="active();" placeholder="Search...">
            <button id="searchButton" type="submit" >Search</button>
        </div>
        <a href="../login/loginform.php">
            <div class="cart">
                <div id="quantity">My cart (0) </div>
            </div>
        </a>
        <div class="auth-buttons">
            <a href="../login/loginform.php" class="auth-button">Login</a>
            <a href="../signup/signupform.php" class="auth-button">Sign Up</a>
        </div>
    </div>

    <div id="display" class="display">
        <table>
            <?php
            $res = mysqli_query($conn, "SELECT * FROM project_images ORDER BY id DESC");
            if (!$res) {
                die("Error: " . mysqli_error($conn)); 
            }

            if (mysqli_num_rows($res) > 0) {
                while($row = mysqli_fetch_array($res)) {
                    echo '<tr>
                            <label></label>
                            <div><img src="../upload_image/uploads/'.$row['images'].'" width="400px" height="250px"></div>
                            <div><label>Name of Item: </label>'.$row['title'].'</div>
                            <div><label>Renting Price: </label>'.$row['rentingprice'].'</div>
                            <div><label>Selling Price: </label>'.$row['sellingprice'].'</div>
                            <div>'.$row['description'].'</div>
                            <a href="../login/loginform.php">
                                <button class="add_to_cart" name="add_to_cart" button type="submit">Add to Cart</button>
                            </a>
                        </tr>';
                }
            } else {
                echo '<tr>
                        <td colspan="5" class="no_info">No records found</td>
                      </tr>';
            }
            ?>
        </table>
    </div>

    <div id="shop" class="shop"></div>
    
    <button onclick="add_to_cart()">Add to Cart</button>

    <!-- <script src="data.js"></script> -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
    const searchButton = document.getElementById('searchButton');
    const searchInput = document.getElementById('search');

    if (searchButton && searchInput) {
        searchButton.addEventListener('click', function() {
            search(); // Call the search function when the button is clicked
        });

        searchInput.addEventListener('keypress', function(event) {
            if (event.key === 'Enter') {
                search(); // Call the search function when Enter is pressed
            }
        });
    } else {
        console.error('Search button or input element not found.');
    }

    // Define the search function
    function search() {
        // milyo hai console ma ayo yo click vayo bhanera
        console.log('Search button clicked or Enter key pressed');
    }
});
</script>
</body>
</html>
