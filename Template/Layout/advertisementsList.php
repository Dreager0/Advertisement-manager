<?php
    include '../../src/Model/User.php';
    include '../../src/Model/Advertisements.php'
?>
<!DOCTYPE html>
<html lang="">
    <?php
    include('head.php');
    ?>
<body>
    <!--Creating the navigation bar-->
    <nav class="navbar">
        <div class="navbar-container">
            <a href="home" class="navbartitle">Home</a>
            <ul class="navbar-links">
                <li><a href="users">Users</a></li>
                <li><a href="advertisements">Advertisements</a></li>
            </ul>
        </div>
    </nav>
    <!--Creating form for creating new advertisement-->
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
                $userObj = new User();
                $results = $userObj->showUsers();
                // Adding the fetched data to the select element
                foreach($results as $row){
                    echo "<option value=\"" . htmlspecialchars($row["id"]) . "\">" . htmlspecialchars($row["name"]) . "</option>";
                }
                ?>
            </select>
            <br>
            <!--Sending the data to the createAdvertisement.php from the form with post method by the submit button-->
            <input type="submit" value="Submit">
        </form>
    </div>
    <table class="Table">
        <tr>
            <th>
                Usernames
            </th>
            <th>
                Titles
            </th>

            <?php
            $advertisementObj = new Advertisements();
            $results = $advertisementObj->showAdvertisements();

            foreach($results as $row){

                echo "<tr>" . "<td>" . $row["name"] . "</td>" . "<td>" . $row["title"] . "</td>" . "</tr>";
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
            fetch('src/Controller/advertisementController.php', {
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
                            window.location.href = "Template/Layout/advertisements"; // Adjust the URL as needed
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