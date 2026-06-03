// Fetch cart items from local storage
let cartItems = JSON.parse(localStorage.getItem('cart')) || [];

// Reference the container element where you want to display the items
let cartContainer = document.getElementById('show');

// Function to create and display the cart table
function displayCartItems() {
    // Clear existing content in the cart container
    cartContainer.innerHTML = '';

    // Create a table element
    let table = document.createElement('table');
    table.classList.add('cart-table');

    // Create a table header row
    let headerRow = table.insertRow();
    let headers = ['S.N.', 'Title', 'Renting Price', 'Selling Price', 'Description', 'Renting Button','Buying Button','Remove Button'];

    // Create headers for the table
    headers.forEach(headerText => {
        let header = document.createElement('th');
        let textNode = document.createTextNode(headerText);
        header.appendChild(textNode);
        headerRow.appendChild(header);
    });

    let serialNumber = 1; // Initialize the serial number counter

    // Iterate over the cartItems array and create table rows to display each item
    cartItems.forEach(item => {
        let row = table.insertRow();

        // Insert serial number into the table cell
        let snCell = row.insertCell(0);
        snCell.textContent = serialNumber;
        serialNumber++; // Increment the serial number counter

        // Insert data into the table cells
        let titleCell = row.insertCell(1);
        titleCell.textContent = item.title;

        let rentingPriceCell = row.insertCell(2);
        rentingPriceCell.textContent = item.rentingprice;

        let sellingPriceCell = row.insertCell(3);
        sellingPriceCell.textContent = item.sellingprice;

        let descriptionCell = row.insertCell(4);
        descriptionCell.textContent = item.description;

        let rentingButtonCell = row.insertCell(5);
        let rentingButton = document.createElement('button');

        rentingButton.id = 'rentingButton';

        rentingButton.addEventListener('click', function() {
            alert('Button clicked! You are renting now.');
            window.location.href = 'final.php';
        });


        //Maile khjeko kuro yei ho
        rentingButton.textContent = `Rent at ${item.rentingprice}`;
        rentingButton.classList.add('renting-price-button');
        rentingButtonCell.appendChild(rentingButton);





        // SHirish selling button ra buying button eutai ho hai taile mistake garis. najhukkiyes.
        let sellingButtonCell = row.insertCell(6);
        // Maile khjeko kuro yeha chha.
        let sellingButton = document.createElement('button');

        sellingButton.id = 'sellingButton';

        sellingButton.addEventListener('click', function() {
            alert('Button clicked! You are buying now.');
            window.location.href = 'final.php';

        });


        sellingButton.textContent = `Buy at ${item.sellingprice}`;
        sellingButton.classList.add('selling-price-button');
        sellingButtonCell.appendChild(sellingButton);

        let removeButtonCell = row.insertCell(7);
        let removeButton = document.createElement('button');
        removeButton.textContent = 'Remove';
        removeButton.classList.add('remove-button');

        // Add event listener to remove the row when clicked
        removeButton.addEventListener('click', () => {
            // Remove the item from the cartItems array
            let index = cartItems.indexOf(item);
            if (index !== -1) {
                cartItems.splice(index, 1);
                // Update localStorage
                localStorage.setItem('cart', JSON.stringify(cartItems));
                // Refresh the cart page
                displayCartItems();
            }
        });

        removeButtonCell.appendChild(removeButton);
    });

    // Add style to create lines between elements
    table.style.borderCollapse = 'collapse';
    table.style.width = '100%';

    // Style table cells and rows
    let cells = table.querySelectorAll('td, th');
    cells.forEach(cell => {
        cell.style.border = '1px solid #dddddd';
        cell.style.padding = '8px';
    });

    // Append the table to the cartContainer
    cartContainer.appendChild(table);
}

// Display cart items initially
displayCartItems();

// Refresh the cart page every 30 seconds
// setInterval(() => {
//     location.reload();
// }, 5000); // 30000 milliseconds = 30 seconds




// adding button functionality

// Inside the displayCartItems() function after creating sellingButton

// Add event listener to the sellingButton


