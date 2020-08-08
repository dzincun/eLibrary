<?php session_start();
if (!isset($_SESSION['username'])) {
//echo 'no permission';
header("location:index.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Library Management System</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
<div class="wrapper">
<?php include("top.php");?> 
 
  <!-- Main wrapper div starts here-->
  <div class="main_wrapper">
  
  <!-- Content wrapper div starts here-->
    <div class="content_wrapper">

<?php

include ('connections/connect.php');
$book_id = $_POST['book'];
//echo $book_id;
$username_1 = $_SESSION[username];
//$sql_1 = "SELECT * FROM users WHERE name = '$username_1'";
//echo $username_1.'<br>';
//echo $book_id.'<br>';


$sql_2 = "SELECT id FROM users WHERE name = '$username_1'";
$query_2 = mysql_query($sql_2);
$result_2 = mysql_fetch_array($query_2);
$userid_2 = $result_2['id'];

$sql_1 = "INSERT INTO borrow_details (user_id, book_id, status, date, expire) VALUES('$userid_2', '$book_id', '1', CURDATE(), CURDATE())";
$query_1 = mysql_query($sql_1) or die(mysql_error());

echo "Заявка на взятие книги отправлена на рассмотрение. Нажмите <a href='javascript:history.go(-1);'>сюда</a> для возврата.";

?>
	
	
	</div>
    <!-- Content wrapper div ends here-->
    
    <!-- Right wrapper div starts here-->
      <div id="side_bar">
        <?php include('index_subject.php'); ?>
      </div>
    <!-- Right wrapper div ends here-->
                  <div class="clr"></div>
        <div><img src="images/edge_bottom.jpg" border="0" /></div>
  </div>
  <p>

  <!-- Main wrapper div ends here-->
</div>
</body>

</html>
