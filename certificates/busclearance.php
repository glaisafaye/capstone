<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "mis";

// Create connection
$connection = new mysqli($servername, $username, $password, $database);

$clearanceNo = "";
$ddl_resident = "";
$types = "";
$orNo = "";
$amount = "";
$description = "";
$validDate = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST["clearanceNO"])) {
        $clearanceNo = $_POST["clearanceNO"];
    }
    if (isset($_POST["ddl_resident"])) {
      $residentid = $_POST["ddl_resident"];
    }
    if (isset($_POST["types"])) {
      $types = $_POST["types"];
    }
    if (isset($_POST["orNo"])) {
        $orNo = $_POST["orNo"];
    }
    if (isset($_POST["amount"])) {
        $amount = $_POST["amount"];
    }
    if (isset($_POST["description"])) {
        $description = $_POST["description"];
    }
    if (isset($_POST["validDate"])) {
        $validDate = $_POST["validDate"];
    }
    

    if (empty($clearanceNo) || empty($residentid) || empty($types) || empty($orNo) || empty($amount) || empty($description) || empty($validDate)) {
        $errorMessage = "All fields are required";
    } else {

        $sql = "INSERT INTO busclearance (`clearanceNO`, `residentid`, `types`, `orNo`, `amount`, `description`, `validDate`) VALUES ('$clearanceNo', '$residentid', '$types', '$orNo', '$amount', '$description', '$validDate')";
        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query" . $connection->error;
        } else {
            $clearanceNo = "";
            $ddl_resident = "";
            $type = "";
            $orNo = "";
            $amount = "";
            $description = "";
            $validDate = "";

            $successMessage = "Certificate added correctly";

            header("location: /mis/certificates/busclearance.php");
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
                    <input type="text" class="form-control" id="types" name="types" placeholder="Type of Business Clearance" value="<?php echo $types; ?>">
                </div>
                <div class="row">
                    <input type="text" class="form-control" id="orNo" name="orNo" placeholder="OR Number" value="<?php echo $orNo; ?>">
                </div>
                <div class="row">
                    <input type="number" class="form-control" id="amount" name="amount" placeholder="Amount Paid" value="<?php echo $amount; ?>">
                </div>
                <div class="row">
                    <input type="text" class="form-control" id="description" name="description" placeholder="Description" value="<?php echo $description; ?>">
                </div>
                <div class="row">
                  <label class="control-label">Validity Date:</label>
                  <input name="validDate" class="form-control input-sm input-size" type="date" />
                </div>

                <div class="btn-container">
                    <a class="btn btn-outline-primary" href="/mis/certificates/busclearance.php" role="button">Cancel</a>
                    <button type="submit" class="btn btn-primary" id="submitDocumentRequest">Submit Request</button>
                </div>

            </form>
        </div>
    </div>

    
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="container my-19">
                    <div class="d-flex justify-content-center mb-3">
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header">
                                    <div class="btn-group">
                                        <a class="btn btn-outline-info" href="/mis/certificates/brgyclearance.php" role="button">Barangay Clearance</a>
                                        <a class="btn btn-outline-info" href="/mis/certificates/brgyindigency.php" role="button">Barangay Indigency</a>
                                        <a class="btn btn-outline-info" href="/mis/certificates/busclearance.php" role="button">Business Clearance</a>
                                    </div>
                                  
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
                                                    <th>Clearance #</th>
                                                    <th>Resident Name</th>
                                                    <th>Type</th>
                                                    <th>OR Number</th>
                                                    <th>Amount Paid</th>
                                                    <th>Business Description</th>
                                                    <th>Validity Date</th>
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
                                                $sql = "SELECT c.clearanceNO, r.lname, r.fname, c.types, c.orNo, c.amount, c.description, c.validDate, c.id FROM busclearance c
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
                                                                <td>{$types}</td>
                                                                <td>{$row['orNo']}</td>
                                                                <td>{$row['amount']}</td>
                                                                <td>{$row['description']}</td>
                                                                <td>{$row['validDate']}</td>
                                                                <td>
                                                                    <a class='btn btn-primary btn-sm' href='/mis/certificates/generate_business.php?resident_id={$row['id']}'>Generate</a>
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
        document.addEventListener("DOMContentLoaded", function() {
    // Your code here, including the event listener
    document.getElementById("showModal").addEventListener("click", function() {
        var firstModal = document.getElementById("pop-up-modal");
        firstModal.style.display = "block";
        });
    });

    document.getElementById("close-modal").addEventListener("click", function() {
    var firstModal = document.getElementById("pop-up-modal");
    firstModal.style.display = "none";
});

    </script>

</body>

</html>