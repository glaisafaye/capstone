<?php include '../includes/layout.php'; ?>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="container my-5">
                    <div class="text-center mb-5">
                        <div class="col-md-9 mx-auto">
                            <div class="card">
                                <div class="card-header">
                                    <div class="btn-group">
                                        <a class="btn btn-outline-info mr-2" href="/mis/reports/reports.php" role="button">Certificate Report</a>
                                        <a class="btn btn-outline-info mr-2" href="/mis/reports/reports1.php" role="button">Assistance</a>
                                    </div>

                                    <div id="certificateReport">
                                        <?php
                                            $servername = "localhost";
                                            $username = "root";
                                            $password = "";
                                            $database = "mis";

                                            $connection = new mysqli($servername, $username, $password, $database);

                                            if ($connection->connect_error) {
                                                die("Connection Failed: " . $connection->connect_error);
                                            }

                                            $sql1 = "SELECT YEAR(issue_date) AS year, MONTH(issue_date) AS month, COUNT(*) AS count
                                                    FROM brgyindigency
                                                    GROUP BY YEAR(issue_date), MONTH(issue_date)
                                                    ORDER BY year, month";

                                            $result1 = $connection->query($sql1);

                                            $sql2 = "SELECT YEAR(issue_date) AS year, MONTH(issue_date) AS month, COUNT(*) AS count
                                                    FROM brgyclearance
                                                    GROUP BY YEAR(issue_date), MONTH(issue_date)
                                                    ORDER BY year, month";

                                            $sql3 = "SELECT YEAR(issue_date) AS year, MONTH(issue_date) AS month, COUNT(*) AS count
                                            FROM busclearance
                                            GROUP BY YEAR(issue_date), MONTH(issue_date)
                                            ORDER BY year, month";

                                            $result2 = $connection->query($sql2);
                                            $result3 = $connection->query($sql3);

                                            $data1 = array();
                                            while ($row1 = $result1->fetch_assoc()) {
                                                $data1[] = $row1;
                                            }

                                            $data2 = array();
                                            while ($row2 = $result2->fetch_assoc()) {
                                                $data2[] = $row2;
                                            }

                                            $data3 = array();
                                            while ($row3 = $result3->fetch_assoc()) {
                                                $data3[] = $row3;
                                            }

                                            $connection->close();

                                            $csvData = "Republic of the Philippines,,,\n";
                                            $csvData .= "PROVINCE OF BUKIDNON,,,\n";
                                            $csvData .= "Municipality of Sumilao,,,\n";
                                            $csvData .= "Barangay Puntian,,,\n";
                                            $csvData .= "-o0o-,,,\n";
                                            $csvData .= "OFFICE OF THE PUNONG BARANGAY,,,\n\n";
                                            
                                            $csvData .= "Year,Month,Total Barangay Indigency,Total Barangay Clearance, Total Business Clearance, Total Certificates Issued\n";
                                            foreach ($data1 as $row1) {
                                                $year = $row1['year'];
                                                $month = date("F", mktime(0, 0, 0, $row1['month'], 1));
                                                $count1 = $row1['count'];
                                            

                                                $count2 = 0;
                                                foreach ($data2 as $row2) {
                                                    if ($row2['year'] == $year && $row2['month'] == $row1['month']) {
                                                        $count2 = $row2['count'];
                                                        break;
                                                    }
                                                }

                                                $count3 = 0;
                                                foreach ($data3 as $row3) {
                                                    if ($row3['year'] == $year && $row3['month'] == $row1['month']) {
                                                        $count3 = $row3['count'];
                                                        break;
                                                    }
                                                }
                                            
                                                $csvData .= "$year,$month,$count1,$count2,$count3," . ($count1 + $count2 + $count3) . "\n";
                                            }
                                            ?>

                                        <h2 style="font-size: 24px; margin-bottom: 20px; margin-top: 30px;">Certificate Issuance Report</h2>

                                        <div class="card-body">
                                        <table class="table table-striped table-bordered table-success" id="myTable">                                            <thead>
                                                <tr>
                                                    <th style="width: 70px !important;">Year</th>
                                                    <th style="width: 70px !important;">Month</th>
                                                    <th style="width: 70px !important;">Total Barangay Indigency</th>
                                                    <th style="width: 70px !important;">Total Barangay Clearance</th>
                                                    <th style="width: 70px !important;">Total Business Clearance</th>
                                                    <th style="width: 80px !important;">Total Certificates Issued</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    foreach ($data1 as $row1) {
                                                        $year = $row1['year'];
                                                        $month = date("F", mktime(0, 0, 0, $row1['month'], 1));
                                                        $count1 = $row1['count'];

                                                        $count2 = 0;
                                                        foreach ($data2 as $row2) {
                                                            if ($row2['year'] == $year && $row2['month'] == $row1['month']) {
                                                                $count2 = $row2['count'];
                                                                break;
                                                            }
                                                        }

                                                        $count3 = 0;
                                                        foreach ($data3 as $row3) {
                                                            if ($row3['year'] == $year && $row3['month'] == $row3['month']) {
                                                                $count3 = $row3['count'];
                                                                break;
                                                            }
                                                        }

                                                        echo '<tr>';
                                                        echo '<td>' . $year . '</td>';
                                                        echo '<td>' . $month . '</td>';
                                                        echo '<td>' . $count1 . '</td>';
                                                        echo '<td>' . $count2 . '</td>';
                                                        echo '<td>' . $count3 . '</td>';
                                                        echo '<td>' . ($count1 + $count2 + $count3) . '</td>'; 
                                                        echo '</tr>';
                                                    }
                                                ?>
                                            </tbody>
                                        </table>

                                        <a id="downloadCSVButton" href="#" style="margin-top: 20px;">Download CSV</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    
    <script>
        document.getElementById('downloadCSVButton').addEventListener('click', function () {
            var blob = new Blob([<?= json_encode($csvData) ?>], { type: 'text/csv' });

            var a = document.createElement('a');
            a.href = window.URL.createObjectURL(blob);
            a.download = 'certificate_report.csv';

            a.click();

            window.URL.revokeObjectURL(a.href);
        });

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
    </script>
</body>

</html>
