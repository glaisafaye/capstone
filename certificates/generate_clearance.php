<?php
// Include the database connection code
include('db_connection.php'); // Replace 'db_connection.php' with the actual path to your database connection code

// Assuming you have a resident ID from your database query
$residentID = $_GET['resident_id']; // You might get the ID from the URL or elsewhere

// Fetch the resident's name, clearanceNO, purpose, OR Number, date of birth, gender, and civil status from the database by joining the tables
$query = "SELECT r.fname, r.lname, r.bday, r.gender, r.civStatus, c.clearanceNO, c.purpose, c.orNo FROM residents r
          JOIN clearance1 c ON r.id = c.residentid
          WHERE c.id = $residentID"; // Assuming 'c.id' is the primary key of your clearance1 table

$result = $connection->query($query);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $residentName = $row['fname'] . ' ' . $row['lname'];
    $clearanceNO = $row['clearanceNO'];
    $purpose = $row['purpose'];
    $orNumber = $row['orNo'];
    $dateOfBirth = $row['bday']; // Store the date of birth in a variable
    $gender = $row['gender']; // Store the gender in a variable
    $civilStatus = $row['civStatus']; // Store the civil status in a variable

    // Calculate the age based on the date of birth
    $dob = new DateTime($dateOfBirth);
    $currentDate = new DateTime();
    $age = $currentDate->diff($dob)->y; // Calculate the age in years
} else {
    // Handle the case where the resident ID is not found
    $residentName = "Resident Name Not Found";
    $clearanceNO = "Clearance Number Not Found";
    $purpose = "Purpose Not Found";
    $orNumber = "OR Number Not Found";
    $dateOfBirth = "Date of Birth Not Found";
    $gender = "Gender Not Found";
    $civilStatus = "Civil Status Not Found";
    $age = "Age Not Found";
}

// Include your certificate template file here and pass $residentName, $clearanceNO, $purpose, $orNumber, $dateOfBirth, $gender, $civilStatus, and $age as parameters
include('barclear.php'); // Replace 'barclear.php' with the actual path to your template file
?>
