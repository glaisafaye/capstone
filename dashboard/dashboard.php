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
                    <h2>Population by Age</h2>
                    <canvas id="lineChart1"></canvas>
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
