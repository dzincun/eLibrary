<?php 
require ('../connections/connect.php');
$user_id= mktime();
$name2=strtolower ($_POST['name']);

$name=ucwords ($name2);

$user_name = $_POST['userName'];
$user_family = $_POST['userFamily'];
$address=$_POST['address'];
$phone=$_POST['phone'];
$status = $_POST['status'];
//$edition=$_POST['edition'];
//$isbn = $_POST['isbn'];

$sqlb="insert into users (`userName`,`userFamily`, `name`,`address`,`phone`,`status`) values('$_POST[userName]','$_POST[userFamily]','$name','$_POST[address]','$_POST[phone]','$_POST[status]')" or die(mysql_error());
mysql_query($sqlb) or die(mysql_error());



echo "<font color='red'><b>$name</b></font> has been saved successfully.
click <a href = 'user.php'>here</a> to go back"

?>




