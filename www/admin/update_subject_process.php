<?php
session_start();
//connect to database

require ('../connections/connect.php');

  $subject_id2 = $_SESSION['subject_id'];
 //update name
  $subject_name2=strtolower( $_POST['subject_name']);
$subject_name=ucwords( $subject_name2);

 
$sql= mysql_query("UPDATE subject SET subject_name = '$subject_name' WHERE subject_id = '$subject_id2' ")or die(mysql_error());
echo "record updated successfully click <a href='list_subject_process.php'>here</a> to go back";
?>