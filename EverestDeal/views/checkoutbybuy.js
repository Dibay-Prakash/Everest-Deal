document.addEventListener('DOMContentLoaded', function() {
    // Get the element with the id 'add_to_cart'
    let buyButton = document.getElementById('');

    // Check if the element is found before adding the event listener
    if (buyButton) {
        // Add event listener to the 'Add to Cart' button
        buyButton.addEventListener('click', function() {
            // Display an alert message when the button is clicked
            alert('Item renting button has been clicked.');
        });
    } else {
        console.error('Element with id "add_to_cart" not found.');
    }
});
