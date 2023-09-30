<?php
// Database configuration
$hostname = 'localhost';
$username = 'root'; 
$password = '';   
$database = 'mis';

$conn = new mysqli($hostname, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = $conn->query($query);

if ($result->num_rows == 1) {
 
    header("Location: /mis/dashboard/dashboard.php"); 
} else {
 
    echo "Invalid username or password.";
}

$conn->close();
?>
