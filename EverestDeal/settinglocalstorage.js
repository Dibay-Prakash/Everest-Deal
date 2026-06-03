// Fetch data from the server using fetch()
fetch("http://localhost/EverestDeal/data.php")
    .then(response => {
        // Check if the response is OK
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        // Parse the response as JSON and return it
        return response.json();
    })
    .then(data => {
        // Store the fetched data in a variable
        let fetchedData = data;

        // Now you can work with the fetchedData variable containing the data from the server
        console.log(fetchedData);

        // Store the fetched data in localStorage
        localStorage.setItem('data', JSON.stringify(fetchedData));
    })
    .catch(error => {
        // Handle any errors that occur during the fetch request
        console.error('Error:', error);
    });
// Retrieve the value associated with the key 'data' from localStorage
let storedData = localStorage.getItem('data');

// data store vayeko chha with variable name stored data hai.
// if (storedData !== null && storedData !== undefined) {
//     console.log('Data is stored in localStorage:', storedData);
// } else {
//     console.log('Data is not stored in localStorage');
// }
