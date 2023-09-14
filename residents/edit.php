<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "mis";

$connection = new mysqli($servername, $username, $password, $database);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$fname = "";
$lname = "";
$mname = "";
$phone = "";
$gender = "";
$birthday = "";
$civil_status = "";
$household_number = "";
$differently_abled_person = "";
$zone = "";
$total_household_member = "";
$relationship_to_head = "";
$employment_status = "";
$religion = "";
$income = "";
$educational_attainment = "";
$remarks = "";
$nationality = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // GET method: Show the data of the residents

    if (!isset($_GET["id"])) {
        header("location: /mis/residents/residents.php");
        exit;
    }

    $id = $_GET["id"];

    $sql = "SELECT * FROM residents WHERE id=?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 0) {
        header("location: /mis/residents/residents.php");
        exit;
    }

    $row = $result->fetch_assoc();

    $fname = $row["fname"];
    $lname = $row["lname"];
    $mname = $row["mname"];
    $phone = $row["phone"];
    $gender = $row["gender"];
    $birthday = $row["birthday"];
    $civil_status = $row["civil_status"];
    $household_number = $row["household_number"];
    $differently_abled_person = $row["differently_abled_person"];
    $zone = $row["zone"];
    $total_household_member = $row["total_household_member"];
    $relationship_to_head = $row["relationship_to_head"];
    $employment_status = $row["employment_status"];
    $religion = $row["religion"];
    $income = $row["income"];
    $educational_attainment = $row["educational_attainment"];
    $remarks = $row["remarks"];
    $nationality = $row["nationality"];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST["id"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $mname = $_POST["mname"];
    $phone = $_POST["phone"];
    $gender = $_POST["gender"];
    $birthday = $_POST["birthday"];
    $civil_status = $_POST["civil_status"];
    $household_number = $_POST["household_number"];
    $differently_abled_person = $_POST["differently_abled_person"];
    $zone = $_POST["zone"];
    $total_household_member = $_POST["total_household_member"];
    $relationship_to_head = $_POST["relationship_to_head"];
    $employment_status = $_POST["employment_status"];
    $religion = $_POST["religion"];
    $income = $_POST["income"];
    $educational_attainment = $_POST["educational_attainment"];
    $remarks = $_POST["remarks"];
    $nationality = $_POST["nationality"];

    if (empty($fname) || empty($lname) || empty($phone) || empty($gender) || empty($zone)) {
        $errorMessage = "All fields are required";
    } else {
        $sql = "UPDATE residents SET `fname` = ?, `lname` = ?, `mname` = ?, `phone` = ?, `gender` = ?, `birthday` = ?, `civil_status` = ?, `household_number` = ?, `differently_abled_person` = ?, `zone` = ?, `total_household_member` = ?, `relationship_to_head` = ?, `employment_status` = ?, `religion` = ?, `income` = ?, `educational_attainment` = ?, `remarks` = ?, `nationality` = ? WHERE id = ?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("ssssssssssssssssssi", $fname, $lname, $mname, $phone, $gender, $birthday, $civil_status, $household_number, $differently_abled_person, $zone, $total_household_member, $relationship_to_head, $employment_status, $religion, $income, $educational_attainment, $remarks, $nationality, $id);
        
        if ($stmt->execute()) {
            $successMessage = "Resident updated correctly";
            header("location: /mis/residents/residents.php");
            exit;
        } else {
            $errorMessage = "Error updating resident: " . $stmt->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Residents</title>
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
            background-color: #6699CC;
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
        if ( !empty($errorMessage)){
            echo "
            <div  class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
        ?>
       <form class="" action="" method="post" autocomplete="off" enctype="multipart/form-data">
            
            <div class="row mb-3">
            <div class="col-md-4">
                    <label class="form-label">Last Name</label>
                    <input type="text" class="form-control" name="lname" value="<?php echo $lname; ?>">
                </div>
                <div class="col-md-4">
                    <label class="form-label">First Name</label>
                    <input type="text" class="form-control" name="fname" value="<?php echo $fname; ?>">
                </div>
                <div class="col-md-4">
            <label class="form-label">Middle Name</label>
            <input type="text" class="form-control" name="mname" value="<?php echo $mname; ?>">
        </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="form-label">Phone</label>
                    <input type="text" class="form-control" name="phone" value="<?php echo $phone; ?>">
                </div>
            </div>
            <div class="col-md-4">
            <label class="form-label">Gender</label>
            <select class="form-select" name="gender">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="form-label">Civil Status</label>
                    <select class="form-select" name="civil_status">
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                        <option value="Divorced">Divorced</option>
                        <option value="Widowed">Widowed</option>
                    </select>
                </div>
                        <div class="col-md-4">
                            <label class="form-label">Birthday</label>
                            <input id="Birthday" name="birthday" class="form-control" type="date" placeholder="birthday" value="<?php echo $birthday; ?>">
                        </div>
                        <div class="col-md-4">
                            <label class="col-sm-3 col-form-label">Household Number</label>
                            <input type="text" class="form-control" name="household_number" value="<?php echo $household_number; ?>">
                        </div>
                    <div class="col-md-4">
                        <label class="form-label">Differently-abled Person</label>
                            <select class="form-select" name="differently_abled_person">
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                            </select>
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
                        <div class="col-sm-4">
                            <label class="col-sm-3 col-form-label">Total Household Member</label>
                            <input type="text" class="form-control" name="total_household_member" value="<?php echo $total_household_member; ?>">
                        </div>
                        <div class="col-sm-4">
                            <label class="col-sm-3 col-form-label">Relationship to Head</label>            
                            <input type="text" class="form-control" name="relationship_to_head" value="<?php echo $relationship_to_head; ?>">
                        </div>
                        <div class="col-md-4">
                        <label class="form-label">Employment Status</label>
                    <select class="form-select" name="employment_status">
                        <option value="Employed">Employed</option>
                        <option value="Unemployed">Unemployed</option>
                        </select>
                </div>
                        <div class="col-sm-4">
                            <label class="col-sm-3 col-form-label">Religion</label>               
                            <input type="text" class="form-control" name="religion" value="<?php echo $religion; ?>">
                        </div>
                        <div class="col-sm-4">
                            <label class="col-sm-3 col-form-label">Income</label>               
                            <input type="text" class="form-control" name="income" value="<?php echo $income; ?>">
                        </div>
                        <div class="row mb-3">
                <div class="col-md-4">
                    <label class="form-label">Educational Attainment</label>
                    <select class="form-select" name="educational_attainment">
                        <option value="none">None</option>
                        <option value="Elementary_Level">Elementary Level</option>
                        <option value="Elementary_Graduate">Elementary Graduate</option>
                        <option value="High_School_Level">High School Level</option>
                        <option value="High_School_Graduate">High School Graduate</option>
                        <option value="Senior_High_Level">Senior High Level</option>
                        <option value="Senior_High_Graduate">Senior High Graduate</option>
                        <option value="College_Level">College Level</option>
                        <option value="College_Graduate">College Graduate</option>
                    </select>
                </div>
                        <div class="col-sm-4">
                            <label class="col-sm-3 col-form-label">Remarks</label>
                            <input type="text" class="form-control" name="remarks" value="<?php echo $remarks; ?>">
                       </div>
                        <div class="col-sm-4">
                            <label class="col-sm-3 col-form-label">Nationality</label>
                            <input type="text" class="form-control" name="nationality" value="<?php echo $nationality; ?>">
                       </div>
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
    <div class="col-sm-6">
        <div class="row">
            <div class="col-sm-6">
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </div>
            <div class="col-sm-6">
                <a class="btn btn-outline-primary" href="/mis/residents/residents.php" role="button">Cancel</a>
            </div>
        </div>
    </div>
</div>

</body>
</html>