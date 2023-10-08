<?php

$con = mysqli_connect("localhost", "root", "", "mis");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Define age groups
$ageGroups = array(
    "0-9",
    "10-19",
    "20-29",
    "30-39",
    "40-49",
    "50-59",
    "60+"
);

$labels = [];
$values = [];

foreach ($ageGroups as $ageGroup) {
    // Calculate the minimum and maximum birthdates for the age group
    if ($ageGroup == "60+") {
        $minAgeDate = date("Y-m-d", strtotime("-60 years"));
        $maxAgeDate = date("Y-m-d");
    } else {
        $ageRange = explode("-", $ageGroup);
        $minAge = $ageRange[0];
        $maxAge = $ageRange[1];
        $minAgeDate = date("Y-m-d", strtotime("-$maxAge years"));
        $maxAgeDate = date("Y-m-d", strtotime("-$minAge years -1 day"));
    }

    // Query the database to count residents in the age group
    $ageQuery = mysqli_query($con, "SELECT COUNT(*) FROM residents WHERE bday BETWEEN '$minAgeDate' AND '$maxAgeDate'");
    $ageNumRows = mysqli_fetch_row($ageQuery)[0];

    $labels[] = $ageGroup;
    $values[] = $ageNumRows;
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