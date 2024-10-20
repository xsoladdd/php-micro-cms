<?php
function readFileToJson($jsonFilePath) {
    // Check if the file exists
    if (file_exists($jsonFilePath)) {
        // Get the content of the JSON file
        $jsonData = file_get_contents($jsonFilePath);

        // Decode JSON into an associative array
        $data = json_decode($jsonData, true);

        // Check if the decoding was successful
        return $data !== null ? $data : [];
    } else {
        return [];
    }
}
?>