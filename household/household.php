<!DOCTYPE html>
<html lang="en">

<head>


</head>

<body>
<?php
        include 'layout.php';
        ?>
        <div class="main">
    <div class="content">
        <div class="container my-5">
            
            <a class="btn btn-primary" href="/mis/household/add.php" role="button">Add</a>
            <br>
            <table class="content-table">
                <thead>
                    <tr>

                        <th>Household Number</th>
                        <th>Zone</th>
                        <th>Total Members</th>
                        <th>Head of the Family</th>
                        <th>Household Income</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $servername ="localhost";
                $username ="root";
                $password ="";
                $database ="mis";

                // Create connection
                $connection = new mysqli($servername, $username, $password, $database);

                // Check connection
                if ($connection ->connect_error) {
                    die ("Connection Failed: " . $connection ->connect_error);
                } 

                // ...
                // Calculate total records
                $sql_total_records = "SELECT COUNT(*) AS total FROM household";
                $result_total_records = $connection->query($sql_total_records);
                $row_total_records = $result_total_records->fetch_assoc();
                $total_records = $row_total_records['total'];

                // Set records per page and current page
                $recordsPerPage = 10;
                $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

                // Calculate total pages
                $total_pages = ceil($total_records / $recordsPerPage);

                // Calculate the offset for the SQL query
                $offset = ($current_page - 1) * $recordsPerPage;

                // Define the SQL query to fetch data with LIMIT and OFFSET
                $sql = "SELECT * FROM household LIMIT $offset, $recordsPerPage";

                // Execute the SQL query
                $result = $connection->query($sql);

                if ($result) {
                    while ($row = $result->fetch_assoc()) {
                    // Use the fetched data to populate the table rows
                echo "
                <tr>
                    <td>{$row['household_number']}</td>
                    <td>{$row['zone']}</td>
                    <td>{$row['total_members']}</td>
                    <td>{$row['head_of_the_family']}</td>
                    <td>{$row['household_income']}</td>
                    <td>
                    <a class='btn btn-primary btn-sm' href='/mis/household/edit.php?id={$row['id']}'>Edit</a> 
                        <a class='btn btn-danger btn-sm' href='/mis/household/delete.php?id={$row['id']}'>Delete</a>
                    </td>
                </tr>
                ";
                }  
            }
               ?>                
            </tbody> 
        </table>     
        <div class="pagination">
            <?php
                $total_records = 
                $total_pages = ceil($total_records / $recordsPerPage);

                if ($current_page > 1) {
                echo '<a class="btn btn-primary" href="?page=' . ($current_page - 1) . '">Previous</a>';
                }

                for ($i = max(1, $current_page - 5); $i <= min($current_page + 5, $total_pages); $i++) {
                    if ($i == $current_page) {
                     echo '<span class="current-page">' . $i . '</span>';
                        }  else {
                    echo '<a class="btn btn-primary" href="?page=' . $i . '">' . $i . '</a>';
                }
            }

                    if ($current_page < $total_pages) {
                        echo '<a class="btn btn-primary" href="?page=' . ($current_page + 1) . '">Next</a>';
            }
            ?>
            </div>       
    </div>
</body>
</html>