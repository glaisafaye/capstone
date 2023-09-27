<?php

include('db_connection.php'); 

$residentID = $_GET['resident_id']; 

$query = "SELECT r.fname, r.lname, c.clearanceNO, c.purpose FROM residents r
          JOIN clearance c ON r.id = c.residentid
          WHERE c.id = $residentID"; 

$result = $connection->query($query);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $residentName = $row['fname'] . ' ' . $row['lname'];
    $clearanceNO = $row['clearanceNO'];     
    $purpose = $row['purpose'];
} else {
   
    $residentName = "Resident Name Not Found";
    $clearanceNO = "Clearance Number Not Found";
    $purpose = "Purpose Not Found";
}

include('brgyin.php');
?>