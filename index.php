<!--
 /**
 *
 * This script reads user data from a JSON file and displays it in an HTML list.
 * It includes a utility function to read the JSON file and handle any exceptions
 * that may occur during the file reading process.
 *
 * Dependencies:
 * - utils/readFileToJson.php: Contains the readFileToJson function to read JSON data from a file.
 *
 * Variables:
 * - $jsonFile (string): Path to the JSON file containing user data.
 * - $users (array|null): Array of user data decoded from the JSON file, or null if an error occurs.
 *
 * HTML Output:
 * - Displays a list of users with their names and email addresses.
 * - If the JSON data cannot be read or decoded, an error message is displayed.
 *
 * External Resources:
 * - Bootstrap CSS from Bootswatch for styling.
 *
 * @package php-cms-micro
 */
  -->
<?php
    // Include the function to read a JSON file and convert it to an array
    include './utils/readFileToJson.php';

    // Path to the JSON file
    $jsonFile = 'data.json';
    $users = null; // Initialize the users variable to null

    try {
        // Attempt to read the JSON file and decode it into an array
        $users = readFileToJson($jsonFile);
    } catch (Exception $e) {
        // If an error occurs, display an error message
        echo "<p>Failed to read JSON data: " . $e->getMessage() . "</p>";
    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://bootswatch.com/5/lux/bootstrap.min.css">
</head>
<body>
    <h1>User List</h1>

    <?php
    // Check if users data was successfully read and decoded
    if ($users !== null) {
        echo "<ul class='list-group'>";
        // Loop through each user and display their info in the list
        foreach ($users as $user) {
            // Use htmlspecialchars to prevent XSS attacks by escaping special characters
            echo "<li class='list-group-item'><strong>Name:</strong> " . htmlspecialchars($user['name']) . " - <strong>Email:</strong> " . htmlspecialchars($user['email']) . "</li>";
        }
        echo "</ul>";
    } else {
        // If users data is null, display an error message
        echo "<p>Failed to decode JSON data.</p>";
    }
    ?>
</body>
</html>