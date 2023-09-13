<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "mis";

// Create connection
$connection = new mysqli($servername, $username, $password, $database);

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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fname = isset($_POST["fname"]) ? $_POST["fname"] : "";
    $lname = isset($_POST["lname"]) ? $_POST["lname"] : "";
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
    $nationality  = $_POST["nationality"];

    if (isset($_POST["submit"])) {
        
        $sql = "INSERT INTO residents (`fname`, `lname`, `mname`, `phone`, `gender`, `birthday`, `civil_status`, `household_number`, `differently_abled_person`, `zone`, `total_household_member`, `relationship_to_head`, `employment_status`, `religion`, `income`, `educational_attainment`, `remarks`, `nationality`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $connection->prepare($sql);

        $stmt->bind_param(
            "ssssssssssssssssss",
            $fname,
            $lname,
            $mname,
            $phone,
            $gender,
            $birthday,
            $civil_status,
            $household_number,
            $differently_abled_person,
            $zone,
            $total_household_member,
            $relationship_to_head,
            $employment_status,
            $religion,
            $income,
            $educational_attainment,
            $remarks,
            $nationality,
        );

        $result = $stmt->execute();

        if (!$result) {
            $errorMessage = "Error: " . $stmt->error;
        } else {

            $successMessage = "Resident added correctly";
            header("location: /mis/residents/residents.php");
            exit;
        }
    }
}
?>


<<!DOCTYPE html>
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
            font-size: 12px;
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
    <script>
        function validateForm() {
            var requiredFields = ["fname", "lname", "phone"];
            for (var i = 0; i < requiredFields.length; i++) {
                var fieldName = requiredFields[i];
                var fieldValue = document.forms["residentForm"][fieldName].value;
                if (fieldValue.trim() === "") {
                    alert("Please fill in all required fields.");
                    return false; 
                }
            }
            return true; 
        }
    </script>
</head>
<body>

<?php
    if (!empty($errorMessage)) {
        echo "
            <div  class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
    }
    ?>

<form class="" action="" method="post" autocomplete="off" enctype="multipart/form-data" onsubmit="return validateForm();">

        <div class="row mb-3">
        <div class="col-md-4">
            <label class="form-label">Last Namee</label>
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
                <option value="single">Single</option>
                <option value="married">Married</option>
                <option value="divorced">Divorced</option>
                <option value="widowed">Widowed</option>
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


<?php
    if (!empty($errorMessage)) {
        echo "
            <div  class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
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

    </form>
</body>

</html>