<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'mis';

$conn = new mysqli($hostname, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['residents_list'])) {
    $residentsList = $_POST['residents_list'];

    $residentsArray = explode(',', $residentsList);

    $concatenatedNames = '';

    $isFirstName = true;

    foreach ($residentsArray as $residentName) {
        $residentName = trim($residentName);

        if ($isFirstName) {
            $concatenatedNames .= $residentName;
            $isFirstName = false;
        } else {
            $concatenatedNames .= ', ' . $residentName . "\n";
            $isFirstName = true;
        }
    }

    $concatenatedNames = rtrim($concatenatedNames, ', ');

    $insertQuery = "INSERT INTO assistance_list (resident_name) VALUES ('$concatenatedNames')";

    if ($conn->query($insertQuery) !== TRUE) {
        echo "Error: " . $conn->error;
    } else {
        echo '<script>alert("Residents list has been successfully saved.");</script>';
    }
}

$conn->close();
?>
