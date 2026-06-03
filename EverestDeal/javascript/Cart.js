// // alert("Hey Bhagwan chalos hai.")

document.addEventListener('DOMContentLoaded', function ()
 {
    let label = document.getElementById('label');
    let shoppingcart = document.getElementById('shopping_cart');

    let bhado = JSON.parse(localStorage.getItem('data')) || [];
    
    //This gives the cart ma kati items gayo bhanera.
    let calculate = () =>
     {
        let cartIcon = document.getElementById('quantity');
        cartIcon.innerHTML = bhado.length;
    };
    calculate();
    
    let generate_Cart_item = () => 
    {
        // let bhado = JSON.parse(localStorage.getItem('data')) || [];
        
        if (bhado.length !== 0) 
        {
            shoppingcart.innerHTML = bhado.map((x) =>
             {
                let { id, name, price, description, image } = x;
                
                return `
                <div class='cart_item'>
                            <p>${name}</p>
                            <div class="cart_item_img">
                                <img src='${image}' alt='${name}' />
                            </div>
                            <p>Rs.${price}</p>
                            <p>${description}</p>
                            <button class="remove-button" data-id="${id}">Remove</button>

                        </div>`;
            }).join('');
        } 
        else 
        {
            shoppingcart.innerHTML = '<h1>No items in the cart.</h1>'; 
        }
    };

    

    let removeItem = (id) => 
    {
        let bhado = JSON.parse(localStorage.getItem('data')) || [];
        bhado = bhado.filter((x) => x.id != id);

        localStorage.setItem("data", JSON.stringify(bhado));
        
        alert("Clickvayo");
        calculate();
        generate_Cart_item();
        Total_amount(); 
    };
    

    let Total_amount = () =>
     {
        let paiso = 0;
        bhado.forEach((item) =>
         {
            paiso += item.item * item.price;
        });

        label.innerHTML = `
            <div class="Checkout_area">
            <h2>Total Price=${paiso}</h2>
            
            <button href="cart/checkout.html"class='Checkout' onclick>Checkout</button>

        </div>`;
    };
    calculate();
    generate_Cart_item();
    Total_amount();

    let removeButtons = document.querySelectorAll('.remove-button');
    removeButtons.forEach((button) => {
        button.addEventListener('click', function () {
            let itemId = parseInt(button.getAttribute('data-id'));
            removeItem(itemId);
        });
    });

   

//Ok..........................

 });