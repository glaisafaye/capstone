<!DOCTYPE html>
<html lang="en">

<head>
<script>
    function saveResidents() {
        var residentsList = document.querySelector('input[name="residents_list"]').value;

        if (residentsList.trim() === '') {
            alert('Residents list is empty. Please select residents to save.');
        } else {
            alert('Residents list has been successfully saved.');
        }
    }
</script>

</head>

<body>
    <?php include '../includes/layout1.php'; ?>

    <div class="main">

        <?php

        $hostname = 'localhost';
        $username = 'root';
        $password = '';
        $database = 'MIS';

        $conn = new mysqli($hostname, $username, $password, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $residents_limit = 10;
        $income_limit = 32000;
        $selected_zone = "All";
        $total_members_limit = 0;

        if (isset($_POST['residents_limit'])) {
            $residents_limit = intval($_POST['residents_limit']);
        }

        if (isset($_POST['income_limit'])) {
            $income_limit = intval($_POST['income_limit']);
        }

        if (isset($_POST['zone'])) {
            $selected_zone = $_POST['zone'];
        }
        if (isset($_POST['total_members_limit'])) {
            $total_members_limit = intval($_POST['total_members_limit']);
        }

        $zone_query = "SELECT DISTINCT zone FROM household";
        $zone_result = $conn->query($zone_query);

        $sql = "SELECT famHead, zone 
                FROM household 
                WHERE income < $income_limit";

        if ($selected_zone !== "All") {
            $sql .= " AND zone = '$selected_zone'";
        }
        if ($total_members_limit > 0) {
            $sql .= " AND totalMem >= $total_members_limit";
        }

        $sql .= " ORDER BY totalMem DESC, income ASC LIMIT $residents_limit";

        $result = $conn->query($sql);

        $residentNames = array();
        while ($row = $result->fetch_assoc()) {
            $zone = $row["zone"];
            $residentNames[] = $row["famHead"]; 
        }
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
            <label for="total_members_limit">Total Members Limit:</label>
                <input type="number" name="total_members_limit" id="total_members_limit" value="<?php echo $total_members_limit; ?>">
            <input type="submit" value="Process">
        </form>

        <?php
        if ($result->num_rows > 0) {
            $residentNumber = 1;

            echo "<table>";

            foreach ($residentNames as $residentName) {
                echo "<tr><td>$residentNumber</td><td>$residentName</td><td>$selected_zone</td></tr>";

                $residentNumber++;
            }

            echo "</table>";

            echo '<form method="post" action="javascript:void(0);" onsubmit="saveResidents()">';
            echo '<input type="hidden" name="residents_list" value="' . implode(",", $residentNames) . '">';
            echo '<input type="submit" value="Save Residents">';
            echo '</form>';
        } else {
            echo "<p>No records found.</p>";
        }

        $conn->close();
        ?>

    </div>
</body>
</html>
