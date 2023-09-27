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

</head>

<body>
    <?php
    include 'layout.php';
    ?>

    <div id="pop-up-modal" class="modal">
        <div class="modal-content">
            <h1>Enter Clearance Information</h1>
            <form method="post" action="">
                <input type="hidden" id="selected_document_type" name="selected_document_type">
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
                            echo '<option value="' . $row['id'] . '">' . $row['lname'] . ' , ' . $row['fname'] . '</option>';
                        }
                        ?>
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

                <a class="btn btn-outline-primary" href="/mis/certificates/certificates.php" role="button">Cancel</a>
                <button type="submit" class="btn btn-primary" id="submitDocumentRequest">Submit Request</button>
            </form>
        </div>
    </div>



    <div class="main">
        <div class="content">
            <div class="container my-5">
                <div class="btn-group">
                    <a class="btn btn-primary float-right" href="/mis/certificates/certificates1.php" role="button">Barangay Clearance</a>
                    <a class="btn btn-primary" href="/mis/certificates/certificates.php" role="button">Barangay Indigency</a>
                </div>
                <br>
                <button type="button" class="btn btn-primary float-end" id="showModal">Add Certificate</button>
                <br>
                <table class="content-table">
                    <thead>
                        <tr>
                            <th>Clearance #</th>
                            <th>Resident Name</th>
                            <th>Purpose</th>
                            <th>OR Number</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
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

                        // Read all rows from database table
                        $sql = "SELECT c.clearanceNO, r.lname, r.fname, c.purpose, c.orNo, c.id FROM clearance1 c
                            JOIN residents r ON c.residentid = r.id";
                        $result = $connection->query($sql); // Execute the query and store the result

                        if (!$result) {
                            die("Invalid Query: " . $connection->error);
                        }

                        // Read data from each row
                        while ($row = $result->fetch_assoc()) {
                            $residentName = $row['fname'] . ' ' . $row['lname'];
                            echo "
                            <tr>
                                <td>{$row['clearanceNO']}</td>
                                <td>{$residentName}</td>
                                <td>{$row['purpose']}</td>
                                <td>{$row['orNo']}</td>
                                <td>
                                <a class='btn btn-primary btn-sm' href='/mis/certificates/generate_certificate.php?resident_id={$row['id']}'>Generate</a>
                                </td>
                            </tr>
                            ";
                        }

                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
            <script>
                document.getElementById("showModal").addEventListener("click", function() {
                    var firstModal = document.getElementById("pop-up-modal");
                    firstModal.style.display = "block";
                });


                document.getElementById("close-modal").addEventListener("click", function() {
                    var firstModal = document.getElementById("pop-up-modal");
                    firstModal.style.display = "none";
                });
            </script>

</body>

</html>