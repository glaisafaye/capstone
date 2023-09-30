<?php include("code.php");
  
  $id = $_GET['id'];
  $status = $_GET['status'];
  $updatequery1 = "UPDATE officials SET status=$status WHERE id=$id";
  mysqli_query($connection,$updatequery1);
  header('location:officials.php');
?>

