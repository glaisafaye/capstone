<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Puntian Management Information System</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

  <style>
    

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

    .main {
        position: absolute;
        top: 60px;
        width: calc(100% - 260px);
        left: 260px;
        min-height: calc(100vh - 60px);
        background: #f5f5f5;
    }
      .container {
        display:flow-root;
        flex-direction: column;
        width: 250%;
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

      .custom-navbar {
        background-color: #299b63;
        font-family: 'Poppins', sans-serif;
        font-size: 18px;
        border-radius: 0;
      }

      .custom-navbar .navbar-brand {
        color: #fff;
        font-weight: bold;
        font-size: 24px;
      }

      .custom-navbar .user img {
        max-width: 40px;
        max-height: 40px;
        border-radius: 50%;
      }

      #myTable_wrapper {
        padding: 5px;
      }

      #myTable_filter input[placeholder="search"] {
        width: 100%; 
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-bottom: 10px;
      }

      #myTable_length select {
        width: fit-content; 
      }

      #myTable_paginate .pagination {
        margin-top: 10px;
      }

      #myTable thead th {
        background-color: #f0f0f0;
        font-size: 15px;
      }

      #myTable tbody td {
        font-size: 14px;
        padding: 7px; 
      }

      #myTable {
        width: 100%; 
      }

      .modal-content {
        padding: 20px;
        max-width: 600px;
        margin: 0 auto;
      }

      .modal-title {
        font-size: 24px;
        margin-bottom: 20px;
      }

      .control-label {
        font-weight: bold;
      }

      .form-group {
        margin-bottom: 15px;
      }

      .modal-footer button[type="submit"] {
        background-color: #007bff;
        color: #fff;
      }

      .modal-footer button[type="button"] {
        background-color: #ccc;
      }

      select.form-control {
        height: 34px;
        padding: 6px 12px;
      }

      input.form-control {
        height: 34px;
        padding: 6px 12px;
      }

      input[type="hidden"] {
        display: none;
      }

      input[type="date"] {
        height: 34px;
        padding: 6px 12px;
      }

      .modal-body {
        padding: 10px;
      }

      .modal-footer {
        padding: 15px 20px;
        text-align: center;
      }
      
      .content {
        margin-left: 260px; 
        transition: margin 0.3s;
        padding: 15px;
      }

  </style>
</head>

<body>

        <div class="sidebar">
            <ul>
                <?php
                $menuItems = array(
                    array("Dashboard", "fas fa-th-large", "/mis/dashboard/dashboard.php"),
                    array("Barangay Officials", "fas fa-user-tie", "/mis/officials/officials.php"),
                    array("Household Profiling","fas fa-house-user", "/mis/household/household.php"),
                    array("Resident Profiling", "fas fa-users", "/mis/residents/residents.php"),
                    array("Certification", "fas fa-print", "/mis/brgyclearance/brgyclearance.php"),
                    array("Decision Support System", "fas fa-chart-bar", "/mis/dss/dss.php"),
                    array("Reports", "fas fa-chart-area", "/mis/reports/reports.php"),
                    array("About", "fa-solid fa-question", "/mis/about/about.php"),
                    array("Backup", "fa-solid fa-download", "/mis/backup.php"),
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
