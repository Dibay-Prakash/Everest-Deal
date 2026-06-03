<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>homepage</title>
    <link rel="stylesheet" href="../EverestDeal/newcss/forindex.css">
    
</head>
<body>
    <div class="content">
        <p>This is where you can find amazing products at great prices.</p>
    </div>

    <div class="navbar">
        <a href="index.php" class="left">Home</a>

        <div class="search">
            <input type="text" id="searchInput" placeholder="Search...">
            <button id="searchButton" type="submit">Search</button>
        </div>
        
        <!-- cart page ma ja ja ja  -->
        <a href="Cart.php" >
            <div class="cart">
                <div id="quantity">[0]</div>
            </div>
        </a>

        <!-- Login and Signup buttons -->
        <div class="logoutbutton"
             class="logoutbutton" name='logout'>Log Out</a>
        </div>
        <?php
            session_start();
            echo "Welcome " . $_SESSION['pu_registrationId'];
        ?>
    </div>

    <!-- Container for displaying cards -->
    <div id="cardContainer"></div>

    <!-- Include JavaScript code -->
    <script>
       document.addEventListener('DOMContentLoaded', function() {
    let data = [];
    let cardContainer = document.getElementById('cardContainer');

    function getData() {
        fetch("http://localhost/EverestDeal/data.php")
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(responseData => {
                data = responseData; // Update data with fetched response
                renderCards(data); // Call a function to render cards
                calculate(); // Update the cart icon
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });
    }

    function renderCards(data) {
        cardContainer.innerHTML = ''; // Clear previous content
        data.forEach(item => {
            let card = document.createElement('div');
            card.classList.add('card');
            // Create card elements...
            card.innerHTML = `
                <h5>${item.id}</h5>
                <img src='${item.images}' alt='${item.title}'>
                <h2>${item.title}</h2>
                <p>Selling Price: ${item.sellingprice}</p>
                <p>Renting Price: ${item.rentingprice}</p>
                <p>Description: ${item.description}</p>
                <button onclick="addToCart('${item.id}')">Add to Cart</button>
            `;
            cardContainer.appendChild(card);
        });
    }

    function search() {
        let searchValue = document.getElementById('searchInput').value.toLowerCase();

        let filteredData = data.filter(item => {
            return (
                item.title.toLowerCase().includes(searchValue) || 
                item.description.toLowerCase().includes(searchValue)
            );
        });
        
        renderCards(filteredData);
    }

    // Add event listener to search button
    document.getElementById('searchButton').addEventListener('click', search);

    // Add event listener to search input for 'Enter' key
    document.getElementById('searchInput').addEventListener('keypress', function(event) {
        if (event.key === 'Enter') {
            search();
        }
    });

    // Add event listener for logout button

    // This function updates the cart icon based on the length of data
    // function calculate() {
    //     let cartIcon = document.getElementById('quantity');
    //     cartIcon.innerHTML = data.length;
    // }

    // Fetch data when the DOM is loaded
    getData();
});


    </script>
    
</body>
</html>
