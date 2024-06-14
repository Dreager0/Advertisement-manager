<?php
    include 'Model/User.php'
?>
<!DOCTYPE html>
<html lang="en">
    <?php
    include('head.php')
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
<table class="userTable">
    <tr>
        <th colspan="2">
            Usernames
        </th>

        <?php
        $userObj = new User();
        $results = $userObj->showUsers();

        $count = 0;
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

        // If there's an odd number of rows, close the last row
        if ($count % 2 != 0) {
            echo "<td></td></tr>";
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
                    // Show a success alert and redirect to the users page
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
