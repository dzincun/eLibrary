<?php
require ('../connections/connect.php');
$user = $_POST['userID'];
$book = $_POST['bookID'];

$sql_1 = "UPDATE borrow_details SET status='2' WHERE user_id='$user' AND book_id='$book'";
mysql_query($sql_1);

header("Location:get_users.php");
?>
