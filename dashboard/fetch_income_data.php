<?php
$con = mysqli_connect("localhost", "root", "", "mis");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$incomeGroups = array("Less than ₱20,000", "₱20,000 - ₱40,000", "₱40,000 - ₱60,000", "₱60,000 - ₱80,000", "Over ₱80,000");
$labels = [];
$values = [];

foreach ($incomeGroups as $incomeGroup) {
    // Modify this query to count residents with income in the specified income group
    $incomeQuery = mysqli_query($con, "SELECT COUNT(*) FROM household WHERE household_income = '$incomeGroup'");
    $incomeNumRows = mysqli_fetch_row($incomeQuery)[0];

    $labels[] = $incomeGroup;
    $values[] = $incomeNumRows;
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
