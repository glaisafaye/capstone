<?php
// Database configuration (same as in dss.php)
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'mis';

// Create a database connection
$conn = new mysqli($hostname, $username, $password, $database);

// Check the database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['residents_list'])) {
    $residentsList = $_POST['residents_list'];

    // Split the list of residents by comma
    $residentsArray = explode(',', $residentsList);

    // Initialize a variable to store the concatenated names
    $concatenatedNames = '';

    // Initialize a flag to keep track of the first name in a pair
    $isFirstName = true;

    // Iterate through the residents and concatenate their names with a comma
    foreach ($residentsArray as $residentName) {
        // Trim whitespace from the resident name
        $residentName = trim($residentName);

        // If it's the first name in a pair, set the flag to false and add a comma
        if ($isFirstName) {
            $concatenatedNames .= $residentName;
            $isFirstName = false;
        } else {
            // If it's the second name in a pair, add a newline character and set the flag to true
            $concatenatedNames .= ', ' . $residentName . "\n";
            $isFirstName = true;
        }
    }

    // Remove the trailing comma and space
    $concatenatedNames = rtrim($concatenatedNames, ', ');

    // Insert the concatenated names into the database as a single row
    $insertQuery = "INSERT INTO assistance_list (resident_name) VALUES ('$concatenatedNames')";

    if ($conn->query($insertQuery) !== TRUE) {
        echo "Error: " . $conn->error;
        // You might want to handle errors here, such as logging them.
    } else {
        // Display a pop-up message using JavaScript
        echo '<script>alert("Residents list has been successfully saved.");</script>';
    }
}

// Close the database connection
$conn->close();
?>
