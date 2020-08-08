<?php session_start();?>
<?php
session_start();
if (!isset($_SESSION['myusername'])) {
//echo 'no permission';
header("location:index.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Library Management System</title>
<script language="javascript" src="../connections/add.js"></script>
<script language="javascript" src="../connections/add_subject.js"></script>

<link rel="stylesheet" type="text/css" href="../style.css" />
</head>

<body>
<div class="wrapper">
<?php include("top.php");?>  
  <!-- Main wrapper div starts here-->
  <div class="main_wrapper">
  
  <!-- Content wrapper div starts here-->
    <div class="content_wrapper">
   <p align="right"> <a href="javascript:history.go(-1)">previous page</a> || <a href="admin.php">admin</a></p>
      <h1>Страница библиотекаря</h1>
      <?php 

require ('../connections/connect.php');
$date=date('Y-m-d');
$d = strtotime($date);

$sql="SELECT * FROM borrow_details  where status='1'" or die(mysql_error());
$result= mysql_query($sql)or die(mysql_error());
$count=mysql_num_rows($result);
// If result matched, table row must be greater than 1 row
 $sn=1;
echo "<table border=0 cellpadding=10 >";
echo "<tr><td>SERIAL</td><td>BOOK TITLE</td><td> NAME</td><td> PHONE </td><td>ADDRESS</td><td> STATUS </td></tr>";


while($row=mysql_fetch_array($result)){
$borrower_id= $row['borrower_id'];
$book_id= $row['book_id'];	
$user_id= $row['user_id'];			
$return_date= $row['return_date'];
$exp = strtotime($return_date);

if ($d < $exp) 
{
die ("No overdue exist");}
else{

$sql3="SELECT * FROM book_details where book_id = $book_id order by title " or die(mysql_error());
$result3= mysql_query($sql3)or die(mysql_error());
$count3=mysql_num_rows($result3);

while($row3=mysql_fetch_array($result3)){
$title= $row3['title'];	

 echo "<tr valign='top'><td>$sn</td><td>$title</td>";

/*$sql4="SELECT * FROM library_user where user_id = $user_id  " or die(mysql_error());
$result4= mysql_query($sql4)or die(mysql_error());
$count4=mysql_num_rows($result4);
while($row4=mysql_fetch_array($result4)){

$name =$row4['name'];
$address = $row4['address'];
$phone = $row4['phone'];
$status = $row4['status'];

echo "</ul></td><td>$name</td><td>$phone</td><td>$address</td><td>$status</td></tr>";
$sn++;

}*/
}
}
}

echo "</table>";


?>
      </span>
      <p>&nbsp;</p><p><!-- Content wrapper div ends here-->
  
  <!-- Right wrapper div starts here-->
</p>
    </div><div id="side_bar">
	<?php include("admin2.php");?>      
    </div>
    <!-- Right wrapper div ends here-->
<div class="clr"></div>
        <div><img src="../images/edge_bottom.jpg" border="0" /></div>
  </div>
  <p>

  <!-- Main wrapper div ends here-->
</div>
</body>

</html>
