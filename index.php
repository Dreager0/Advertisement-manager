<?php
/**
 * This is the index where the user can visit the two pages of the site, users and advertisements.
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--Configuring the head of the html-->
    <meta charset="UTF-8">
    <title>Advertisements</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Adding the stylesheet to the html-->
    <link rel="stylesheet" href="Template/CSS/styles.css">
</head>
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
    <!--Welcome section-->
    <div class="welcome">
        <h1>Welcome to the website of the Advertisements!</h1>
        <h3>Use the navigation bar to reach the users list and the advertisements list</h3>
    </div>
</body>
</html>