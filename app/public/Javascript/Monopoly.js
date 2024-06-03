// Wait for the DOM to be fully loaded before accessing elements
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

// The rest of your JavaScript code...

// Wait for the DOM to be fully loaded before accessing elements
document.addEventListener('DOMContentLoaded', function() {
    // Get all property cells
    const propertyCells = document.querySelectorAll('.property-cell');

    // Attach click event listeners to each property cell
    propertyCells.forEach(cell => {
        cell.addEventListener('click', () => {
            const propertyId = cell.getAttribute('data-property-id'); // Get the property ID
            const propertyName = cell.textContent.trim();
            const nextSibling = cell.nextElementSibling;
            if (nextSibling && nextSibling.textContent) {
                const propertyFine = nextSibling.textContent.trim();
                // Display the popup with property details
                displayPopup(propertyName, propertyId); // Pass the property ID instead of property fine
            } else {
                console.error('Error: Property fine element not found');
            }
        });
    });
});
// Function to fetch property details including fines using AJAX
function fetchPropertyDetails(propertyId) {
    return new Promise((resolve, reject) => {
        // Make an AJAX request to fetch the property details
        fetch(`http://localhost/api/getpropertydetails?propertyId=${propertyId}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Failed to fetch property details');
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    resolve(data.propertyDetails); // Resolve with property details
                } else {
                    reject(data.message); // Reject with error message
                }
            })
            .catch(error => {
                reject(error); // Reject with error object
            });
    });
}

function displayPopup(propertyName, propertyId) {
    // Fetch property details including fines
    fetchPropertyDetails(propertyId)
        .then(propertyDetails => {
            // Generate the table for fines
            let finesTableHTML = `
                <table>
                    <thead>
                        <tr>
                            <th>Description</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><td>No building</td><td>$${propertyDetails.propertyRent}</td></tr>
                        <tr><td>1 house</td><td>$${propertyDetails.oneHouse}</td></tr>
                        <tr><td>2 houses</td><td>$${propertyDetails.twoHouse}</td></tr>
                        <tr><td>3 houses</td><td>$${propertyDetails.threeHouse}</td></tr>
                        <tr><td>4 houses</td><td>$${propertyDetails.fourHouses}</td></tr>
                        <tr><td>Hotel</td><td>$${propertyDetails.hotelRent}</td></tr>
                    </tbody>
                </table>
            `;
            const propertyDetailsHTML = `
                <h2>Property Name: ${propertyName}</h2>
                <hr>
                <h4>Owner Name: <?php echo $user['userName'] ?? '[Name Unavailable]'; ?></h4>
                <h4>Fines:</h4>
                ${finesTableHTML}
                <hr> 
                <h4>Mortgage Value: $${propertyDetails.mortgageValue}</h4>
                <h4>House Cost: $${propertyDetails.buildingCost} (each)</h4>
                <h4>Hotel Cost: $${propertyDetails.buildingCost} (with 4 houses)</h4>
            `;
            document.getElementById('property-details').innerHTML = propertyDetailsHTML;

            document.getElementById('popup').style.display = 'block';
        })
        .catch(error => {
            console.error('Error fetching property details:', error);
        });
}

function closePopup() {
    document.getElementById('popup').style.display = 'none';
}


    document.addEventListener("DOMContentLoaded", function() {
    // Find the return button
    const returnButton = document.getElementById("return");

    // Add event listener for click
    returnButton.addEventListener("click", function(event) {
    // Prevent form submission
    event.preventDefault();
    window.location.href = "/adminportal";
});
});

function finishTurn() {
    fetch('/finishTurn', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ finish_turn: true }) // Send a flag to indicate finishing turn
    })
        .then(response => {
            if (!response.ok) {
                throw new Error('Failed to finish turn');
            }
            return response.json();
        })
        .then(data => {
            // Reload the page to display the next player's information
            location.reload();
        })
        .catch(error => {
            console.error('Error finishing turn:', error);
        });
}
document.addEventListener("DOMContentLoaded", function() {
    const forms = document.querySelectorAll(".updateBalanceForm");

    forms.forEach(form => {
        form.addEventListener("submit", function(event) {
            event.preventDefault(); // Prevent default form submission

            const formData = new FormData(this);
            const userId = this.dataset.userid;
            const messageDiv = document.getElementById(`updateMessage-${userId}`);

            fetch('/updatebalance', {
                method: 'POST',
                body: formData
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok.');
                    }
                    return response.text();
                })
                .then(data => {
                    // Display success message
                    messageDiv.textContent = 'Balance updated successfully.';
                })
                .catch(error => {
                    console.error('Error:', error);
                    // Display error message
                    messageDiv.textContent = 'An error occurred while updating balance.';
                });
        });
    });

    // Handle the assign property form via AJAX
    document.getElementById("assignPropertyForm").addEventListener("submit", function(event) {
        event.preventDefault(); // Prevent default form submission

        const formData = new FormData(this);

        fetch('/assignproperty', {
            method: 'POST',
            body: formData
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok.');
                }
                return response.json(); // Parse JSON response
            })
            .then(data => {
                if (data.status === 'success') {
                    // Display success message or update UI if needed
                    console.log('Property assigned successfully:', data.message);
                    alert('Property assigned successfully.');

                    // Optionally, update the UI to reflect the changes without reloading the page
                    // You can dynamically update the property owner here
                } else {
                    throw new Error(data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while assigning the property. Please try again.');
            });
    });
});

document.addEventListener("DOMContentLoaded", function() {
    const deleteUserForm = document.getElementById("deleteUserForm");

    deleteUserForm.addEventListener("submit", function(event) {
        event.preventDefault(); // Prevent default form submission

        const formData = new FormData(this);

        fetch('/deleteuser', {
            method: 'POST',
            body: formData
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok.');
                }
                return response.text();
            })
            .then(data => {
                // Handle success (optional)
                console.log('User deleted successfully:', data);
                // Reload the page or update UI as needed
                window.location.reload();
            })
            .catch(error => {
                console.error('Error:', error);
                // Display error message or handle error accordingly (optional)
            });
    });
});

document.addEventListener('DOMContentLoaded', function() {
    // Get all color change buttons
    const colorChangeButtons = document.querySelectorAll('.color-change-btn');

    // Add click event listeners to each button
    colorChangeButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Get the parent row (tr element)
            const row = this.closest('tr');

            // Change the background color of the row to red
            row.style.backgroundColor = 'red';
        });
    });
});
