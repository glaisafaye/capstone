<?php
// Include the database connection code
include('db_connection.php'); // Replace 'db_connection.php' with the actual path to your database connection code

// Assuming you have a resident ID from your database query
$residentID = $_GET['resident_id']; // You might get the ID from the URL or elsewhere

// Fetch the resident's name, clearanceNO, and purpose from the database by joining the tables
$query = "SELECT r.fname, r.lname, c.clearanceNO, c.certificate, c.purpose FROM residents r
          JOIN clearance c ON r.id = c.residentid
          WHERE c.id = $residentID"; // Assuming 'c.id' is the primary key of your clearance table

$result = $connection->query($query);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $residentName = $row['fname'] . ' ' . $row['lname'];
    $clearanceNO = $row['clearanceNO'];
    $certificate = $row['certificate'];
    $purpose = $row['purpose'];
} else {
    // Handle the case where the resident ID is not found
    $residentName = "Resident Name Not Found";
    $clearanceNO = "Clearance Number Not Found";
    $purpose = "Purpose Not Found";
}

// Include your certificate template file here and pass $residentName, $clearanceNO, and $purpose as parameters
include('brgyin.php'); // Replace 'certificate_template.php' with the actual path to your template file
?>