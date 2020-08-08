<?php
session_start();
require ('../connections/connect.php');

$title = $_POST['title'];
$author = $_POST['author'];
$category = $_POST['category'];
$edition = $_POST['edition'];
$isbn = $_POST['isbn'];
$book_id = $_POST['book_id_hidden'];

if (isset($_SESSION['myusername'])) {
	
	$sql_1 = "UPDATE book_details SET title='$title', edition='$edition', isbn='$isbn' WHERE book_id='$book_id'";
	$executeQuery_1 = mysql_query($sql_1);
}

?>