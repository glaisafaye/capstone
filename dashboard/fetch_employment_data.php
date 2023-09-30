<?php
$con = mysqli_connect("localhost", "root", "", "mis");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$employment_statuses = array("Employed", "Unemployed");
$labels = [];
$values = [];

foreach ($employment_statuses as $employment_status) {
    $employment_statusQuery = mysqli_query($con, "SELECT COUNT(*) FROM residents WHERE employment_status = '$employment_status'");
    $employment_statusNumRows = mysqli_fetch_row($employment_statusQuery)[0];

    $labels[] = $employment_status;
    $values[] = $employment_statusNumRows;
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
