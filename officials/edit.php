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
    $start_term= "";
    $end_term = "";


$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if (!isset($_GET["id"])){
        header ("location: /mis/officials/officials.php");
        exit;
    }

    $id= $_GET["id"];

    //read the row of the selected official from the database table
    $sql = "SELECT * FROM officials  WHERE id=$id";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();

    if (!$row){
        header("location: /mis/officials/officials.php");
        exit;
    }

    $position = $row["position"];
    $name = $row["name"];
    $contact_number = $row["contact_number"];
    $start_term = $row["start_term"]; 
    $end_term = $row["end_term"];

}
else {

        $id = $_POST["id"];
        $position = $_POST["position"];
        $name = $_POST["name"];
        $contact_number = $_POST["contact_number"];
        $start_term = $_POST["start_term"];
        $end_term = $_POST["end_term"];


        if (empty($position) || empty($name) || empty($contact_number) || empty($start_term) || empty($end_term)) {
            $errorMessage = "All fields are required";
        } else {
    
            $sql = "UPDATE officials " . 
            "SET position = '$position', name = '$name', `contact_number` = '$contact_number', `start_term` = '$start_term', `end_term` = '$end_term' " . 
            "WHERE id = $id";
 
        
            
        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query" . $connection->error;
        } else {

            $successMessage = "Official added correctly";

            header("location: /mis/officials/officials.php");
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
    <title>My Shop</title>
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
            <input type="hidden" name="id" value="<?php echo $id; ?>">
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
                    <input type="text" class="form-control" name="contact number" value="<?php echo $contact_number; ?>">
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