<?php
/**
 * This page allows the creation of a new advertisement and displays all advertisements' titles and the names of the users who created them in a table.
 */

// Include the User and Advertisements models to interact with user and advertisement data
include 'Model/User.php';
include 'Model/Advertisements.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php
// Include the head section for HTML metadata and styles
include('head.php');
?>
<body>
<!-- Navigation bar -->
<nav class="navbar">
    <div class="navbar-container">
        <a href="home" class="navbartitle">Home</a>
        <ul class="navbar-links">
            <li><a href="users">Users</a></li>
            <li><a href="advertisements">Advertisements</a></li>
        </ul>
    </div>
</nav>
<!-- Form for creating a new advertisement -->
<div class="form-div">
    <h2>Create new advertisement</h2>
    <form id="createAdvertisementForm">
        <label for="advertisement">The Name of the new advertisement</label>
        <br>
        <input type="text" name="advertisement" id="advertisement">
        <br>
        <input type="hidden" name="function" value="insert">
        <label for="userSelect">Choose the name of the user who creates the advertisement</label>
        <br>
        <select id="userSelect" name="userSelect">
            <?php
            // Fetch user data and populate the select element
            $userObj = new User();
            $results = $userObj->showUsers();
            foreach($results as $row){
                echo "<option value=\"" . htmlspecialchars($row["id"]) . "\">" . htmlspecialchars($row["name"]) . "</option>";
            }
            ?>
        </select>
        <br>
        <input type="submit" value="Submit">
    </form>
</div>
<!-- Table to display usernames and advertisement titles -->
<table class="Table">
    <tr>
        <th>Usernames</th>
        <th>Titles</th>
        <?php
        // Fetch advertisement data and display it in table rows
        $advertisementObj = new Advertisements();
        $results = $advertisementObj->showAdvertisements();
        foreach($results as $row){
            echo "<tr><td>" . htmlspecialchars($row["name"]) . "</td><td>" . htmlspecialchars($row["title"]) . "</td></tr>";
        }
        ?>
    </tr>
</table>
<script>
    document.getElementById('createAdvertisementForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission

        // Create a FormData object with the form's data
        var formData = new FormData(this);

        // Send the form data to the server using fetch
        fetch('Controller/advertisementController.php', {
            method: 'POST',
            body: formData
        })
            .then(response => response.json()) // Parse the JSON response
            .then(data => {
                if (data.success) {
                    // Show a success alert and redirect to the advertisements page
                    Swal.fire({
                        title: "Good job!",
                        text: "Advertisement created successfully!",
                        icon: "success"
                    }).then(() => {
                        window.location.href = "advertisements"; // Adjust the URL as needed
                    });
                } else {
                    // Show an error alert with the error message
                    Swal.fire({
                        title: "Error!",
                        text: data.message,
                        icon: "error"
                    });
                }
            })
            .catch(error => console.error('Error:', error)); // Handle any errors
    });
</script>
</body>
</html>
