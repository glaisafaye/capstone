<?php include '../includes/layout.php'; ?>

<div class="modal fade" id="insertdata" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="insertdataLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="insertdataLabel">Enter Clearance Information</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="code.php" method="POST">
                <div class="modal-body">
                    <input type="hidden" id="selected_document_type" name="selected_document_type">
                    <div class="form-group mb-3">
                        <label class="control-label">Clearance Number :</label>
                        <input type="number" class="form-control" name="clearanceNO" placeholder="Enter Clearance Number">
                    </div>            
                    <div class="form-group mb-3">
                        <label class="control-label">Resident Name:</label>
                        <select id="ddl_resident" name="ddl_resident" class="form-control">
                            <option value="" selected disabled>-- Select Resident --</option>
                            <?php
                            $connection = new mysqli('localhost', 'root', '', 'mis');

                            if ($connection->connect_error) {
                                die("Connection failed: " . $connection->connect_error);
                            }

                            $sql = "SELECT id, lname, fname, mname FROM residents";
                            $result = $connection->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<option value="' . $row['id'] . '">' . $row['lname'] . ', ' . $row['fname'] .  $row['mname'] .'</option>';
                                }
                            }
                            $connection->close();
                            ?>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label class="control-label">Purpose:</label>
                        <input type="text" class="form-control" name="purpose" placeholder="Enter Purpose">
                    </div>
                    <div class="form-group mb-3">
                        <label class="control-label">OR Number:</label>
                        <input type="number" class="form-control" name="orNo" placeholder="Enter OR Number">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="save_data" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <?php
            if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
            ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Hey!</strong> <?php echo $_SESSION['status']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
                unset($_SESSION['status']);
            }
            ?>
            <div class="container my-5">
                <div class="text-center mb-5">
                    <div class="col-md-7 mx-auto">
                        <div class="card">
                            <div class="card-header" style="margin-bottom: 10px; margin-top: 10px;">
                                <a class="btn btn-outline-info mr-2" href="/mis/brgyclearance/brgyclearance.php" role="button">Barangay Clearance</a>
                                <a class="btn btn-outline-info mr-2" href="/mis/brgyindigency/brgyindigency.php" role="button">Barangay Indigency</a>
                                <a class="btn btn-outline-info mr-2" href="/mis/busclearance/busclearance.php" role="button">Business Clearance</a>
                                <h4 class="text-center"></h4>
                                <button type="button" style="margin-bottom: 10px; margin-top: 10px;" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#insertdata">
                                    Add Certificate
                                </button>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-bordered table-success" style="margin-bottom: 20px; margin-top: 20px;" id="myTable">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID#</th>
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

                                        $connection = new mysqli($servername, $username, $password, $database);

                                        if ($connection->connect_error) {
                                            die("Connection Failed: " . $connection->connect_error);
                                        }

                                        $sql = "SELECT c.clearanceNO, r.lname, r.fname, c.purpose, c.orNo, c.id FROM brgyclearance c
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
                                                    <a class=\"btn btn-outline-primary btn-sm\" href=\"javascript:void(0);\" onclick=\"openAssistanceList()\" role=\"button\">Generate</a>
                                                </td>
                                            </tr>";
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

<div id="barclearContent"></div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    /* search data */
    $(document).ready(function() {
        $("#searchBox").on("keyup", function() {
        var query = $(this).val().toLowerCase();

        $("table tbody tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(query) > -1);
        });
        });
    });
    /* search data */

    /*pagination*/
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
    /*pagination*/

    /* generate */
    function openAssistanceList() {
        var url = 'generate_clearance.php';
        var popupWindow = window.open(url, 'GenerateClearancePopup', 'width=800,height=600');
        if (window.focus) {
            popupWindow.focus();
        }
    }
    /* generate */
</script>