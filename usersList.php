<?php
/**
 * This page allows the creation of a new user and displays all users' names in a table.
 */

// Include the User model to interact with user data
include 'Model/User.php';
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
<!-- Form for creating a new user -->
<div class="form-div">
    <h2>Create new user</h2>
    <form id="createUserForm">
        <label for="username">The Name of the new user</label>
        <br>
        <input type="text" name="username" id="username">
        <br>
        <input type="hidden" name="function" value="insert">
        <input type="submit" value="Submit">
    </form>
</div>
<!-- Table to display the usernames -->
<table class="Table">
    <tr>
        <th colspan="2">
            Usernames
        </th>
        <?php
        // Create an instance of the User class to fetch user data
        $userObj = new User();
        $results = $userObj->showUsers();

        $count = 0;
        // Loop through the user data and display it in table cells
        foreach($results as $row){
            if ($count % 2 == 0) {
                echo "<tr>";
            }
            echo "<td>" . $row["name"] . "</td>";
            if ($count % 2 == 1) {
                echo "</tr>";
            }
            $count++;
        }

        // If there's an odd number of rows, close the last row with an empty cell
        if ($count % 2 != 0) {
            echo "<td></td></tr>";
        }
        ?>
    </tr>
</table>
<script>
    // Add an event listener for the form submission
    document.getElementById('createUserForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission

        // Create a FormData object with the form's data
        var formData = new FormData(this);

        // Send the form data to the server using fetch
        fetch('Controller/userController.php', {
            method: 'Post',
            body: formData
        })
            .then(response => response.json()) // Parse the JSON response
            .then(data => {
                if (data.success) {
                    // Show a success alert and redirect to the users page
                    Swal.fire({
                        title: "Good job!",
                        text: "User created successfully!",
                        icon: "success"
                    }).then(() => {
                        window.location.href = "users"; // Adjust the URL as needed
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
