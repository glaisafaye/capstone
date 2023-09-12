<?php

$servername ="localhost";
$username ="root";
$password ="";
$database ="mis";

// Create connection
$connection = new mysqli($servername, $username, $password, $database);

    $household_number = "";
    $zone = "";
    $total_members = "";
    $head_of_the_family = ""; 
    $household_income = "";
    $sanitary_toilet = "";
    $water_usage = "";
    $house_ownership_status = "";
    $dwelling_type = "";
    $land_ownership_status = "";

    $errorMessage = "";
    $successMessage = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $household_number = $_POST["household_number"];
        $zone = $_POST["zone"];
        $total_members = $_POST["total_members"];
        $head_of_the_family = $_POST["head_of_the_family"];
        $household_income = $_POST["household_income"];
        $sanitary_toilet = $_POST["sanitary_toilet"];
$water_usage = $_POST["water_usage"];
$house_ownership_status = $_POST["house_ownership_status"];
$dwelling_type = $_POST["dwelling_type"];
$land_ownership_status = $_POST["land_ownership_status"];

    }
        if (empty($household_number) || empty($zone) || empty($total_members) || empty($head_of_the_family)) {
            $errorMessage = "All fields are required";
        } else {
            
            // add new household to the database 
            $sql = "INSERT INTO household(`household_number`, `zone`, `total_members`, `head_of_the_family`, `household_income`, `sanitary_toilet`,  `water_usage`, `house_ownership_status`,  `dwelling_type`, `land_ownership_status`) VALUES ('$household_number', '$zone', '$total_members', '$head_of_the_family', '$household_income', '$sanitary_toilet', '$water_usage', '$house_ownership_status', '$dwelling_type', '$land_ownership_status')";
            $result = $connection->query($sql);

            if (!$result) {
                $errorMessage = "Invalid query" . $connection->error;
            } else {
                $household_number = "";
                $zone = "";
                $total_members = "";
                $head_of_the_family = ""; 
                $household_income = "";
                $sanitary_toilet = "";
                $water_usage = "";
                $house_ownership_status = "";
                $dwelling_type = "";
                $land_ownership_status = "";

            $successMessage = "Household added correctly";

            header("location: /mis/household/household.php");
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
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Household Number</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="household number" value="<?php echo $household_number; ?>">
                </div>
            </div>
            <div class="col-sm-4">
                <label class="form-label">Zone</label>
                <select class="form-select" name="zone">
                <option value="Zone 1">Zone 1</option>
                <option value="Zone 2">Zone 2</option>
                <option value="Zone 3">Zone 3</option>
                <option value="Zone 4">Zone 4</option>
                <option value="Zone 5">Zone 5</option>
            </select>
        </div>
            <a class="btn btn-primary" href="/mis/residents/add.php" role="button">Add Member</a>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Total Members</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="total_members" value="<?php echo $total_members; ?>">
                </div>
            </div> 
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Head of the Family</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="head_of_the_family" value="<?php echo $head_of_the_family; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Household Income</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="household_income" value="<?php echo $household_income; ?>">
                </div>
            </div>
            <div class="col-sm-4">
                <label class="col-sm-3 col-form-label">Sanitary Toilet</label>
                <input type="text" class="form-control" name="sanitary_toilet" value="<?php echo $sanitary_toilet; ?>">
            </div>
            <div class="col-sm-4">
                <label class="col-sm-3 col-form-label">Water Usage</label>
                <input type="text" class="form-control" name="water_usage" value="<?php echo $water_usage; ?>">
            </div>
            <div class="col-sm-4">
                <label class="form-label">House ni Ownership Status</label>
                <select class="form-select" name="house_ownership_status">
                <option value="Owned">Owned</option>
                <option value="Landless">Landless</option>
                <option value="Tenant">Tenant</option>
                <option value="Care Taker">Care Taker</option>
            </select>
            </div>
            <div class="col-sm-4">
                <label class="col-sm-3 col-form-label">Dwelling Type</label>
                <input type="text" class="form-control" name="dwelling_type" value="<?php echo $dwelling_type; ?>">
            </div>
            <div class="col-sm-4">
                <label class="col-sm-3 col-form-label">Land Ownership Status</label>
                <input type="text" class="form-control" name="land_ownership_status" value="<?php echo $land_ownership_status; ?>">
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
                    <a class="btn btn-outline-primary" href="/mis/household/household.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>