<?php
/**
 * This page handles the creation of new advertisements via a POST request.
 * It reads the request, performs the necessary database operations, and returns a JSON response.
 */

require_once '../Model/Advertisements.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data from the POST request
    $function = $_POST["function"];
    $id = $_POST["userSelect"];
    $title = $_POST["advertisement"];

    // Determine which function to execute based on the 'function' field
    switch ($function) {
        case "insert":
            $result = advertisementInsert($id, $title);
            echo json_encode($result); // Return the result as a JSON response
            exit();
        // Add other cases as needed
    }
}

/**
 * Inserts a new advertisement into the database.
 *
 * @param int $id The ID of the user creating the advertisement.
 * @param string $title The title of the advertisement.
 * @return array The result of the operation, including success status and message.
 */
function advertisementInsert($id, $title) {
    $advertisement = new Advertisements();
    if ($advertisement->createAdvertisement($id, $title)) {
        return ["success" => true];
    } else {
        return ["success" => false, "message" => "Advertisement creation failed."];
    }
}

/**
 * Deletes an advertisement from the database.
 *
 * @param string $id The id of the advertisement to delete.
 * @return array The result of the operation, including success status and message.
 */
function advertisementDelete($id) {
    // TODO: Implement function
}
?>
