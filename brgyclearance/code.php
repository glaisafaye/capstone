<?php
  session_start();
  $connection = mysqli_connect("localhost", "root", "", "mis");
  /* insert data */
  if (isset($_POST['save_data'])) {

    $id = $_POST["id"];
    $clearanceNO = $_POST['clearanceNO'];
    $ddl_resident = $_POST['ddl_resident'];
    $purpose = $_POST['purpose'];
    $orNo = $_POST['orNo'];

    $insert_query = "INSERT INTO brgyclearance (`clearanceNO`, `residentid`, `purpose`, `orNo`) VALUES ('$clearanceNO', '$ddl_resident', '$purpose', '$orNo')";
    $insert_query_run = mysqli_query($connection, $insert_query);

    if ($insert_query_run) {
      $_SESSION['status'] = "Data inserted successfully";
      header('location: brgyclearance.php');
    } else {
      $_SESSION['status'] = "Insertation of data failed";
      header('location: brgyclearance.php');
    }
  }
?>