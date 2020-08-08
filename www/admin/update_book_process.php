<?php
session_start();
//connect to database

require ('../connections/connect.php');

  $book_id2 = $_SESSION['book_id'];
 //update name
 
$sql= mysql_query("UPDATE subject SET subject_name = '$_POST[subject_name]' WHERE subject_id = '$subject_id2' ")or die(mysql_error());
echo "record updated successfully click <a href='edit_property.php'>here</a> to go back";
?>