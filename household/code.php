<?php
session_start();
$connection = mysqli_connect("localhost", "root", "", "mis");
/* insert data */
if (isset($_POST['save_data'])) {   

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

/* view data */
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

/* edit data */
if (isset($_POST['click_edit_btn'])) {

  $id = $_POST['user_id'];
  $arrayresult = [];

  /* echo $id; */
  $fetch_query = "SELECT * FROM household WHERE id='$id'";
  $fetch_query_run = mysqli_query($connection, $fetch_query);

  if (mysqli_num_rows($fetch_query_run) > 0) {
    while ($row = mysqli_fetch_array($fetch_query_run)) {

      array_push($arrayresult, $row);
      header('content-type: application/json');
      echo json_encode($arrayresult);
    }
  } 
  else 
  {
    echo '<h4>No record found</h4>';
  }
}

/* update data */
if (isset($_POST['update_data'])) {
  $id = $_POST['id'];
  $houseNum = $_POST['houseNum'];
  $zone = $_POST['zone'];
  $totalMem = $_POST['totalMem'];
  $famHead = $_POST['famHead'];
  $income = $_POST['income'];
  $sanToilet = $_POST['sanToilet'];
  $water = $_POST['water'];
  $ownerStatus = $_POST['ownerStatus'];
  $landStatus = $_POST['landStatus'];

  $update_query = "UPDATE household SET houseNum='$houseNum', zone='$zone', totalMem='$totalMem', famHead='$famHead', income='$income', sanToilet='$sanToilet', water='$water', ownerStatus='$ownerStatus', landStatus='$landStatus' WHERE id='$id'";
  $update_query_run = mysqli_query($connection, $update_query);

  if($update_query_run) {
    $_SESSION['status'] = "Data updated successfully";
    header('location: household.php');
  } else {
    $_SESSION['status'] = "Data not updated";
    header('location: household.php');
  }
}

/* delete data */
if (isset($_POST['click_delete_btn'])) {
  $id = $_POST['id'];

  $delete_query = "DELETE FROM household WHERE id = '$id'";
  $delete_query_run = mysqli_query($connection, $delete_query);

  if ($delete_query_run)
  {
    echo "Data deleted successfully";
  }
  else 
  {
    echo "Data deletion failed";
  }
}

?>
