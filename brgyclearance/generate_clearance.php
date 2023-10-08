<?php
include '../brgyclearance/db_connection.php';

if (isset($_GET['resident_id'])) {
    $residentid = $_GET['resident_id']; 

    $query = "SELECT r.fname, r.lname, r.bday, r.gender, r.civStatus, c.clearanceNO, c.purpose, c.orNo FROM residents r
              JOIN brgyclearance c ON r.id = c.residentid
              WHERE c.id = $residentid"; 

    $result = $connection->query($query);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $residentName = $row['fname'] . ' ' . $row['lname'];
        $clearanceNO = $row['clearanceNO'];
        $purpose = $row['purpose'];
        $orNumber = $row['orNo'];
        $dateOfBirth = $row['bday']; 
        $gender = $row['gender']; 
        $civilStatus = $row['civStatus'];

        $dob = new DateTime($dateOfBirth);
        $currentDate = new DateTime();
        $age = $currentDate->diff($dob)->y; 
    } else {
        $residentName = "Resident Name Not Found";
        $clearanceNO = "Clearance Number Not Found";
        $purpose = "Purpose Not Found";
        $orNumber = "OR Number Not Found";
        $dateOfBirth = "Date of Birth Not Found";
        $gender = "Gender Not Found";
        $civilStatus = "Civil Status Not Found";
        $age = "Age Not Found";
    }

    include('../brgyclearance/barclear.php');

    } else {
        echo "Resident ID not provided in the URL.";
    }
    
