<?php
/**
 * This page handles the creation of new users via a POST request.
 * It reads the request, performs the necessary database operations, and returns a JSON response.
 */

require_once '../Model/User.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data from the POST request
    $function = $_POST["function"];
    $name = $_POST["username"];

    // Determine which function to execute based on the 'function' field
    switch ($function) {
        case "insert":
            $result = userInsert($name);
            echo json_encode($result); // Return the result as a JSON response
            exit();
        // Add other cases as needed
    }
}

/**
 * Inserts a new user into the database.
 *
 * @param string $name The name of the user to create.
 * @return array The result of the operation, including success status and message.
 */
function userInsert($name)
{
    $user = new User();
    if ($user->createUser($name)) {
        return ["success" => true];
    } else {
        return ["success" => false, "message" => "User creation failed."];
    }
}

/**
 * Deletes a user from the database.
 *
 * @param string $name The name of the user to delete.
 * @return array The result of the operation, including success status and message.
 */
function userDelete($name)
{
    // TODO: Implement function
}

?>
