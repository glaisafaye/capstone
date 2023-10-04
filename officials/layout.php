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

    .container {
      display: flow-root;
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
      padding: 1px;
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
      padding: 5px;
    }

    #myTable {
      width: 95%;
    }

    .btn-status {
      padding: 5px 10px;
      margin: 0 5px;
      border-radius: 5px;
      font-size: 14px;
      font-weight: bold;
      width: auto;
    }

    .btn-success.active-status {
      background-color: #28a745;
      border-color: #28a745;
      color: #fff;
    }

    .btn-danger.inactive-status {
      background-color: #dc3545;
      border-color: #dc3545;
      color: #fff;
    }

    .select-size {
      width: 100%;
    }

    .input-size {
      width: 100%;
    }

    .modal-content {
      background-color: #fff;
      padding: 15px;
      border-radius: 10px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
      max-width: 450px;
      margin: 0 auto;
    }

    label {
      font-weight: bold;
      margin-bottom: 10px;
    }

    .form-control {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .content {
      margin-left: 260px; 
      transition: margin 0.3s;
      padding: 15px;
    }

    .fixed-sidebar .sidebar {
      position: fixed;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg custom-navbar">
    <div class="container-fluid">
      <a class="navbar-brand">Puntian, Sumilao</a>
      <div class="user">
        <img src="/mis/dashboard/logo.jpg" alt="">
      </div>
    </div>
  </nav>

  <div class="container-fluid">
    <div class="row">
      <nav class="col-md-3 col-lg-2 d-md-block sidebar">
        <ul class="nav flex-column">
          <?php
            $menuItems = array(
              array("Dashboard", "fas fa-th-large", "/mis/dashboard/dashboard.php"),
              array("Barangay Officials", "fas fa-user-tie", "/mis/officials/officials.php"),
              array("Household Profiling", "fas fa-house-user", "/mis/household/household.php"),
              array("Resident Profiling", "fas fa-users", "/mis/residents/residents.php"),
              array("Certification", "fas fa-print", "/mis/certificates/brgyclearance.php"),
              array("Decision Support System", "fas fa-chart-bar", "/mis/dss/dss.php"),
              array("Reports", "fas fa-chart-area", "/mis/reports/reports.php"),
              array("About", "fa-solid fa-question", "/mis/about/about.php"),
              array("Backup", "fa-solid fa-download", "/mis/backup.php"),
            );

            foreach ($menuItems as $item) {
              echo '<li class="nav-item">';
              echo '<a class="nav-link" href="' . $item[2] . '">';
              echo '<i class="' . $item[1] . '"></i>';
              echo '<span>' . $item[0] . '</span>';
              echo '</a>';
              echo '</li>';
            }
          ?>
        </ul>
      </nav>
    </div>
  </div>

</body>

</html>