<?php
session_start();
//connect to database

require ('../connections/connect.php');
$author_id2 = $_SESSION['author_id'];
 //update name
 
 $author_name2=strtolower( $_POST['author_name']);
$author_name=ucwords( $author_name2);

 
$sql= mysql_query("UPDATE author SET author_name = '$author_name' WHERE author_id = '$author_id2' ")or die(mysql_error());
echo "record updated successfully click <a href='list_author_process.php'>here</a> to go back";
?>