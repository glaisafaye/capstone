<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
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

        .container {
            display: flex;
            flex-direction: column;
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
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
        }

        form {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            margin-right: 10px;
        }

        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ccc;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="topbar">
            <div class="logo">
                <h2>Puntian Sumilao</h2>
            </div>
            <div class="search">
                <input type="text" id="search" placeholder="search here">
                <label for="search"> <i class="fas fa-search"></i></label>
            </div>
            <i class="fas fa-bell"></i>
            <div class="user">
                <img src="/mis/dashboard/logo.jpg" alt="">
            </div>
        </div>
        <div class="sidebar">
            <ul>
                <?php
                $menuItems = array(
                    array("Dashboard", "fas fa-th-large", "/mis/dashboard/dashboard.php"),
                    array("Officials", "fas fa-user-tie", "/mis/officials/officials.php"),
                    array("Household Profiling","fas fa-house-user", "/mis/household/household.php"),
                    array("Resident Profiling", "fas fa-users", "/mis/residents/residents.php"),
                    array("Certification", "fas fa-print", "/mis/certificates/certificates.php"),
                    array("Decision Support System", "fas fa-chart-bar", "/mis/dss/dss.php"),
                );

                foreach ($menuItems as $item) {
                    echo '<li>';
                    echo '<a href="' . $item[2] . '">'; // Update the href attribute
                    echo '<i class="' . $item[1] . '"></i>';
                    echo '<div>' . $item[0] . '</div>';
                    echo '</a>';
                    echo '</li>';
                }
                ?>
            </ul>
        </div>

        <!-- Residents List Section -->
        <div class="main">
        <?php
    // Database configuration
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'MIS';

    // Create a database connection
    $conn = new mysqli($hostname, $username, $password, $database);

    // Check the database connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Default limits and selected zone
    $residents_limit = 10;
    $income_limit = 32000;
    $selected_zone = "All";

    // Update limits and selected zone if submitted via POST
    if (isset($_POST['residents_limit'])) {
        $residents_limit = intval($_POST['residents_limit']);
    }

    if (isset($_POST['income_limit'])) {
        $income_limit = intval($_POST['income_limit']);
    }

    if (isset($_POST['zone'])) {
        $selected_zone = $_POST['zone'];
    }

    // Query to fetch unique zones from the household table
    $zone_query = "SELECT DISTINCT zone FROM household";
    $zone_result = $conn->query($zone_query);

    // Build the SQL query to retrieve data based on selected zone
    $sql = "SELECT head_of_the_family, zone 
            FROM household 
            WHERE household_income < $income_limit";

    if ($selected_zone !== "All") {
        $sql .= " AND zone = '$selected_zone'";
    }

    $sql .= " ORDER BY total_members DESC, household_income ASC LIMIT $residents_limit";

    // Execute the SQL query
    $result = $conn->query($sql);
    ?>
            <h1>Residents List</h1>
            <form method="post">
                <label for="residents_limit">Residents Limit:</label>
                <input type="number" name="residents_limit" id="residents_limit" value="<?php echo $residents_limit; ?>">

                <label for="income_limit">Income Limit:</label>
                <input type="number" name="income_limit" id="income_limit" value="<?php echo $income_limit; ?>">

                <label for="zone">Select Zone:</label>
                <select name="zone" id="zone">
                    <option value="All" <?php if ($selected_zone === "All") echo "selected"; ?>>All</option>
                    <?php
                    while ($row = $zone_result->fetch_assoc()) {
                        $zone = $row["zone"];
                        echo "<option value='$zone' ";
                        if ($selected_zone === $zone) echo "selected";
                        echo ">$zone</option>";
                    }
                    ?>
                </select>

                <input type="submit" value="Process">
            </form>

            <?php
            if ($result->num_rows > 0) {
                // Output the results as a table
                echo "<table>";
                echo "<tr><th>Head of the Family</th><th>Zone</th></tr>";

                while ($row = $result->fetch_assoc()) {
                    $zone = $row["zone"];
                    echo "<tr><td>" . $row["head_of_the_family"] . "</td><td>$zone</td></tr>";
                }

                echo "</table>";
            } else {
                echo "<p>No records found.</p>";
            }

            // Close the database connection
            $conn->close();
            ?>
        </div>
        <!-- End Residents List Section -->
    </div>
</body>
</html>
