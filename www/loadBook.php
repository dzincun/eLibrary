<?php
session_start();
include ('connections/connect.php');
$book_id = $_POST['book'];
//echo $book_id;
$username_1 = $_SESSION[username];
$sql_1 = "SELECT * FROM users WHERE name = '$username_1'";
$saveToBDThatUserIsSeenThis_1 = mysql_query($sql_1)or die(mysql_error());
$row_1 = mysql_fetch_array($saveToBDThatUserIsSeenThis_1);
$row_1_1 = $row_1["id"];
//echo '---'.$row_1_1;
$sql_2 = "INSERT INTO last_book_view VALUES('$row_1_1', '$book_id')";
$saveToBDThatUserIsSeenThis_2 = mysql_query($sql_2)or die(mysql_error());
header("location:books/$book_id.pdf");
//header('Location: books/'.$book_id.'.pdf');
exit();
?>