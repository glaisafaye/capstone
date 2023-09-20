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

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $position = $_POST["position"];
        $name = $_POST["name"];
        $contact_number = $_POST["contact_number"];
        $start_term = $_POST["start_term"];
        $end_term = $_POST["end_term"];


    }
    if (empty($name) || empty($contact_number) || empty($start_term) || empty($end_term)) {
        $errorMessage = "All fields are required";
    } else {
        // ...
        
            
            // add new official to the database 
            $sql = "INSERT INTO officials (`position`, `name`, `contact_number`, `start_term`, `end_term` ) VALUES ('$position', '$name', '$contact_number', '$start_term', '$end_term')";
            $result = $connection->query($sql);

            if (!$result) {
                $errorMessage = "Invalid query" . $connection->error;
            } else {
                $position = "";
                $name = "";
                $contact_number = "";
                $start_term = "";
                $end_term = "";
          

            $successMessage = "Official added correctly";

            header("location: /mis/officials/officials.php");
            exit;
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
                <h3>Enter Official Information</h3>
                    <form method="post">
                        <div class="row mb-4">
                            <label class="form-label">Position:</label>
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
                            <label class="col-sm-3 col-form-label">Name:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
                                </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Contact Number:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="contact_number" value="<?php echo $contact_number; ?>">
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
                    </form>
                    <div class="row mb-3">
                        <div class="offset-sm-3 col-sm-3 d-grid">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    <div class="col-sm-3 d-grid">
                        <a class="btn btn-outline-primary" href="/mis/officials/officials.php" role="button">Cancel</a>
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
                        <button type="button" class="btn btn-primary" id="showModal">Add Official</button>
                    </div>
                    <br>
                        <table class="content-table">
                            <thead>
                            <tr>
                                <th>Position</th>
                                <th>Name</th>
                                <th>Contact Number</th>
                                <th>Start Term</th>
                                <th>End Term</th>
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
                $sql = "SELECT * FROM officials";
                $result = $connection->query($sql);

                if (!$result) {
                die("Invalid Query: " . $connection->error);
                }

                // Read data from each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$row['position']}</td>";
                    echo "<td>{$row['name']}</td>";
                    echo "<td>{$row['contact_number']}</td>";
                    echo "<td>{$row['start_term']}</td>";
                    echo "<td>{$row['end_term']}</td>";
                    echo "<td>";
                    echo "<a class='btn btn-primary btn-sm' href='/mis/officials/edit.php?id={$row['id']}'>Edit</a>";
                    echo "<a class='btn btn-danger btn-sm' href='javascript:void(0);' onclick='confirmEndTerm({$row['id']})'>End Term</a>";
                    echo "</td>";

                    
                    echo "</tr>";
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
        </script>

</body>
</html>