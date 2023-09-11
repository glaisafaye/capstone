<?php

$servername ="localhost";
$username ="root";
$password ="";
$database ="mis";

// Create connection
$connection = new mysqli($servername, $username, $password, $database);

    $clearanceNo = "";
    $lname= "";
    $fname = "";
    $age= "";
    $zone = ""; 
    $purpose = "";
    $orNo = "";

    $errorMessage = "";
    $successMessage = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $clearanceNo = $_POST["clearanceNo"];
        $lname = $_POST["lname"];
        $fname = $_POST["fname"];
        $age = $_POST["age"];
        $zone = $_POST["zone"];
        $purpose = $_POST["purpose"];
        $orNo = $_POST["orNo"];
        
    }
        if (empty($clearanceNo) || empty($lname) || empty($fname) || empty($age) || empty($zone)|| empty($purpose) || empty($orNo))  {
            $errorMessage = "All fields are required";
        } else {
            
            // add new household to the database 
            $sql = "INSERT INTO new (`clearanceNo`, `lname`, `fname`, `age`, `zone`, `purpose`, `orNo`) VALUES ('$clearanceNo', '$lname', '$fname', '$age', '$zone', '$purpose', '$orNo')";
            $result = $connection->query($sql);

            if (!$result) {
                $errorMessage = "Invalid query" . $connection->error;
            } else {
                $clearanceNo = "";
                $lname= "";
                $fname = "";
                $age= "";
                $zone = ""; 
                $purpose = "";
                $orNo = "";


            $successMessage = "Added new correctly";

            header("location: /mis/certificates/barangayclearance.php");
            exit;
        }
        
    } 
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #F5F5F5;
        }

        form {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #F5F5F5;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
            font-size: 14px;
            color: #333333;
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
            display: flex;
            align-items: center;
        }

        .col-sm-3 {
            flex: 0 0 30%;
            padding-right: 10px;
        }

        .col-sm-9 {
            flex: 1;
        }

        .btn {
            background-color: #0074D9;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #888888;
        }
    </style>

</head>
<body>
    <div class="container my-5"></div>

        <?php
        if ( !empty($errorMessage)){
            echo "
            <div  class='alert alert-warning alert-dismissible fade show' role='alert'>
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
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Last Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="lname" value="<?php echo $lname; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">First Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="fname" value="<?php echo $fname; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Age</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="age" value="<?php echo $age; ?>">
                </div>
            </div>
            <div class="row-sm-3">
                <label class="form-label">Zone Number</label>
                <div class="col-sm-6">
                <select class="form-select" name="zone">
                <option value="Zone 1">Zone 1</option>
                <option value="Zone 2">Zone 2</option>
                <option value="Zone 3">Zone 3</option>
                <option value="Zone 4">Zone 4</option>
                <option value="Zone 5">Zone 5</option>
            </select>
        </div>
        <div class="row">
                <label for="purpose">Purpose:</label>
                <input type="text" class="form-control" id="purpose" name="purpose" value="<?php echo $purpose; ?>">
            </div>
            <div class="row">
                <label for="orNo">OR Number:</label>
                <input type="text" class="form-control" id="orNo" name="orNo" value="<?php echo $orNo; ?>">
            </div>
    


            <?php
                if ( !empty($successMessage) ){
                echo "
                    <div class='row mb-3'>
                        <div class='offset-sm-3 col-sm-6'>
                            <div class='alert alert-success alert -dismissible fade show' role='alert'>
                                <strong> $successMessage </strong>
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
                    <a class="btn btn-outline-primary" href="/mis/brgyclear/barangayclearance.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>