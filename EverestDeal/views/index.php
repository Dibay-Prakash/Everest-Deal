<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
    include('../upload_image/upload.php');
    include('../connection/connection.php');
    ?>
    <meta charset="UTF-8">
    
   <!-- <link rel="stylesheet" href="../newcss/forindex.css"> -->

   <style>
    
/* Reset CSS */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    text-decoration: none;
    list-style: none;
    border: none;
    outline: 0;
}

/* Body Styles */
body {
    font-family: Georgia, 'Times New Roman', Times, serif;
}

/* Content Styles */
.content {
    padding: 20px;
    text-align: center;
    background-color: grey;
    color: white; /* Text color */
    font-size: 1.2rem; /* Adjust font size as needed */
    font-weight: bold; /* Font weight */
    border-bottom: 2px solid black; /* Bottom border */
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2); /* Shadow */
    z-index: 999;
    position: fixed;
    width: 100%;
    top: 0;
    height: 85px; /* Adjust the height as needed */
}


/* Navbar Styles */
.navbar {
    background: whitesmoke;
    display: flex;
    justify-content: space-around;
    padding: 20px;
    font-size: 20px;
    font-weight: bold;
    margin-bottom: 0;
    margin-top: 70px;
    position: sticky;
    z-index: 999;
    width: 100%;
    top: 0;
}

.navbar a {
    color: black;
    padding: 10px;
}

/* Search Styles */
.search {
    display: flex;
    align-items: center;
}

.search input[type="text"] {
    padding: 5px;
    margin-right: 10px;
}

.search button {
    padding: 5px 10px;
    background-color: #333;
    color: white;
    border: none;
    cursor: pointer;
}

/* Display Styles */
.display table tr {
    border-bottom: 1px solid #ccc; /* Add bottom border to each row */
    margin-bottom: 10px; /* Add margin bottom to create space after each row */
}

.display table tr:last-child {
    border-bottom: none; /* Remove bottom border from the last row */
}

.display table tr div {
    margin-bottom: 10px; /* Add margin bottom to create space after each div */
    padding: 10px; /* Add padding for spacing within each div */
    border: 1px solid #ccc; /* Add border around each div */
}

.display table tr img {
    width: 100%;
    height: auto;
}



/* Add to Cart Button Styles */
.add_to_cart {
    padding: 5px 10px;
    background-color: #333;
    color: white;
    border: none;
    cursor: pointer;
}

.add_to_cart:hover {
    background-color: #555;
}


    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index.com</title>
    <script src="../homepage/passwordvisibility.js"></script>
</head>
<body>
    <div class="content">
        <p>This is where you can find amazing products at great prices.</p>

        <p>Sell my Item.
    <a href="../views/sellerreg.php">
        <button id="seller" class="seller" name="seller">Seller</button>
    </a>
</p>

    </div>

    <div class="navbar">
        <a href="../views/index.php" class="left">Home</a>

        <div class="search">
            <form method="GET" action="">
                <input type="text" id="search" name="query" placeholder="Search...">
                <button id="searchButton" type="submit">Search</button>
            </form>
        </div>

        <a href="../login/loginform.php">
            <div class="cart">
                <div id="quantity">My cart[0]</div>
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
                                <div><a href="../login/loginform.php"><button class="add_to_cart" name="add_to_cart" button type="submit">Add to Cart</button></a></td>
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
                                <div><a href="../login/loginform.php"><button class="add_to_cart" name="add_to_cart" button type="submit">Add to Cart</button></a></div>
                              </tr>';
                    }
                } else {
                    echo '<tr><td colspan="5">No records found</td></tr>';
                }
            }
            ?>
        </table>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchButton = document.getElementById('searchButton');
            const searchInput = document.getElementById('searchInput');
            
            searchButton.addEventListener('click', function() {
                search(); // Call the search function when the button is clicked
            });

            searchInput.addEventListener('keypress', function(event) {
                if (event.key === 'Enter') {
                    search(); // Call the search function when Enter is pressed
                }
            });

            // Define the search function
            function search() {
                let searchValue = searchInput.value.trim();

                // Redirect to the same page with the search query as a parameter
                window.location.href = 'index.php?query=' + searchValue;
            }
        });
    </script>
</body>
</html>
