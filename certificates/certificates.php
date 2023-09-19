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
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Puntian Management Information System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        font-family: 'poppins', sans-serif;
    }
    
    .sidebar {
        position: fixed;
        top: 60px;
        width: 260px;
        height: calc(100% - 60px);
        background: #299b63;
        overflow-x: hidden;
    }

    .sidebar ul {
        margin-top: 20px;
    }

    .sidebar ul li {
        width: 100%;
        list-style: none;
    }

    .sidebar ul li a {
        width: 100%;
        text-decoration: none;
        color: #fff;
        height: 60px;
        display: flex;
        align-items: center;
    }

    .sidebar ul li i {
        min-width: 60px;
        font-size: 24px;
        text-align: center;
    }

    .container{
        display: flex;
        flex-direction: column;
    }
    .user {
        position: relative;
        width: 50px;
        height: 50px;
    }

    .user img {
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        object-fit: cover;
    }

    .main {
        position: absolute;
        top: 60px;
        width: calc(100% - 260px);
        left: 260px;
        min-height: calc(100vh - 60px);
        background: #f5f5f5;
        position: relative;
        z-index: 1;
    }

    .cards {
        width: 100%;
        padding: 35px 20px;
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        grid-gap: 20px;
    }

    .cards .card {
        padding: 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 7px 25px 0 rgba(0, 0, 0, 0.08);
    }

    .number {
        font-size: 35px;
        font-weight: 500;
        color: #299b63;
    }

    .card-name {
        color: #888;
        font-weight: 600;
    }

    .icon-box i {
        font-size: 45px;
        color: #299b63;
    }

    .content {
    padding: 20px;
    }

.btn-primary {
    background-color: #299b63;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    text-decoration: none;
    font-size: 16px;
    cursor: pointer;
}

.btn-primary:hover {
    background-color: #247b4d;
}

.table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    background-color: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.08);
}

.table th, .table td {
    padding: 10px 15px;
    text-align: left;
    border-bottom: 1px solid #e0e0e0;
}

.table th {
    background-color: #f5f5f5;
}

.table tbody tr:hover {
    background-color: #f5f5f5;
}

    .content-table{
        border-collapse: collapse;
        margin: 25px 0;
        font-size: 16px;
        min-width: 400px;
    }

.content-table thead tr {
    background-color: #eeeee4;
    color: #24ad50;
    text-align: left;
}

.content-table th,
.content-table td{
    padding: 12px 15px;
}
#pop-up-modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 1000;
}

.modal-content {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
    padding: 20px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    max-width: 400px;
}

.close-button {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 24px;
    cursor: pointer;
    color: #888;
}

.form-control {
    margin: 10px 0;
    padding: 10px;
    width: 100%;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.btn {
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.btn-primary {
    background-color: #007bff;
    color: #fff;
}

.btn-secondary {
    background-color: #ccc;
    color: #fff;
}

.main {
    padding: 20px;
}

.content-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.content-table th, .content-table td {
    border: 1px solid #ddd;
    padding: 10px;
    text-align: left;
}

.content-table th {
    background-color: #f2f2f2;
}

.navbar {
    background-color: #299b63; 
    font-family: 'poppins', sans-serif; 
    font-size: 18px; 
    border-radius: 0; 
}

.navbar-brand {
    color: #fff; 
    font-weight: bold; 
    font-size: 24px; 
}

.form-control {
    border-radius: 5px;
    font-family: 'poppins', sans-serif;
    font-size: 16px; 
}

.btn-outline-success {
    background-color: #299b63; 
    color: #fff; 
    border-color: #299b63; 
}

.btn-outline-success:hover {
    background-color: #247b4d; 
}

</style>
</head>

<body>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand">Puntian, Sumilao</a>
                
        </div>
    </nav>
    
    <div class="sidebar">
    <ul>
        <?php
  
        $menuItems = array(
            array("Dashboard", "fas fa-th-large", "/mis/dashboard/dashboard.php"),
            array("Officials", "fas fa-user-tie", "/mis/officials/officials.php"),
            array("Household Profiling", "fas fa-house-user", "/mis/household/household.php"),
            array("Resident Profiling", "fas fa-users", "/mis/residents/residents.php"),
            array("Certification", "fas fa-print", "/mis/certificates/certificates.php"),
            array("Decision Support System", "fas fa-chart-bar", "/mis/dss/dss.php"),
        );


        foreach ($menuItems as $item) {
            echo '<li>';
            echo '<a href="' . $item[2] . '">';
            echo '<i class="' . $item[1] . '"></i>';
            echo '<div>' . $item[0] . '</div>';
            echo '</a>';
            echo '</li>';
        }
        ?>
    </ul>
</div>

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
</div>

    

    <div class="main">
        <div class="content">
        <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            <div class="container my-5">
                <div class="d-flex justify-content-center mb-3">
                    
                    <button type="button" class="btn btn-primary" id="showModal">Add Certificate</button>
                </div>
                <br>
                <table class="content-table">
                <thead>
                    <tr>
                        <th>Clearance #</th>
                        <th>Type of Certificate</th>
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

                $connection = new mysqli($servername, $username, $password, $database);

                if ($connection ->connect_error) {
                    die ("Connection Failed: " . $connection ->connect_error);
                } 

                $sql = "SELECT c.clearanceNO, c.certificate, r.lname, r.fname, c.purpose, c.orNo, c.id FROM clearance c
                JOIN residents r ON c.residentid = r.id";
                $result = $connection->query($sql);


                if (!$result) {
                die("Invalid Query: " . $connection->error);
                }

             
                while ($row = $result->fetch_assoc()) {
                    $residentName = $row['fname'] . ' ' . $row['lname'];
                    echo "
                    <tr>
                        <td>{$row['clearanceNO']}</td>
                        <td>{$row['certificate']}</td> <!-- Display the certificate type -->
                        <td>{$residentName}</td>
                        <td>{$row['purpose']}</td>
                        <td>{$row['orNo']}</td>
                        <td>
                        <a class='btn btn-primary btn-sm' href='/mis/certificates/generate_certificate.php?resident_id={$row['id']}'>Generate</a>
                        <a class='btn btn-danger btn-sm' href='/mis/certificates/delete.php?id={$row['id']}'>Delete</a>
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
       
        document.getElementById("showModal").addEventListener("click", function () {
            var firstModal = document.getElementById("pop-up-modal");
            firstModal.style.display = "block"; 
        });

       
        document.getElementById("close-modal").addEventListener("click", function () {
            var firstModal = document.getElementById("pop-up-modal");
            firstModal.style.display = "none"; 
        });

      
        document.getElementById("nextButton").addEventListener("click", function () {
            var selectedDocumentType = document.getElementById("document_type").value;
            document.getElementById("selected_document_type").value = selectedDocumentType;

            var firstModal = document.getElementById("pop-up-modal");
            firstModal.style.display = "none"; 

            var secondModal = document.getElementById("second-pop-up-modal");
            secondModal.style.display = "block"; 
        });

        
        document.getElementById("close-second-modal").addEventListener("click", function () {
            var secondModal = document.getElementById("second-pop-up-modal");
            secondModal.style.display = "none"; 
        });
    </script>

</body>

</html>
</body>
</html>