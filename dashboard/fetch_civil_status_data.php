<?php

$con = mysqli_connect("localhost", "root", "", "mis");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$civStatuses = array("Single", "Married", "Widowed", "Separated");
$labels = [];
$values = [];

foreach ($civStatuses as $civStatus) {
    $civStatusQuery = mysqli_query($con, "SELECT COUNT(*) FROM residents WHERE civStatus = '$civStatus'");
    $civStatusNumRows = mysqli_fetch_row($civStatusQuery)[0];

    $labels[] = $civStatus;
    $values[] = $civStatusNumRows;
}

// Close the database connection
mysqli_close($con);

// Return the data in JSON format
$data = [
    'labels' => $labels,
    'values' => $values
];

header('Content-Type: application/json');
echo json_encode($data);
?>