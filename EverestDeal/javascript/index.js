



const shop = document.getElementById('shop')
shop.innerHTML="Heyram"

// localStorage.getItem(key)
let bhado=JSON.parse(localStorage.getItem('data'))||[]

// // browser ko local storage ma data rakhxhu aba.





let displaymyitems = () =>
 {
    
    shop.innerHTML = ''

    shop.innerHTML=merasaman.map((saman)=>
    {
        let {id,name,price,description,image}=saman;


        return `
        <div class='shop_saman' id='product-id-${id}'>
            <img src='${image}' alt=''/>
            <div class='saman_info'>
                <h5>${name}</h5>
                <p><span>Rs:</span>${price}</p>
                <p>${description}</p>
                <button onclick="add_to_cart('${id}','${name}','${price}','${image}','${description}')">Add to Cart</button>
            </div>
        </div>`;
    

    }).join('')
}

let add_to_cart=(id,name,price,image,description)=>
{
    bhado.push({
        id:id,
        item:1,
        name:name,
        image:image,
        price:price,
        description:description
    })
    localStorage.setItem('data',JSON.stringify(bhado))
    calc_quantity()
};

let calc_quantity=()=>
{
    let quantity_value = document.getElementById('quantity')
    // if (quantity_value)
    // {
    //     quantity_value.innerHTML=bhado.length
    // }
    quantity_value.innerHTML=bhado.length
 }
displaymyitems()
calc_quantity()

// i want my local storage clear on every refresh haneko ta yesto po ayo.


// function clearLocalStorageOnRefresh() 
// {
//     // Check if the page is being refreshed
//     window.onbeforeunload = function() {
//         // Clear the local storage haneko ta vayena yesto po garna parni raixa.
//         localStorage.clear();
//     };
// }

// // Call the function to clear local storage on page refresh
// clearLocalStorageOnRefresh();






//malai aba search bar bata haneko data haru dekhauna paryo aba k garni hola?

function search()
 {
   
    // Get the value entered by the user in the search input
    let searchValue = document.querySelector('.search input').value.toLowerCase();

    let filteredData = merasaman.filter(item => {
        return (
            item.name.toLowerCase().includes(searchValue) || 
            item.description.toLowerCase().includes(searchValue)
        );
    });

    // function call garey
    displayFilteredItems(filteredData);
}

// Function to display filtered items
function displayFilteredItems(filteredData)
 {
    shop.innerHTML = '';

    // Check if there are any filtered items to display
    // yedi search input kahli chha bhane kam gardaina. k ? Search Button. merasaman dekhaidinxa.
    if (filteredData.length > 0) 
    {
        shop.innerHTML = filteredData.map(item => 
            {
            return `
                <div class='shop_saman' id='product-id-${item.id}'>
                    <img src='${item.image}' alt=''/>
                    <div class='saman_info'>
                        <h5>${item.name}</h5>
                        <p><span>Rs:</span>${item.price}</p>
                        <p>${item.description}</p>
                        <button onclick="add_to_cart('${item.id}','${item.name}','${item.price}','${item.image}','${item.description}')">Add to Cart</button>
                    </div>
                </div>
            `;
        }).join('');
    } 
    else
     {
        // If no items match the search criteria
        shop.innerHTML = '<p>No items found.</p>';
    }
}

// search button lai functional banayeko
// mouse listener
document.querySelector('.search button').addEventListener('click', search);

//key listener
document.querySelector('.search input').addEventListener('keypress', function(event)
 {
    if (event.key === 'Enter') 
    {
        alert("I am entering this alert for checking either search is working or not.")
        search();
    }

    

});
