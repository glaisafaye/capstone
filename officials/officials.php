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
            
            <a class="btn btn-primary" href="/mis/officials/add.php" role="button">Add</a>
            <br>
            <table class="content-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Position</th>
                        <th>Name</th>
                        <th>Contact Number</th>
                        <th>Address</th>
                        <th>Start Term</th>
                        <th>End Term</th>
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

                // Read all rows from database table
                $sql = "SELECT * FROM officials";
                $result = $connection->query($sql);

                if (!$result) {
                die("Invalid Query: " . $connection->error);
                }

                // Read data from each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$row['id']}</td>";
                    echo "<td>{$row['position']}</td>";
                    echo "<td>{$row['name']}</td>";
                    echo "<td>{$row['contact_number']}</td>";
                    echo "<td>{$row['address']}</td>";
                    echo "<td>{$row['start_term']}</td>";
                    echo "<td>{$row['end_term']}</td>";
                    echo "<td>";
                    echo "<a class='btn btn-primary btn-sm' href='/mis/officials/edit.php?id={$row['id']}'>Edit</a>";
                    echo "<a class='btn btn-danger btn-sm' href='/mis/officials/endterm.php?id={$row['id']}' onclick='return confirmEndTerm()'>End Term</a>";                    
                
                    echo "</td>";
                    echo "</tr>";
                }
               ?>                
            </tbody> 
        </table>            
    </div>

    <script>
        function confirmEndTerm() {
            return confirm("Are you sure you want to end the term?"); 
        }
    </script>
</body>
</html>