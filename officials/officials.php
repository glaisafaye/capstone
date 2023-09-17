<!DOCTYPE html>
<html lang="en">

<head>

    <style>

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

    .content {
    padding: 20px;
    }

.btn-primary {
    background-color: #299b63;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    text-decoration: none;
    font-size: 16px;
    cursor: pointer;
}

.btn-primary:hover {
    background-color: #247b4d;
}

.table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    background-color: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.08);
}

.table th, .table td {
    padding: 10px 15px;
    text-align: left;
    border-bottom: 1px solid #e0e0e0;
}

.table th {
    background-color: #f5f5f5;
}

.table tbody tr:hover {
    background-color: #f5f5f5;
}

    .content-table{
        border-collapse: collapse;
        margin: 25px 0;
        font-size: 16px;
        min-width: 400px;
    }

.content-table thead tr {
    background-color: #eeeee4;
    color: #24ad50;
    text-align: left;
}

.content-table th,
.content-table td{
    padding: 12px 15px;

}
</style>

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