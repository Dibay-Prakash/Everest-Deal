document.addEventListener('DOMContentLoaded', function()
{
    // Get the search query from the input field
    var searchQuery = document.getElementById('searchInput').value;

    // Perform the AJAX request only if a search query is provided
    if (searchQuery.trim() !== '') {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    // Handle the response
                    console.log(response);
                } else {
                    console.error('Error: ' + xhr.status);
                }
            }
        };
        xhr.open('GET', 'search.php?query=' + encodeURIComponent(searchQuery), true);
        xhr.send();
    } else {
        console.log('Please enter a search query');
    }
});
