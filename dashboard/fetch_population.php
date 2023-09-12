<?php
$con = mysqli_connect("localhost", "root", "", "mis");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$totalQuery = mysqli_query($con, "SELECT COUNT(*) FROM residents");
$totalPopulation = mysqli_fetch_row($totalQuery)[0];

// Close the database connection
mysqli_close($con);

// Return the total population in JSON format
$data = [
    'totalPopulation' => $totalPopulation
];

header('Content-Type: application/json');
echo json_encode($data);
?>
