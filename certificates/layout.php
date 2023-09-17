<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Puntian Management Information System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
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

/* Style for the close button */
.close-button {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 24px;
    cursor: pointer;
    color: #888;
}

/* Style for the form elements */
.form-control {
    margin: 10px 0;
    padding: 10px;
    width: 100%;
    border: 1px solid #ccc;
    border-radius: 5px;
}

/* Style for buttons */
.btn {
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.btn-primary {
    background-color: #007bff;
    color: #fff;
}

.btn-secondary {
    background-color: #ccc;
    color: #fff;
}

/* Style for the main content */
.main {
    padding: 20px;
}

/* Style for the table */
.content-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.content-table th, .content-table td {
    border: 1px solid #ddd;
    padding: 10px;
    text-align: left;
}

.content-table th {
    background-color: #f2f2f2;
}
</style>

</head>

<body>
    
    <div class="container">
        <div class="topbar">
            <div class="logo">
                <h2>Puntian, Sumilao</h2>
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
    </div>
</body>

</html>