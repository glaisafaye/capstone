<?php
$servername ="localhost";
$username ="root";
$password ="";
$database ="mis";

// Create a database connection
$connection = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
?>