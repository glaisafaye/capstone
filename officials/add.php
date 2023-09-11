<?php

$servername ="localhost";
$username ="root";
$password ="";
$database ="mis";

// Create connection
$connection = new mysqli($servername, $username, $password, $database);

    $position = "";
    $name = "";
    $contact_number = "";
    $address = "";
    $start_term= "";
    $end_term = "";


    $errorMessage = "";
    $successMessage = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $position = $_POST["position"];
        $name = $_POST["name"];
        $contact_number = $_POST["contact_number"];
        $address = $_POST["address"];
        $start_term = $_POST["start_term"];
        $end_term = $_POST["end_term"];


    }
    if (empty($name) || empty($contact_number) || empty($address)) {
        $errorMessage = "All fields are required";
    } else {
        // ...
        
            
            // add new official to the database 
            $sql = "INSERT INTO officials (`position`, `name`, `contact_number`, `address`, `start_term`, `end_term` ) VALUES ('$position', '$name', '$contact_number', '$address', '$start_term', '$end_term')";
            $result = $connection->query($sql);

            if (!$result) {
                $errorMessage = "Invalid query" . $connection->error;
            } else {
                $position = "";
                $name = "";
                $contact_number = "";
                $address = "";
                $start_term = "";
                $end_term = "";
          

            $successMessage = "Official added correctly";

            header("location: /mis/officials/officials.php");
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
        <div class="row mb-4">
                <label class="form-label">Position</label>
                <select class="form-select" name="position">
                <option value="Punong Barangay">Punong Barangay</option>
                <option value="Barangay Kagawad">Barangay Kagawad</option>
                <option value="SK Chairperson">SK Chairperson</option>
                <option value="Barangay IPMR">Barangay IPMR</option>
                <option value="Barangay Secretary">Barangay Secretary</option>
                <option value="Barangay Treasurer">Barangay Treasurer</option>
                <option value="Barangay Records-Keeper">Barangay Records-Keeper</option>
            </select>
        </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Contact Number</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="contact_number" value="<?php echo $contact_number; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Address</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="address" value="<?php echo $address; ?>">
                </div>
            </div>
            <div class="form-group">
                <label>Start Term:</label>
                    <input type="date" class="form-control" name="start_term" value="<?php echo $start_term; ?>">
            </div>
            <div class="form-group">
                <label>End Term:</label>
                    <input type="date" class="form-control" name="end_term" value="<?php echo $end_term; ?>">
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
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/mis/officials/officials.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>