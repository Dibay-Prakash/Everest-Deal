//kam garyo

function search() {
    let searchValue = document.getElementById('searchInput').value.trim().toLowerCase();
    let bhado = JSON.parse(localStorage.getItem('data')) || [];

    console.log("Data Array:", bhado);
    
    let filteredData = bhado.filter(item => {
        console.log("Item:", item);
        return (
            item && item.title &&
            item.title.toLowerCase().includes(searchValue) 
        );
    });
    
    console.log("Filtered Data:", filteredData);

    // function call garey
    displayFilteredItems(filteredData);
}

// Function to display filtered items
function displayFilteredItems(filteredData)
 {
    shop.innerHTML = '';

    // Check if there are any filtered items to display
    // yedi search input kahli chha bhane kam gardaina. k ? 
    if (filteredData.length > 0) 
    {
        shop.innerHTML = filteredData.map(item => 
            {
            return `
                <div class='shop_saman' id='product-id-${item.id}'>
                    <img src='${item.images}' alt=''/>
                    <div class='saman_info'>
                        <h5>${item.title}</h5>
                        <h5>${item.rentingprice}</h5>
                        <h5>${item.sellingprice}</h5>
                        <h5>${item.description}</h5>
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