<!DOCTYPE html>
<html lang="en">

<head>
   
</head>
<body>
    <?php
        include 'layout.php';
        ?>
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
