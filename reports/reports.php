<?php include 'layout.php' ?>
<div class="main">
        <div class="btn-group">
            <a class="btn btn-secondary btn-sm" href="/mis/reports/reports.php" role="button">Certificate Report</a>
            <a class="btn btn-secondary btn-sm" href="/mis/reports/reports1.php" role="button">Assistance</a>
        </div>

        <div id="certificateReport">
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

                $sql1 = "SELECT YEAR(issue_date) AS year, MONTH(issue_date) AS month, COUNT(*) AS count
                        FROM clearance1
                        GROUP BY YEAR(issue_date), MONTH(issue_date)
                        ORDER BY year, month";

                $result1 = $connection->query($sql1);

                // SQL query to count certificates issued by month and year for clearance table
                $sql2 = "SELECT YEAR(issue_date) AS year, MONTH(issue_date) AS month, COUNT(*) AS count
                        FROM clearance
                        GROUP BY YEAR(issue_date), MONTH(issue_date)
                        ORDER BY year, month";

                $result2 = $connection->query($sql2);

                // Fetch data from $result1 into an array
                $data1 = array();
                while ($row1 = $result1->fetch_assoc()) {
                    $data1[] = $row1;
                }

                // Fetch data from $result2 into an array
                $data2 = array();
                while ($row2 = $result2->fetch_assoc()) {
                    $data2[] = $row2;
                }

                // Close the database connection
                $connection->close();

                // Generate CSV data by combining data from both arrays
                $csvData = "Republic of the Philippines,,,\n";
                $csvData .= "PROVINCE OF BUKIDNON,,,\n";
                $csvData .= "Municipality of Sumilao,,,\n";
                $csvData .= "Barangay Puntian,,,\n";
                $csvData .= "-o0o-,,,\n";
                $csvData .= "OFFICE OF THE PUNONG BARANGAY,,,\n\n";
                
                $csvData .= "Year,Month,Total Barangay Clearance,Total Barangay Indigency,Total Certificates Issued\n";
                foreach ($data1 as $row1) {
                    $year = $row1['year'];
                    $month = date("F", mktime(0, 0, 0, $row1['month'], 1));
                    $count1 = $row1['count'];
                
                    // Find the count from the $data2 array for the same month and year
                    $count2 = 0;
                    foreach ($data2 as $row2) {
                        if ($row2['year'] == $year && $row2['month'] == $row1['month']) {
                            $count2 = $row2['count'];
                            break;
                        }
                    }
                
                    $csvData .= "$year,$month,$count1,$count2," . ($count1 + $count2) . "\n";
                }
                ?>

            <h2 style="font-size: 24px; margin-bottom: 20px;">Certificate Issuance Report</h2>

            <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                <thead>
                    <tr>
                        <th style="padding: 10px; background-color: #299b63; color: #fff;">Year</th>
                        <th style="padding: 10px; background-color: #299b63; color: #fff;">Month</th>
                        <th style="padding: 10px; background-color: #299b63; color: #fff;">Total Barangay Clearance</th>
                        <th style="padding: 10px; background-color: #299b63; color: #fff;">Total Barangay Indigency</th>
                        <th style="padding: 10px; background-color: #299b63; color: #fff;">Total Certificates Issued</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        // Loop through the report data and generate table rows
                        foreach ($data1 as $row1) {
                            $year = $row1['year'];
                            $month = date("F", mktime(0, 0, 0, $row1['month'], 1));
                            $count1 = $row1['count'];

                            // Find the count from the $data2 array for the same month and year
                            $count2 = 0;
                            foreach ($data2 as $row2) {
                                if ($row2['year'] == $year && $row2['month'] == $row1['month']) {
                                    $count2 = $row2['count'];
                                    break;
                                }
                            }

                            echo '<tr>';
                            echo '<td style="padding: 10px; border: 1px solid #ccc;">' . $year . '</td>';
                            echo '<td style="padding: 10px; border: 1px solid #ccc;">' . $month . '</td>';
                            echo '<td style="padding: 10px; border: 1px solid #ccc;">' . $count1 . '</td>';
                            echo '<td style="padding: 10px; border: 1px solid #ccc;">' . $count2 . '</td>';
                            echo '<td style="padding: 10px; border: 1px solid #ccc;">' . ($count1 + $count2) . '</td>';
                            echo '</tr>';
                        }
                    ?>
                </tbody>
            </table>

            <a id="downloadCSVButton" href="#" style="margin-top: 20px;">Download CSV</a>
        </div>

    </div>

    <script>
        document.getElementById('downloadCSVButton').addEventListener('click', function () {
            // Create a new Blob object with the CSV data
            var blob = new Blob([<?= json_encode($csvData) ?>], { type: 'text/csv' });

            // Create a temporary link element to trigger the download
            var a = document.createElement('a');
            a.href = window.URL.createObjectURL(blob);
            a.download = 'certificate_report.csv';

            // Programmatically click the link to trigger the download
            a.click();

            // Clean up resources
            window.URL.revokeObjectURL(a.href);
        });
    </script>
</body>

</html>
