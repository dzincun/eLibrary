<?php 
session_start ();
require ('../connections/connect.php');

 // username and password sent from form
//$username2= $_POST['username'];
$password2=$_POST['password'];

$username= 'root';
$password= $password2;

//echo $username;

// To protect MySQL injection (more detail about MySQL injection)
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);

$sql="SELECT * FROM admin WHERE username='$username' and password='$password'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);
// If result matched $myusername and $mypassword, table row must be 1 row

if($count==1){
// Register $myusername, $mypassword and redirect to file "admin.php"

$_SESSION['myusername'] = $username;

header("location:admin.php");
}
else {
echo "Wrong Username or Password click <a href = 'index.php'>here</a> to go back";
}
?>