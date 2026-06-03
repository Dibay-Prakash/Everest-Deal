document.addEventListener('DOMContentLoaded', function () {
    // let data = [];
    // function getData() {
    //     fetch("http://localhost/EverestDeal/data.php")
    //         .then(response => {
    //             if (!response.ok) {
    //                 throw new Error('Network response was not ok');
    //             }
    //             return response.json();
    //         })
    //         .then(responseData => {
    //             data = responseData; // Assign fetched data to the data variable
    //             renderCards(data); // Call a function to render cards
    //         })
    //         .catch(error => {
    //             console.error('Error fetching data:', error);
    //         });
    // }

    // function renderCards(data) {
    //     let cardsContainer = document.getElementById('card');
    //     cardsContainer.innerHTML = ''; // Clear previous content
    //     data.forEach(item => {
    //         let card = document.createElement('div');
    //         card.classList.add('card');
    //         // Create card elements...
    //         cardsContainer.appendChild(card);
    //     });
    // }

    // // Call the getData function when the page loads
    // getData();

    // Define search function
    function search() {
        let searchValue = document.getElementById('searchInput').value.toLowerCase();

        let filteredData = data.filter(item => {
            return (
                item.title.toLowerCase().includes(searchValue) || 
                item.description.toLowerCase().includes(searchValue)
            );
        });

        // Call displayFilteredItems function
        displayFilteredItems(filteredData);
    }

    // Define displayFilteredItems function
    function displayFilteredItems(filteredData) {
        let shop = document.getElementById('shop');
        shop.innerHTML = '';

        if (filteredData.length > 0) {
            shop.innerHTML = filteredData.map(item => {
                return `
                    <div class='shop_saman' id='product-id-${item.id}'>
                        <img src='${item.image}' alt=''/>
                        <div class='saman_info'>
                            <h5>${item.title}</h5>
                            
                            <p>Title:Selling Price:${item.sellingprice}</p>
                            <p>Renting Price:${item.rentingprice}</p>
                            <p>Description:${item.description}</p>
                            

                            <button onclick="add_to_cart()">Add to Cart</button>
                        </div>
                    </div>
                `;
            }).join('');
        } else {
            shop.innerHTML = '<p>No items found.</p>';
        }
    }

  

    // Add event listener to search button
    document.getElementById('searchButton').addEventListener('click', search);

    // Add event listener to search input for 'Enter' key
    document.getElementById('searchInput').addEventListener('keypress', function(event) {
        if (event.key === 'Enter') {
            search();
        }
    });

    
});