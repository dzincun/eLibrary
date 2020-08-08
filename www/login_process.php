<?php 
ob_start();
session_start ();
require ('connections/connect.php');

 // username and password sent from form
$username= $_POST['username'];
$password=$_POST['password'];

// To protect MySQL injection (more detail about MySQL injection)
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);

// check if supplied details exist
$result=mysql_query("SELECT * FROM users WHERE name='$username' 
AND password='$password'") or die(mysql_error());

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);
$rows = mysql_fetch_array($result);
$id = $rows['id'];
$name = $rows['name'];
// If result matched $myusername and $mypassword, table row must be 1 row

if($count==1){
	// Register $myusername, $mypassword and redirect to file "admin.php"
	$_SESSION['user_log'] = $id;
	$_SESSION['username'] = $name;
	
	$val_1 = mysql_query("SELECT * FROM users WHERE name = '$username'") or die(mysql_error());
	$val_1_1 = mysql_fetch_array($val_1);
	$val_1_1_1 = $val_1_1['userName'];
	$val_1_1_2 = $val_1_1['userFamily'];
	
	$_SESSION['nameAndFamily'] = $val_1_1_1.' '.$val_1_1_2;
		
	header("location:profile.php");
}
else {
	echo "Неверный логин или пароль. Нажмите <a href = 'index.php'>сюда</a> для возврата";
}
ob_flush();
?>