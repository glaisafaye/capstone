<?php

$servername ="localhost";
$username ="root";
$password ="";
$database ="mis";

$connection = new mysqli($servername, $username, $password, $database);

    $household_number = "";
    $zone = "";
    $total_members = "";
    $head_of_the_family = ""; 
    $household_income = "";
    $sanitary_toilet = "";
    $water_usage = "";
    $house_ownership_status = "";
    $land_ownership_status = "";

    $errorMessage = "";
    $successMessage = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $household_number = $_POST["household_number"];
        $zone = $_POST["zone"];
        $total_members = $_POST["total_members"];
        $head_of_the_family = $_POST["head_of_the_family"];
        $household_income = $_POST["household_income"];
        $sanitary_toilet = $_POST["sanitary_toilet"];
        $water_usage = $_POST["water_usage"];
        $house_ownership_status = $_POST["house_ownership_status"];
        $land_ownership_status = $_POST["land_ownership_status"];

    }
        if (empty($household_number) || empty($zone) || empty($total_members) || empty($head_of_the_family) || empty($sanitary_toilet) || empty($water_usage) || empty($house_ownership_status) || empty($land_ownership_status)) {
            $errorMessage = "All fields are required";
        } else {
            
            $sql = "INSERT INTO household(`household_number`, `zone`, `total_members`, `head_of_the_family`, `household_income`, `sanitary_toilet`, `water_usage`, `house_ownership_status`, `land_ownership_status`) VALUES ('$household_number', '$zone', '$total_members', '$head_of_the_family', '$household_income', '$sanitary_toilet', '$water_usage', '$house_ownership_status', '$land_ownership_status')";
            $result = $connection->query($sql);

            if (!$result) {
                $errorMessage = "Invalid query" . $connection->error;
            } else {
                $household_number = "";
                $zone = "";
                $total_members = "";
                $head_of_the_family = ""; 
                $household_income = "";
                $sanitary_toilet = "";
                $water_usage = "";
                $house_ownership_status = "";
                $land_ownership_status = "";

            $successMessage = "Household added correctly";

            header("location: /mis/household/household.php");
            exit;
        }
        
    } 
?> 

<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body>
    <?php include 'layout.php'; ?>

<div id="pop-up-modal" class="modal">
    <div class="modal-content">
        <h3>Enter Household Information</h3>
        <form method="post">
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label class="form-label">Household Number</label>
                        <input type="text" class="form-control" name="household_number" value="<?php echo $household_number; ?>">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label class="form-label">Zone</label>
                        <select class="form-select" name="zone">
                            <option value="Zone 1">Zone 1</option>
                            <option value="Zone 2">Zone 2</option>
                            <option value="Zone 3">Zone 3</option>
                            <option value="Zone 4">Zone 4</option>
                            <option value="Zone 5">Zone 5</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label class="form-label">Total Members</label>
                        <input type="text" class="form-control" name="total_members" value="<?php echo $total_members; ?>">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label class="form-label">Head of the Family</label>
                        <input type="text" class="form-control" name="head_of_the_family" value="<?php echo $head_of_the_family; ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label class="form-label">Household Income</label>
                        <input type="text" class="form-control" name="household_income" value="<?php echo $household_income; ?>">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label class="form-label">Sanitary Toilet</label>
                        <select class="form-select" name="sanitary_toilet">
                            <option value="Water-sealed">Water-sealed</option>
                            <option value="Antipolo">Antipolo</option>
                            <option value="None">None</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label class="form-label">Water Usage</label>
                        <select class="form-select" name="water_usage">
                            <option value="Faucet">Faucet</option>
                            <option value="Deep Well">Deep Well</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label class="form-label">House Ownership Status</label>
                        <select class="form-select" name="house_ownership_status">
                            <option value="Owned">Owned</option>
                            <option value="Rent">Rent</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label class="form-label">Land Ownership Status</label>
                        <select class="form-select" name="land_ownership_status">
                            <option value="Owned">Owned</option>
                            <option value="Landless">Landless</option>
                            <option value="Tenant">Tenant</option>
                            <option value="Care Taker">Care Taker</option>
                        </select>
                    </div>
                </div>
            </div>
        </form>
        <div class="row mb-3">
                        <div class="offset-sm-3 col-sm-3 d-grid">
                            <button type="submit" class="btn btn-primary">Submit</button>
                         </div>
                        <div class="col-sm-3 d-grid">
                            <a class="btn btn-outline-primary" href="/mis/household/household.php" role="button">Cancel</a>
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
                        <button type="button" class="btn btn-primary" id="showModal">Add Household</button>
                    </div>
                    <br>
                        <table class="content-table">
                            <thead>
                            <tr>
                                <th>Household Number</th>
                                <th>Zone</th>
                                <th>Total Members</th>
                                <th>Head of the Family</th>
                                <th>Action</th>  
             
                            </tr>
                            </thead>
                        <tbody>
                </div>

                <?php
                $servername ="localhost";
                $username ="root";
                $password ="";
                $database ="mis";

                $connection = new mysqli($servername, $username, $password, $database);

                if ($connection ->connect_error) {
                    die ("Connection Failed: " . $connection ->connect_error);
                } 

                $sql_total_records = "SELECT COUNT(*) AS total FROM household";
                $result_total_records = $connection->query($sql_total_records);
                $row_total_records = $result_total_records->fetch_assoc();
                $total_records = $row_total_records['total'];

                $recordsPerPage = 10;
                $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

                $total_pages = ceil($total_records / $recordsPerPage);

                $offset = ($current_page - 1) * $recordsPerPage;

                $sql = "SELECT * FROM household LIMIT $offset, $recordsPerPage";

                $result = $connection->query($sql);

                if ($result) {
                    while ($row = $result->fetch_assoc()) {

                echo "
                <tr>
                    <td>{$row['household_number']}</td>
                    <td>{$row['zone']}</td>
                    <td>{$row['total_members']}</td>
                    <td>{$row['head_of_the_family']}</td>
                    <td>
                    <a class='btn btn-primary btn-sm' href='/mis/household/edit.php?id={$row['id']}'>Edit</a>                        
                    <a class='btn btn-danger btn-sm' href='/mis/household/delete.php?id={$row['id']}'>Delete</a>
                    </td>
                </tr>
                ";
                }  
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