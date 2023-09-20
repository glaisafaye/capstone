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

<!DOCTYPE html>
<html lang="en">

<head>


</head>

<body>
    <?php
        include 'layout.php';
        ?>

<div id="pop-up-modal" class="modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <h3 class="modal-title">Enter Resident Information</h3>
            <div class="modal-body modal-dialog-scrollable">
                <form method="post">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label">Last Name</label>
                                <input type="text" class="form-control" name="lname" value="<?php echo $lname; ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label">First Name</label>
                                <input type="text" class="form-control" name="fname" value="<?php echo $fname; ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label">Middle Name</label>
                                <input type="text" class="form-control" name="mname" value="<?php echo $mname; ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label">Phone</label>
                                <input type="text" class="form-control" name="phone" value="<?php echo $phone; ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label">Gender</label>
                                <select class="form-select" name="gender">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label">Civil Status</label>
                                <select class="form-select" name="civil_status">
                                    <option value="single">Single</option>
                                    <option value="married">Married</option>
                                    <option value="divorced">Divorced</option>
                                    <option value="widowed">Widowed</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label">Birthday</label>
                                <input id="Birthday" name="birthday" class="form-control" type="date" placeholder="birthday" value="<?php echo $birthday; ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="col-sm-3 col-form-label">Household Number</label>
                                <input type="text" class="form-control" name="household_number" value="<?php echo $household_number; ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label">Differently-abled Person</label>
                                <select class="form-select" name="differently_abled_person">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label">Zone Number</label>
                                <select class="form-select" name="zone">
                                    <option value="Zone 1">Zone 1</option>
                                    <option value="Zone 2">Zone 2</option>
                                    <option value="Zone 3">Zone 3</option>
                                    <option value="Zone 4">Zone 4</option>
                                    <option value="Zone 5">Zone 5</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="col-sm-3 col-form-label">Total Household Member</label>
                                <input type="text" class="form-control" name="total_household_member" value="<?php echo $total_household_member; ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="col-sm-3 col-form-label">Relationship to Head</label>            
                                <input type="text" class="form-control" name="relationship_to_head" value="<?php echo $relationship_to_head; ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label">Employment Status</label>
                                <select class="form-select" name="employment_status">
                                    <option value="Employed">Employed</option>
                                    <option value="Unemployed">Unemployed</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="col-sm-3 col-form-label">Religion</label>               
                                <input type="text" class="form-control" name="religion" value="<?php echo $religion; ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="col-sm-3 col-form-label">Income</label>               
                                <input type="text" class="form-control" name="income" value="<?php echo $income; ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
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
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="col-sm-3 col-form-label">Remarks</label>
                                <input type="text" class="form-control" name="remarks" value="<?php echo $remarks; ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="col-sm-3 col-form-label">Nationality</label>
                                <input type="text" class="form-control" name="nationality" value="<?php echo $nationality; ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="offset-sm-3 col-sm-3 d-grid">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            <div class="col-sm-3 d-grid">
                                <a class="btn btn-outline-primary" href="/mis/residents/residents.php" role="button">Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



    <div class="main">
            <div class="content">
                <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                <div class="container my-5">
                    <div class="d-flex justify-content-center mb-3">
                        <button type="button" class="btn btn-primary" id="showModal">Add Resident</button>
                    </div>
                    <br>
            <table class="content-table">
                <thead>
                    <tr>
                        <th>Household Number</th>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Gender</th>
                        <th>Zone</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                <?php 
               
                $servername ="localhost";
                $username ="root";
                $password ="";
                $database ="mis";

                $connection = new mysqli($servername, $username, $password, $database);

                if ($connection ->connect_error) {
                    die ("Connection Failed: " . $connection ->connect_error);
                } 

                $sql_total_records = "SELECT COUNT(*) AS total FROM residents";
                $result_total_records = $connection->query($sql_total_records);
                $row_total_records = $result_total_records->fetch_assoc();
                $total_records = $row_total_records['total'];

                $recordsPerPage = 10;
                $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

                $total_pages = ceil($total_records / $recordsPerPage);

                $offset = ($current_page - 1) * $recordsPerPage;

                $sql = "SELECT * FROM residents LIMIT $offset, $recordsPerPage";

                $result = $connection->query($sql);

                if ($result) {
                    while ($row = $result->fetch_assoc()) {

                    echo "
                    <tr>
                        <td>{$row['household_number']}</td>
                        <td>{$row['lname']}</td>
                        <td>{$row['fname']}</td>
                        <td>{$row['gender']}</td>
                        <td>{$row['zone']}</td>
                        <td>
                <a class='btn btn-primary btn-sm' href='/mis/residents/edit.php?id={$row['id']}'>Edit</a> 
                <a class='btn btn-danger btn-sm' href='/mis/residents/delete.php?id={$row['id']}'>Delete</a>
            </td>
        </tr>
        ";
        }
        } else {
            echo "Error executing SQL query: " . $connection->error;
        }

           ?>                
        </tbody> 
    </table>          
    
        <div class="pagination">
            <?php
                $total_records = 
                $total_pages = ceil($total_records / $recordsPerPage);

                if ($current_page > 1) {
                echo '<a class="btn btn-primary" href="?page=' . ($current_page - 1) . '">Previous</a>';
                }

                for ($i = max(1, $current_page - 5); $i <= min($current_page + 5, $total_pages); $i++) {
                    if ($i == $current_page) {
                     echo '<span class="current-page">' . $i . '</span>';
                        }  else {
                    echo '<a class="btn btn-primary" href="?page=' . $i . '">' . $i . '</a>';
                }
            }

                    if ($current_page < $total_pages) {
                        echo '<a class="btn btn-primary" href="?page=' . ($current_page + 1) . '">Next</a>';
            }
            ?>

        </div>
    </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script> 
        <script>
            document.getElementById("showModal").addEventListener("click", function () {
            var firstModal = document.getElementById("pop-up-modal");
            firstModal.style.display = "block"; 
        });

       
        document.getElementById("close-modal").addEventListener("click", function () {
            var firstModal = document.getElementById("pop-up-modal");
            firstModal.style.display = "none"; 
        });
        </script>
</body>
</html>
