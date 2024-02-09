// Wait for the DOM to be fully loaded before accessing elements
document.addEventListener('DOMContentLoaded', function() {
    // Get the form and message elements
    var form = document.getElementById('name');
    var message = document.getElementById('poppet');

    // Add event listener to the form
    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent form submission

        // Get the name and poppet input values
        var name = document.getElementById('name').value;
        var poppet = document.getElementById('poppet').value;


        // Example: Display a message
        message.innerText = 'User added successfully!';

        // Redirect to home.php
        window.location.href = '/home';
    });
});
