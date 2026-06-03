document.addEventListener('DOMContentLoaded', function() {
    // Get the element with the id 'add_to_cart'
    let addToCartButton = document.getElementById('add_to_cart');

    // Check if the element is found before adding the event listener
    if (addToCartButton) {
        // Add event listener to the 'Add to Cart' button
        addToCartButton.addEventListener('click', function() {
            // Display an alert message when the button is clicked
            alert('Item added to cart!');
        });
    } else {
        console.error('Element with id "add_to_cart" not found.');
    }
});
