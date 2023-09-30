<!DOCTYPE html>
<html lang="en">

<head>

</head>

<body>
    <?php
    include 'layout.php';
    ?>
        <div class="main">
    <div class="cards">
        <?php
       
        $con = mysqli_connect("localhost", "root", "", "mis");

        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $cardsData = array(
            array("SELECT COUNT(*) FROM household", "Total Household", "fas fa-house-user"),
            array("SELECT COUNT(*) FROM residents", "Total Residents", "fas fa-users"),
            array("SELECT COUNT(*) FROM clearance", "Total Clearance", "fas fa-print")
        );

        foreach ($cardsData as $card) {
            $query = mysqli_query($con, $card[0]);
            
            if ($query) {
                $num_rows = mysqli_fetch_row($query)[0];

                echo '<div class="card">';
                echo '<div class="card-content">';
                echo '<div class="number">' . $num_rows . '</div>';
                echo '<div class="card-name">' . $card[1] . '</div>';
                echo '</div>';
                echo '<div class="icon-box">';
                echo '<i class="' . $card[2] . '"></i>';
                echo '</div>';
                echo '</div>';
            } else {
                echo '<div class="card">';
                echo '<div class="card-content">';
                echo '<div class="number">N/A</div>';
                echo '<div class="card-name">Error</div>';
                echo '</div>';
                echo '<div class="icon-box">';
                echo '<i class="' . $card[2] . '"></i>';
                echo '</div>';
                echo '</div>';
        
                echo 'Query Error: ' . mysqli_error($con);
            }
        }

        $zones = array("Zone 1", "Zone 2", "Zone 3", "Zone 4", "Zone 5");

        foreach ($zones as $zone) {
            $zoneQuery = mysqli_query($con, "SELECT COUNT(*) FROM residents WHERE zone = '$zone'");
            $zoneNumRows = mysqli_fetch_row($zoneQuery)[0];

            echo '<div class="card">';
            echo '<div class="card-content">';
            echo '<div class="number">' . $zoneNumRows . '</div>';
            echo '<div class="card-name">' . $zone . '</div>';
            echo '</div>';
       
            echo '<div class="icon-box">';
            echo '<i class="fas fa-users"></i>';
            echo '</div>';
            echo '</div>';
        }

        // Close the database connection
        mysqli_close($con);
        ?>
        </div>
            <div class="charts">
                <div class="chart">
                    <h2>Total Population</h2>
                    <canvas id="lineChart"></canvas>
                </div>
                <div class="chart" id="doughnut-chart">
                    <h2>Household Population</h2>
                    <canvas id="doughnut"></canvas>
                </div>
                <div class="chart" id="doughnut-chart">
                    <h2>Total Residents Per Zone</h2>
                    <canvas id="doughnut1"></canvas>
                </div>
                <div class="chart">
                    <h2>Population by Civil Status</h2>
                    <canvas id="lineChart1"></canvas>
                </div>
                <div class="chart">
                    <h2>Income Ratio</h2>
                    <canvas id="doughnut2"></canvas>
                </div>
                <div class="chart">
                    <h2>Employment Ratio</h2>
                    <canvas id="barchart"></canvas>
                </div>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <script src="chart1.js"></script>
    <script src="chart2.js"></script>
    <script src="chart3.js"></script>
    <script src="chart4.js"></script>
    <script src="chart5.js"></script>
    <script src="chart6.js"></script>
    </div>
</div>


</body>

</html>
