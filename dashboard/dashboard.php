<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <title>Puntian Management Information System</title>

    <style>
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        font-family: 'poppins', sans-serif;
    }

    .topbar {
        position: fixed;
        background: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.08);
        width: 100%;
        height: 60px;
        padding: 0 20px;
        display: grid;
        grid-template-columns: 2fr 10fr 0.4fr 1fr;
        align-items: center;
        z-index: 1;
    }

    .logo h2 {
        color: #299b63;
    }

    .search {
        position: relative;
        width: 60%;
        justify-self: center;
    }

    .search input {
        width: 100%;
        height: 40px;
        padding: 0 40px;
        font-size: 16px;
        outline: none;
        border: none;
        border-radius: 10px;
        background: #f5f5f5;
    }

    .search i {
        position: absolute;
        right: 15px;
        top: 15px;
        cursor: pointer;
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

    .charts {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-top: 20px;
        }

        .chart {
            flex-basis: calc(50% - 20px);
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08);
            margin-bottom: 20px;
        }
</style>

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
