<?php
session_start();
//connect to database

require ('../connections/connect.php');

  $book_id2 = $_SESSION['book_id'];
 //update name
 
$sql= mysql_query("UPDATE book_details SET title = '$_POST[title]',isbn = '$_POST[edition]',isbn = '$_POST[isbn]' WHERE book_id = '$book_id2' ")or die(mysql_error());


echo "record updated successfully click <a href='admin.php'>here</a> to go back";
?>