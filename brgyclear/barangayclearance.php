<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "mis";

// Create connection
$connection = new mysqli($servername, $username, $password, $database);

$clearanceNo = "";
$residentid = "";
$purpose = "";
$orNo = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if the POST data exists before accessing it
    if (isset($_POST["clearanceNO"])) {
        $clearanceNo = $_POST["clearanceNO"];
    }
    if (isset($_POST["ddl_resident"])) {
        $residentid = $_POST["ddl_resident"];
    }
    if (isset($_POST["purpose"])) {
        $purpose = $_POST["purpose"];
    }
    if (isset($_POST["orNo"])) {
        $orNo = $_POST["orNo"];
    }

    if (empty($clearanceNo) || empty($residentid) || empty($purpose) || empty($orNo)) {
        $errorMessage = "All fields are required";
    } else {

        $sql = "INSERT INTO clearance (`clearanceNO`, `residentid`, `purpose`, `orNo`) VALUES ('$clearanceNo', '$residentid', '$purpose', '$orNo')";
        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query" . $connection->error;
        } else {
            $clearanceNo = "";
            $residentid = "";
            $purpose = "";
            $orNo = "";

            $successMessage = "Certificate added correctly";

            header("location: /mis/certificates/certificates.php");
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }

        form {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
            font-size: 14px;
            color: #333;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .row {
            margin-bottom: 15px;
        }

        .btn {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <?php
        if (!empty($errorMessage)) {
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
        ?>
        <form method="post">
            <div class="row">
                <label for="clearanceNO">Clearance No:</label>
                <input type="text" class="form-control" id="clearanceNO" name="clearanceNO" value="<?php echo $clearanceNo; ?>">
            </div>
            <div class="row">
                <label for="ddl_resident">Resident:</label>
                <select id="ddl_resident" name="ddl_resident" class="form-control">
                    <option value="" selected disabled>-- Select Resident --</option>
                    <?php
                    $squery = $connection->query("SELECT r.id, r.lname, r.fname FROM residents r");
                    while ($row = $squery->fetch_assoc()) {
                        echo '<option value="' . $row['id'] . '">' .$row['lname'].' , ' .$row['fname'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <button type="button" class="btn btn-success" id="addNewButton">Add New</button>
            <div class="row">
                <label for="purpose">Purpose:</label>
                <input type="text" class="form-control" id="purpose" name="purpose" value="<?php echo $purpose; ?>">
            </div>
            <div class="row">
                <label for="orNo">OR Number:</label>
                <input type="text" class="form-control" id="orNo" name="orNo" value="<?php echo $orNo; ?>">
            </div>
            <?php
            if (!empty($successMessage)) {
                echo "
                <div class='row'>
                    <div class='col'>
                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                            <strong>$successMessage</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>
                    </div>
                </div>
                ";
            }
            ?>
                  
                    
            <div class="row">
                <div class="col">                 
                <a class='btn btn-primary btn-sm' href='/mis/brgyclear/barclear.php'>Generate</a> 
                    <a class="btn btn-outline-primary" href="/mis/certificates/certification.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
    <script>
        document.getElementById('addNewButton').addEventListener('click', function() {
            window.location.href = '/mis/brgyclear/add_new.php'; 
        });
    </script>
</body>
</html>
