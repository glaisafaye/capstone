<?php
  session_start();
  $connection = mysqli_connect("localhost", "root", "", "mis");
  /* insert data */
  if (isset($_POST['save_data'])) {

    $id = $_POST["id"];
    $clearanceNO = $_POST['clearanceNO'];
    $ddl_resident = $_POST['ddl_resident'];
    $types = $_POST['types'];
    $orNo = $_POST['orNo'];
    $amount = $_POST['amount'];
    $description = $_POST['description'];
    $validDate = $_POST['validDate'];



    $insert_query = "INSERT INTO busclearance (`clearanceNO`, `residentid`, `types`, `orNo`, `amount`, `description`, `validDate`) VALUES ('$clearanceNO', '$ddl_resident', '$types', '$orNo', '$amount', '$description', '$validDate')";
    $insert_query_run = mysqli_query($connection, $insert_query);

    if ($insert_query_run) {
      $_SESSION['status'] = "Data inserted successfully";
      header('location: busclearance.php');
    } else {
      $_SESSION['status'] = "Insertation of data failed";
      header('location: busclearance.php');
    }
  }
?>