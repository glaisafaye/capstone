<?php

include('db_connection.php'); 

$residentID = $_GET['resident_id']; 

$query = "SELECT r.fname, r.lname, c.clearanceNO, c.types, c.orNo, c.amount, c.description, c.validDate, c.id FROM residents r
          JOIN busclearance c ON r.id = c.residentid
          WHERE c.id = $residentID"; 

$result = $connection->query($query);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $clearanceNO = $row['clearanceNO'];    
    $residentName = $row['fname'] . ' ' . $row['lname']; 
    $types = $row['types'];
    $orNo = $row['orNo'];
    $amount = $row['amount'];
    $description = $row['description'];
    $validDate = $row['validDate'];

} else {
   
    $residentName = "Resident Name Not Found";
    $clearanceNO = "Clearance Number Not Found";
    $types = "Type Not Found";
    $orNo = "orNo Not Found";
    $amount = "amount Not Found";
    $description = "description Not Found";
    $validDate = "validDate Not Found";

}

include('busclear.php');
?>