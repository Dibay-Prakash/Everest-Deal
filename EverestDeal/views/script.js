document.addEventListener('DOMContentLoaded', function() {
    const searchButton = document.getElementById('searchButton');
    const searchInput = document.getElementById('searchInput');
    const cartQuantity = document.getElementById('quantity');
    
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
        window.location.href = 'afterloginpage.php?query=' + searchValue;

    }

    // Add event listener to "Add to Cart" buttons
    const addToCartButtons = document.querySelectorAll('.add_to_cart');
    addToCartButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Get data from the button's attributes
           
            const title = button.getAttribute('data-title');
            const rentingprice = button.getAttribute('data-rentingprice');
            const sellingprice = button.getAttribute('data-sellingprice');
            const description = button.getAttribute('data-description');

            // Create an object to store in local storage
            const item = {
              
                title: title,
                rentingprice: rentingprice,
                sellingprice: sellingprice,
                description: description
            };

            // Check if localStorage is supported by the browser
            if (typeof(Storage) !== "undefined") {
                // Retrieve the existing cart items from localStorage
                let cartItems = JSON.parse(localStorage.getItem('cart')) || [];

                // Add the new item to the cart
                cartItems.push(item);

                // Save the updated cart items back to localStorage
                localStorage.setItem('cart', JSON.stringify(cartItems));

                // Update cart quantity and display
                cartQuantity.textContent = 'My cart [' + cartItems.length + ']';

                // Display a confirmation message
                alert("Item added to cart!");
            
            }
            
        });
    });

    // Add event listener to "Rent" buttons
    const rentButtons = document.querySelectorAll('.rent_button');
    rentButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Get data from the button's attributes
            const title = button.getAttribute('data-title');
            const rentingprice = button.getAttribute('data-rentingprice');
            const sellingprice = button.getAttribute('data-sellingprice');
            const description = button.getAttribute('data-description');

            // Perform action with the rent button clicked
            alert('Rent button clicked for: ' + title + '\nRenting Price: ' + rentingprice + '\nSelling Price: ' + sellingprice + '\nDescription: ' + description);
        });

        
    });
});
