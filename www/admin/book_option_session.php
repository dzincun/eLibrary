<?php 
session_start();

$_SESSION['criteria'] =$_POST['criteria'];

header('location:book_option_process.php');


?>

<p><a href="javascript:history.go(-1)">previous page</a> || <a href="admin.php">admin</a> </p>
