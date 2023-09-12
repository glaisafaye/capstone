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
$land_ownership_status = "";


$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if (!isset($_GET["id"])){
        header ("location: /mis/household/household.php");
        exit;
    }

    $id= $_GET["id"];

    //read the row of the selected household from the database table
    $sql = "SELECT * FROM household  WHERE id=$id";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();

    if (!$row){
        header("location: /mis/household/household.php");
        exit;
    }
        $id = $row["id"];
        $household_number = $row["household_number"];
        $zone = $row["zone"];
        $total_members = $row["total_members"];
        $head_of_the_family = $row["head_of_the_family"];
        $household_income = $row["household_income"];
        $sanitary_toilet = $row["sanitary_toilet"];
        $water_usage = $row["water_usage"];
        $house_ownership_status = $row["house_ownership_status"];
        $land_ownership_status = $row["land_ownership_status"];
}
// ...

else {
        $id = $_POST["id"];
        $household_number = $_POST["household_number"];
        $zone = $_POST["zone"];
        $total_members = $_POST["total_members"];
        $head_of_the_family = $_POST["head_of_the_family"];
        $household_income = $_POST["household_income"];
        $sanitary_toilet = $_POST["sanitary_toilet"];
        $water_usage = $_POST["water_usage"];
        $house_ownership_status = $_POST["house_ownership_status"];
        $land_ownership_status = $_POST["land_ownership_status"];

    if (empty($household_number) || empty($zone) || empty($total_members) || empty($head_of_the_family) || empty($sanitary_toilet) || empty($water_usage) || empty($house_ownership_status) || empty($land_ownership_status)) {
        $errorMessage = "All fields are required";
    } else {
        $sql = "UPDATE household SET `household_number`='$household_number', `zone`='$zone', `total_members`='$total_members', `head_of_the_family`='$head_of_the_family', `household_income`='$household_income', `sanitary_toilet`='$sanitary_toilet', `water_usage`='$water_usage', `house_ownership_status`='$house_ownership_status', `land_ownership_status`='$land_ownership_status'  WHERE id=$id";
        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query: " . $connection->error;
        } else {
            $successMessage = "Household updated correctly";

            header("location: /mis/household/household.php");
            exit;
        }
    }
}

// ...

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Shop</title>
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
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Household Number</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="household number" value="<?php echo $household_number; ?>">
                </div>
            </div>
            <div class="col-sm-4">
                <label class="form-label">Zone Number</label>
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
                <label class="form-label">Sanitary Toilet</label>
                <select class="form-select" name="sanitary_toilet">
                <option value="Water-sealed">Water-sealed</option>
                <option value="Antipolo">Antipolo</option>
                <option value="None">None</option>
                </select>
            </div>
            <div class="col-sm-4">
                <label class="form-label">Water Usage</label>
                <select class="form-select" name="water_usage">
                <option value="Faucet">Faucet</option>
                <option value="Deep Well">Deep Well</option>
                </select>
            </div>
            <div class="col-sm-4">
                <label class="form-label">House Ownership Status</label>
                <select class="form-select" name="house_ownership_status">
                <option value="Owned">Owned</option>
                <option value="Rent">Rent</option>
                </select>
            </div>
            <div class="col-sm-4">
                <label class="form-label">Land Ownership Status</label>
                <select class="form-select" name="land_ownership_status">
                <option value="Owned">Owned</option>
                <option value="Landless">Landless</option>
                <option value="Tenant">Tenant</option>
                <option value="Care Taker">Care Taker</option>
                </select>
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