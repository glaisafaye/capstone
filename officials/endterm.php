<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css"> 
    <title>End Official's Term</title>
</head>
<body>
    <?php
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve the official's ID from the URL parameter
        $official_id = $_GET["id"];

        // Validate and sanitize the official_id
        if (!filter_var($official_id, FILTER_VALIDATE_INT) || $official_id <= 0) {
            echo "Invalid official ID.";
            exit; // Exit the script
        }

        // Perform the database update to mark the end of the term
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "mis";

        // Create connection
        $connection = new mysqli($servername, $username, $password, $database);

        // Check connection
        if ($connection->connect_error) {
            die("Connection Failed: " . $connection->connect_error);
        }

        // Update the official's record in the database
        $sql = "UPDATE officials SET end_term = NOW() WHERE id = ?";
        $stmt = $connection->prepare($sql);
        if (!$stmt) {
        die("Error preparing SQL statement: " . $connection->error);
        }

$stmt->bind_param("i", $official_id);

if ($stmt->execute()) {
    echo "Official's term has been successfully ended.";
} else {
    echo "Error ending official's term: " . $stmt->error;
}

// Close the database connection
$stmt->close();
$connection->close();

    }
    ?>
    <h1>End Official's Term</h1>
    <p>Are you sure you want to end the term for this official?</p>
    <form method="POST">
        <input type="submit" name="confirm" value="Confirm">
    </form>
    <a href="/mis/officials/officials.php">Cancel</a>
</body>
</html>
