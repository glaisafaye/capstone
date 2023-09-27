<?php
session_start();
$connection = mysqli_connect("localhost", "root", "", "mis");
/* insert data */
if (isset($_POST['save_data'])) {

  $id = $_POST["id"];
  $position = $_POST["position"];
  $name = $_POST["name"];
  $contactNum = $_POST["contactNum"];
  $start = $_POST["start"];
  $end = $_POST["end"];

  $insert_query = "INSERT INTO officials (`position`, `name`, `contactNum`, `start`, `end`) VALUES ('$position', '$name', '$contactNum', '$start', '$end')";
  $insert_query_run = mysqli_query($connection, $insert_query);

  if ($insert_query_run) {
    $_SESSION['status'] = "Data inserted successfully";
    header('location: officials.php');
  } else {
    $_SESSION['status'] = "Insertation of data failed";
    header('location: officials.php');
  }
}

/* view data */
if (isset($_POST['click_view_btn'])) {
  $id = $_POST['user_id'];

  /* echo $id; */
  $fetch_query = "SELECT * FROM officials WHERE id='$id'";
  $fetch_query_run = mysqli_query($connection, $fetch_query);

  if (mysqli_num_rows($fetch_query_run) > 0) {
    while ($row = mysqli_fetch_array($fetch_query_run)) {

      echo '
      <h6>User ID: ' .$row['id']. '</h6>
      <h6>Position: ' .$row['position']. '</h6>
      <h6>Full Name: ' .$row['name']. '</h6>
      <h6>Contact Number: ' .$row['contactNum']. '</h6>
      <h6>Start Term: ' .$row['start']. '</h6>
      <h6>End Term: ' .$row['end']. '</h6>
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
  $fetch_query = "SELECT * FROM officials WHERE id='$id'";
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
  $position = $_POST["position"];
  $name = $_POST["name"];
  $contactNum = $_POST["contactNum"];
  $start = $_POST["start"];
  $end = $_POST["end"];


  $update_query = "UPDATE officials SET position='$position', name='$name', contactNum='$contactNum', start='$start', end='$end' WHERE id ='id'";
  if($update_query_run)
  {
    $_SESSION['status'] = "Data updated successfully";
    header('location: officials.php');
  }
  else{
    $_SESSION['status'] = "Data not updated successfully";
    header('location: officials.php');
  }
}

?>
