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
            <h4>Enter Clearance Information</h4>
            <form method="post" action="">
                <input type="hidden" id="selected_document_type" name="selected_document_type">
                <div class="row">
                    <input type="text" class="form-control" id="clearanceNO" name="clearanceNO" placeholder="Clearance No." value="<?php echo $clearanceNo; ?>">
                </div>
                <div class="row">
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
                    <input type="text" class="form-control" id="purpose" name="purpose" placeholder="Purpose" value="<?php echo $purpose; ?>">
                </div>
                <div class="row">
                    <input type="text" class="form-control" id="orNo" name="orNo" placeholder="OR Number" <?php echo $orNo; ?>">
                </div>

                <div class="btn-container">
                    <a class="btn btn-outline-primary" href="/mis/certificates/brgyindigency.php" role="button">Cancel</a>
                    <button type="submit" class="btn btn-primary" id="submitDocumentRequest">Submit Request</button>
                </div>

            </form>
        </div>
    </div>



    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="container my-20">
                    <div class="d-flex justify-content-center mb-3">
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header">
                                    <div class="btn-group">
                                        <a class="btn btn-outline-info" href="/mis/certificates/brgyclearance.php" role="button">Barangay Clearance</a>
                                    </div>
                                        <a class="btn btn-outline-info" href="/mis/certificates/brgyindigency.php" role="button">Barangay Indigency</a>
                                    </div>
                                    <div>
                                    <br>
                                    <div class="d-flex justify-content-center">
                                        <button type="button" class="btn btn-outline-secondary" id="showModal">Add Certificate</button>
                                    </div>                                    
                                    <br>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-striped table-bordered table-success" id="myTable">
                                            <thead>
                                                <tr>
                                                    <th scope="col">ID#</th>
                                                    <th scope="col">Clearance #</th>
                                                    <th scope="col">Resident Name</th>
                                                    <th scope="col">Purpose</th>
                                                    <th scope="col">OR Number</th>
                                                    <th style="width: 130px !important;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $servername = "localhost";
                                                $username = "root";
                                                $password = "";
                                                $database = "mis";

                                                $connection = new mysqli($servername, $username, $password, $database);

                                                if ($connection->connect_error) {
                                                    die("Connection Failed: " . $connection->connect_error);
                                                }

                                                $sql = "SELECT c.clearanceNO, r.lname, r.fname, c.purpose, c.orNo, c.id FROM clearance c
                                                JOIN residents r ON c.residentid = r.id";
                                                $result = $connection->query($sql);

                                                if (!$result) {
                                                    die("Invalid Query: " . $connection->error);
                                                }

                                                while ($row = $result->fetch_assoc()) {
                                                    $residentName = $row['fname'] . ' ' . $row['lname'];
                                                    echo "
                                                        <tr>
                                                            <td>{$row['id']}</td>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        /* show modal */
        document.getElementById("showModal").addEventListener("click", function() {
            var firstModal = document.getElementById("pop-up-modal");
            firstModal.style.display = "block";
        });

        document.getElementById("close-modal").addEventListener("click", function() {
            var firstModal = document.getElementById("pop-up-modal");
            firstModal.style.display = "none";
        });
        /* show modal */

    </script>

</body>

</html>