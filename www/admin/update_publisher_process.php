<?php
session_start();
//connect to database

require ('../connections/connect.php');

  $publisher_id2 = $_SESSION['publisher_id'];
 //update name
  $publisher_name2=strtolower( $_POST['publisher_name']);
$publisher_name=ucwords( $publisher_name2);

$sql= mysql_query("UPDATE publisher SET publisher_name = '$publisher_name' WHERE publisher_id = '$publisher_id2' ")or die(mysql_error());
echo "record updated successfully click <a href='list_publisher_process.php'>here</a> to go back";
?>