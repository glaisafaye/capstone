<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="styles.css">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
                <title>Puntian Management Information Systemm</title>

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

                .container{
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
    margin: 10px;
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
                    echo '<a href="' . $item[2] . '">'; 
                    echo '<i class="' . $item[1] . '"></i>';
                    echo '<div>' . $item[0] . '</div>';
                    echo '</a>';
                    echo '</li>';
                }
                ?>
            </ul>
        </div>
        <div class="main">
    <div class="content">
        <div class="container my-5">
          
            <a class="btn btn-primary" href="/mis/residents/add.php" role="button">Add</a>
            <br>
            <table class="content-table">
                <thead>
                    <tr>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Phone</th>
                        <th>Gender</th>
                        <th>Zone</th>
                        <th>Household Number</th>
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
                $sql_total_records = "SELECT COUNT(*) AS total FROM residents";
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
                $sql = "SELECT * FROM residents LIMIT $offset, $recordsPerPage";

                // Execute the SQL query
                $result = $connection->query($sql);

                if ($result) {
                    while ($row = $result->fetch_assoc()) {
                    // Use the fetched data to populate the table rows
                    echo "
                    <tr>
                        <td>{$row['fname']}</td>
                        <td>{$row['lname']}</td>
                        <td>{$row['phone']}</td>
                        <td>{$row['gender']}</td>
                        <td>{$row['zone']}</td>
                        <td>{$row['household_number']}</td>
                        <td>
                <a class='btn btn-primary btn-sm' href='/mis/residents/edit.php?id={$row['id']}'>Edit</a> 
                <a class='btn btn-danger btn-sm' href='/mis/residents/delete.php?id={$row['id']}'>Delete</a>
            </td>
        </tr>
        ";
    }
} else {
    echo "Error executing SQL query: " . $connection->error;
}
// ...

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
