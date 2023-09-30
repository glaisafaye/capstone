<?php
include('db_connection.php');
?>
<!DOCTYPE html>
<html>
<head>
    <style>
        @page {
            size: 8in 11in;
            margin: 0;
        }
        @media print {
            /* Hide the print button when printing */
            .print-button {
                display: none;
            }
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: flex-start;
            justify-content: center;
            height: 100vh;
        }
        .paper {
            width: 8in;
            height: 11in;
            box-sizing: border-box;
            padding: 0;
            display: flex;
            flex-direction: column;
        }
        .content {
            width: 6in;
            padding: 2cm;
            line-height: 1.5;
        }
        .header {
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12pt;
            margin-bottom: 20px;
            margin-top: -70px;
            font-weight: bold;
        }
        .logo-left {
            width: 100px;
            height: auto;
            margin: 0 10px;
        }
        .logo-right {
            width: 80px;
            height: auto;
            margin: 0 10px;
        }
        .separator-line {
            border-top: 2px solid black;
            margin: 10px 0;
        }
        .title {
            text-align: center;
            font-size: 16pt;
            font-weight: bold;
        }
        .page-header {
                text-align: center;
                font-size: 12pt;
                font-weight: bold;
                margin-bottom: 20px;
            }
    </style>
</head>
<body>
<div class="print-button" onclick="window.print()">Print</div>
<div class="paper">
    <div class="content">
        <div class="header">
            <img class="logo-left" src="logo1.JPG" alt="Left Logo">
            <p>Republic of the Philippines<br>
                PROVINCE OF BUKIDNON<br>
                Municipality of Sumilao<br>
                Barangay Puntian<br>
                -o0o-<br>
                OFFICE OF THE PUNONG BARANGAY</p>
            <img class="logo-right" src="logo2.PNG" alt="Right Logo">
        </div>
        <hr class="separator-line">
        <div class="title">List of Included in Cash4Work</div>
        
        <?php
        $sql = "SELECT resident_name FROM assistance_list"; // Assuming resident names are stored in the 'resident_names' column
        $result = $mysqli->query($sql);
        
        if ($result) {
            if ($result->num_rows > 0) {
                $counter = 1; // Initialize a counter variable
                while ($row = $result->fetch_assoc()) {
                    $residentNames = explode("\n", $row["resident_name"]); // Split names by newline character
                    foreach ($residentNames as $name) {
                        $name = trim($name); // Trim any leading/trailing whitespace
                        echo "<p>" . $counter . ". " . $name . "</p>"; // Display the name with a number
                        $counter++; // Increment the counter
                    }
                }
            } else {
                echo "No records found";
            }
            $result->close();
        } else {
            echo "Error executing the query: " . $mysqli->error;
        }
        
        $mysqli->close();
        ?>
    </div>
</div>

</body>
</html>
