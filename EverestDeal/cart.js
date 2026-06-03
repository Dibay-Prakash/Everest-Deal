document.addEventListener('DOMContentLoaded', function() {
  // Get references to DOM elements
  let label = document.getElementById('label');
  let shoppingCart = document.getElementById('shopping_cart');
  let cartIcon = document.getElementById('quantity');

  // Retrieve data from localStorage
  let bhado = JSON.parse(localStorage.getItem('data')) || [];

  // Function to update the cart icon count
  let updateCartIcon = () => {
      cartIcon.innerHTML = bhado.length;
  };

  // Function to generate cart items HTML
  let generateCartItems = () => {
      if (bhado.length !== 0) {
          let cartItemsHtml = bhado.map((item) => {
              let { id, images, title, rentingprice, sellingprice, description } = item;
              return `
                  <div class='cart_item'>
                      <div class="cart_item_img">
                          <img src='${images}' alt='${title}' />
                      </div>
                      <p>Name: ${title}</p>
                      <p>Renting Price: Rs.${rentingprice}</p>
                      <p>Selling Price: Rs.${sellingprice}</p>
                      <p>Description: ${description}</p>
                      <button class="remove-button" data-id="${id}">Remove</button>
                  </div>
              `;
          }).join('');
          shoppingCart.innerHTML = cartItemsHtml;
      } else {
          shoppingCart.innerHTML = '<h1>No items in the cart.</h1>';
      }
  };

  // Function to remove an item from the cart
  let removeItem = (id) => {
      bhado = bhado.filter((x) => x.id != id);
      localStorage.setItem("data", JSON.stringify(bhado));
      updateCartIcon();
      generateCartItems();
      calculateTotalAmount();
  };

  // Function to calculate the total amount
  let calculateTotalAmount = () => {
      let totalRentingPrice = 0;
      let totalSellingPrice = 0;

      // Calculate the total renting and selling prices
      bhado.forEach((item) => {
          totalRentingPrice += parseFloat(item.rentingprice);
          totalSellingPrice += parseFloat(item.sellingprice);
      });

      // Set the total amount in the label
      label.innerHTML = `
          <div class="Checkout_area">
              <h2>Total Renting Price: Rs.${totalRentingPrice}</h2>
              <h2>Total Selling Price: Rs.${totalSellingPrice}</h2>
              <button href="cart/checkout.html" class='Checkout'>Checkout</button>
          </div>`;
  };

  // Call necessary functions
  updateCartIcon();
  generateCartItems();
  calculateTotalAmount();

  // Add event listeners to remove buttons
  let removeButtons = document.querySelectorAll('.remove-button');
  removeButtons.forEach((button) => {
      button.addEventListener('click', function () {
          let itemId = parseInt(button.getAttribute('data-id'));
          removeItem(itemId);
      });
  });
});
