<?php

$con = mysqli_connect("localhost", "root", "", "mis");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$civil_statuses = array("Single", "Married", "Widowed", "Separated");
$labels = [];
$values = [];

foreach ($civil_statuses as $civil_status) {
    $civil_statusQuery = mysqli_query($con, "SELECT COUNT(*) FROM residents WHERE civil_status = '$civil_status'");
    $civil_statusNumRows = mysqli_fetch_row($civil_statusQuery)[0];

    $labels[] = $civil_status;
    $values[] = $civil_statusNumRows;
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