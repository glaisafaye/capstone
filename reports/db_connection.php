<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "mis";

// Create a database connection
$mysqli = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>
