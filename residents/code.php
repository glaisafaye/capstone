<?php
session_start();
$connection = mysqli_connect("localhost", "root", "", "mis");
/* insert data */
if (isset($_POST['save_data'])) {

  $id = $_POST["id"];
  $lname = $_POST["lname"];
  $fname = $_POST["fname"];
  $mname = $_POST["mname"];
  $gender = $_POST["gender"];
  $bday = $_POST["bday"];
  $civStatus = $_POST["civStatus"];
  $houseNum = $_POST["houseNum"];
  $abledPerson = $_POST["abledPerson"];
  $zone = $_POST["zone"];
  $totalHouseMem = $_POST["totalHouseMem"];
  $relateToHead = $_POST["relateToHead"];
  $employStatus = $_POST["employStatus"];
  $religion = $_POST["religion"];
  $education = $_POST["education"];
  $nationality = $_POST["nationality"];

  $insert_query = "INSERT INTO residents (`lname`, `fname`, `mname`, `gender`, `civStatus`, `houseNum`, `abledPerson`, `zone`, `totalHouseMem`, `relateToHead`, `employStatus`, `religion`, `education`, `nationality`) 
VALUES ('$lname', '$fname', '$mname', '$gender', '$civStatus', '$houseNum', '$abledPerson', '$zone', '$totalHouseMem', '$relateToHead', '$employStatus', '$religion',  '$education', '$nationality')";

    $insert_query_run = mysqli_query($connection, $insert_query);

  if ($insert_query_run) {
    $_SESSION['status'] = "Data inserted successfully";
    header('location: residents.php');
  } else {
    $_SESSION['status'] = "Insertation of data failed";
    header('location: residents.php');
  }
}

/* view data */
if (isset($_POST['click_view_btn'])) {
  $id = $_POST['user_id'];

  /* echo $id; */
  $fetch_query = "SELECT * FROM residents WHERE id='$id'";
  $fetch_query_run = mysqli_query($connection, $fetch_query);

  if (mysqli_num_rows($fetch_query_run) > 0) {
    while ($row = mysqli_fetch_array($fetch_query_run)) {

      echo '
      <h6>User ID: ' .$row['id']. '</h6>
      <h6>Last Name: ' .$row['lname' ]. '</h6>
      <h6>First Name: ' .$row['fname']. '</h6>
      <h6>Middle Name: ' .$row['mname']. '</h6>
      <h6>Gender: ' .$row['gender']. '</h6>
      <h6>Birthday: ' .$row['bday']. '</h6>
      <h6>Civil Status: ' .$row['civStatus']. '</h6>
      <h6>Household Number: ' .$row['houseNum']. '</h6>
      <h6>Differently-abled Person: ' .$row['abledPerson']. '</h6>
      <h6>Zone: ' .$row['zone']. '</h6>
      <h6>Total Household Member:' .$row['totalHouseMem']. '</h6>
      <h6>Relationship to Head: ' .$row['relateToHead']. '</h6>
      <h6>Employment Status:' .$row['employStatus']. '</h6>
      <h6>Religion:' .$row['religion']. '</h6>
      <h6>Educational Attainment:' .$row['education']. '</h6>
      <h6>Nationality:' .$row['nationality']. '</h6>
      ';
    }
  } 
  else 
  {
    echo '<h4>No record found</h4>';
  }
}

/*edit data */
if (isset($_POST['click_edit_btn'])) {
  $id = $_POST['user_id'];
  $arrayresult = [];

  /* echo $id; */
  $fetch_query = "SELECT * FROM residents WHERE id='$id'";
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
  $id = $_POST["id"];
  $lname = $_POST["lname"];
  $fname = $_POST["fname"];
  $mname = $_POST["mname"];
  $gender = $_POST["gender"];
  $bday = $_POST["bday"];
  $civStatus = $_POST["civStatus"];
  $houseNum = $_POST["houseNum"];
  $abledPerson = $_POST["abledPerson"];
  $zone = $_POST["zone"];
  $totalHouseMem = $_POST["totalHouseMem"];
  $relateToHead = $_POST["relateToHead"];
  $employStatus = $_POST["employStatus"];
  $religion = $_POST["religion"];
  $education = $_POST["education"];
  $nationality = $_POST["nationality"];

  $update_query = "UPDATE residents SET lname='$lname', fname='$fname', mname='$mname', gender='$gender', bday='$bday', civStatus='$civStatus', houseNum='$houseNum', abledPerson='$abledPerson', zone='$zone', totalHouseMem='$totalHouseMem', relateToHead='$relateToHead', employStatus='$employStatus', religion='$religion', education='$education', nationality='$nationality' WHERE id = '$id'";
  $update_query_run = mysqli_query($connection, $update_query);

  if($update_query_run)
  {
    $_SESSION['status'] = "Data updated successfully";
    header('location: residents.php');
  }
  else{
    $_SESSION['status'] = "Data not updated successfully";
    header('location: residents.php');
  }
}

/* delete data */
if (isset($_POST['click_delete_btn'])) {
  $id = $_POST['id'];

  $delete_query = "DELETE FROM residents WHERE id = '$id'";
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