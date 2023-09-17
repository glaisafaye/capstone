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
    // Check if the POST data exists before accessing it
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
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Puntian Management Information System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
<?php
    include 'layout.php';
        ?>
<div id="pop-up-modal" class="modal">
        <div class="modal-content">
        <h1>Select a Document Request</h1>
            <form method="post" action="">
                <select name="document_type" id="document_type">
                    <option value="barangay_certificate">Barangay Clearance</option>
                    <option value="business_clearance">Business Clearance</option>
                    <option value="barangay_indigency">Barangay Indigency</option>
                </select>
                <button type="button" class="btn btn-secondary" id="close-modal">&times; Close</button>
                <button type="button" class="btn btn-primary" id="nextButton">Next</button>
            </form>
        </div>
    </div>

    <div id="second-pop-up-modal" class="modal">
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
                            echo '<option value="' . $row['id'] . '">' .$row['lname'].' , ' .$row['fname'] . '</option>';
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
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/mis/certificates/certificates.php" role="button">Cancel</a>
                </div>
                <button type="submit" class="btn btn-primary" id="submitDocumentRequest">Submit Request</button>
            </form>
        </div>
    </div>

    

    <div class="main">
        <div class="content">
            <div class="container my-5">
                <div class="d-flex justify-content-center mb-3">
                    <button type="button" class="btn btn-primary" id="showModal">Add Certificate</button>
                </div>
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
                $servername ="localhost";
                $username ="root";
                $password ="";
                $database ="mis";

                // Create connection
                $connection = new mysqli($servername, $username, $password, $database);

                // Check connection
                if ($connection ->connect_error) {
                    die ("Connection Failed: " . $connection ->connect_error);
                } 

                // Read all rows from database table
                $sql = "SELECT * FROM clearance";
                $result = $connection->query($sql);

                if (!$result) {
                die("Invalid Query: " . $connection->error);
                }

                // Read data from each row
                while ($row = $result->fetch_assoc()) {
                echo "
                <tr>
                    <td>{$row['clearanceNO']}</td>
                    <td>{$row['ddl_resident']}</td>
                    <td>{$row['purpose']}</td>
                    <td>{$row['orNo']}</td>
                    <td>
                    <a class='btn btn-primary btn-sm' href='/mis/certificates/brgyin.php'>Generate</a> 
                    </td>
                </tr>
                ";
                }  
               ?>                
            </tbody> 
        </table>           
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Show the first modal
        document.getElementById("showModal").addEventListener("click", function () {
            var firstModal = document.getElementById("pop-up-modal");
            firstModal.style.display = "block"; // Show the first modal
        });

        // Close the first modal when the close button is clicked
        document.getElementById("close-modal").addEventListener("click", function () {
            var firstModal = document.getElementById("pop-up-modal");
            firstModal.style.display = "none"; // Hide the first modal
        });

        // Show the second modal when the "Next" button is clicked on the first modal
        document.getElementById("nextButton").addEventListener("click", function () {
            var selectedDocumentType = document.getElementById("document_type").value;
            document.getElementById("selected_document_type").value = selectedDocumentType;

            var firstModal = document.getElementById("pop-up-modal");
            firstModal.style.display = "none"; // Hide the first modal

            var secondModal = document.getElementById("second-pop-up-modal");
            secondModal.style.display = "block"; // Show the second modal
        });

        // Close the second modal when the close button is clicked
        document.getElementById("close-second-modal").addEventListener("click", function () {
            var secondModal = document.getElementById("second-pop-up-modal");
            secondModal.style.display = "none"; // Hide the second modal
        });
    </script>

</body>

</html>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>