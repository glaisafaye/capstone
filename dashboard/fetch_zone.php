<?php
$con = mysqli_connect("localhost", "root", "", "mis");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$zones = array("Zone 1", "Zone 2", "Zone 3", "Zone 4", "Zone 5");
$labels = [];
$values = [];

foreach ($zones as $zone) {
    $zoneQuery = mysqli_query($con, "SELECT COUNT(*) FROM residents WHERE zone = '$zone'");
    $zoneNumRows = mysqli_fetch_row($zoneQuery)[0];

    $labels[] = $zone;
    $values[] = $zoneNumRows;
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