<?php
session_start();
$connection = mysqli_connect("localhost", "root", "", "mis");

if (isset($_POST['submit'])) {
  $id = $_POST["id"];
  $houseNum = $_POST["houseNum"];
  $zone = $_POST["zone"];
  $totalMem = $_POST["totalMem"];
  $famHead = $_POST["famHead"];
  $income = $_POST["income"];
  $sanToilet = $_POST["sanToilet"];
  $water = $_POST["water"];
  $ownerStatus = $_POST["ownerStatus"];
  $landStatus = $_POST["landStatus"];

  $insert_query = "INSERT INTO household (`houseNum`, `zone`, `totalMem`, `famHead`, `income`, `sanToilet`, `water`, `ownerStatus`, `landStatus`) VALUES ('$houseNum', '$zone', '$totalMem', '$famHead', '$income', '$sanToilet', '$water', '$ownerStatus', '$landStatus')";
  $insert_query_run = mysqli_query($connection, $insert_query);

  if ($insert_query_run) {
    $_SESSION['status'] = "Data inserted successfully";
    header('location: household.php');
  } else {
    $_SESSION['status'] = "Insertation of data failed";
    header('location: household.php');
  }
}

if (isset($_POST['click_view_btn'])) {
  $id = $_POST['user_id'];

  /* echo $id; */
  $fetch_query = "SELECT * FROM household WHERE id='$id'";
  $fetch_query_run = mysqli_query($connection, $fetch_query);

  if (mysqli_num_rows($fetch_query_run) > 0) {
    while ($row = mysqli_fetch_array($fetch_query_run)) {

      echo '
      <h6>User ID: ' .$row['id']. '</h6>
      <h6>Household Number: ' .$row['houseNum']. '</h6>
      <h6>Zone: ' .$row['zone']. '</h6>
      <h6>Total Members: ' .$row['totalMem']. '</h6>
      <h6>Head of the Family: ' .$row['famHead']. '</h6>
      <h6>Household Income: ' .$row['income']. '</h6>
      <h6>Sanitary Toilet: ' .$row['sanToilet']. '</h6>
      <h6>Water Usage:' .$row['water']. '</h6>
      <h6>House Ownership Status: ' .$row['ownerStatus']. '</h6>
      <h6>Land Ownership Status:' .$row['landStatus']. '</h6>
      ';
    }
  } 
  else 
  {
    echo '<h4>No record found</h4>';
  }
}

?>
