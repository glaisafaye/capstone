<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Puntian Management Information System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        font-family: 'poppins', sans-serif;
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
        top: 40px;
        width: calc(90% - 200px);
        left: 315px;
        min-height: calc(100vh - 60px);
        background: #f5f5f5;
        position: relative;
        z-index: 1;
        padding: 20px;
    }

    .icon-box i {
        font-size: 45px;
        color: #299b63;
    }

    .content {
    padding: 20px;
    }

.navbar {
    background-color: #299b63; 
    font-family: 'poppins', sans-serif; 
    font-size: 18px; 
    border-radius: 0; 
}

.navbar-brand {
    color: #fff; 
    font-weight: bold; 
    font-size: 24px; 
}

.form-control {
    border-radius: 5px;
    font-family: 'poppins', sans-serif;
    font-size: 16px; 
}

.btn-outline-success:hover {
    background-color: #247b4d; 
}

.user {
        position: relative;
        width: 50px;
        height: 50px;
    }

form {
    max-width: 500px;
    margin: 0 auto;
}

    table.content-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    table.content-table th,
    table.content-table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: center;
    }

    table.content-table th {
        background-color: #f2f2f2;
    }

    table.content-table tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .pagination {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }

    .pagination a {
        padding: 8px 16px;
        text-decoration: none;
        background-color: #f2f2f2;
        color: #333;
        border: 1px solid #ddd;
        margin: 0 4px;
    }

    .pagination a:hover {
        background-color: #333;
        color: #fff;
    }

    .current-page {
        background-color: #333;
        color: #fff;
        padding: 8px 16px;
        border: 1px solid #333;
        margin: 0 4px;
    }

    .btn {
        padding: 8px 16px;
        text-decoration: none;
        border: none;
        cursor: pointer;
        font-weight: bold;
    }

    .btn-primary {
        background-color: #007bff;
        color: #fff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .btn-outline-primary {
        background-color: transparent;
        border: 1px solid #007bff;
        color: #007bff;
    }

    .btn-outline-primary:hover {
        background-color: #007bff;
        color: #fff;
    }
 
    #pop-up-modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 1000;
}

.modal-content {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
    padding: 20px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    max-width: 400px;
}

.close-button {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 24px;
    cursor: pointer;
    color: #888;
}

</style>
</head>
<body>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand">Puntian, Sumilao</a>  
            <div class="user">
                <img src="/mis/dashboard/logo.jpg" alt="">
            </div>
        </div>
    </nav>
    
    <div class="sidebar">
    <ul>
        <?php
  
        $menuItems = array(
            array("Dashboard", "fas fa-th-large", "/mis/dashboard/dashboard.php"),
            array("Officials", "fas fa-user-tie", "/mis/officials/officials.php"),
            array("Household Profiling", "fas fa-house-user", "/mis/household/household.php"),
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
    </body>
    </html>