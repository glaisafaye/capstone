<?php
if (isset($_GET["id"])){
    $id = $_GET["id"];

    $servername ="localhost";
    $username ="root";
    $password ="";
    $database ="mis";    

    // Create connection
    $connection = new mysqli($servername, $username, $password, $database);

    $sql = "DELETE FROM clearance WHERE id=$id";
    $connection->query($sql);
}

    header("location: /mis/certificates/certificates.php");
    exit;
?>