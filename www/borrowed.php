<?php ob_start();
session_start();?>
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
require ('connections/connect.php');
$user_log = $_SESSION['user_log'];
// check if the user is logged in

$cat = $_GET['cat'];

	
if (!$_SESSION['user_log']){
	header("location:login.php");
}
else{
	// check if number of borrowed is not maximum
	if ($cat == 2){
		$borrowed = mysql_query("SELECT * FROM borrow_details WHERE user_id = '$user_log' AND status ='0'") or die(mysql_error());
	}
	else
	if ($cat == 3)
	{
		$borrowed = mysql_query("SELECT * FROM borrow_details WHERE user_id = '$user_log' AND status ='1'") or die(mysql_error());	
	}
	else
	if ($cat == 4)
	{
		$borrowed = mysql_query("SELECT * FROM borrow_details WHERE user_id = '$user_log' AND status ='2'") or die(mysql_error());	
	}
	else
	if ($cat == 5)
	{
		$borrowed = mysql_query("SELECT * FROM borrow_details WHERE user_id = '$user_log' AND status ='3'") or die(mysql_error());	
	}
	echo "<table border=1>";
	if(mysql_num_rows($borrowed) < 1){
	
	if ($cat == 2){
		echo "<tr><td>Вы еще не взяли ни одной книги</td></tr>";
	}
	else
	if ($cat == 3)
	{
		echo "<tr><td>Вы еще не подавали заявок для взятия книг</td></tr>";
	}
	else
	if ($cat == 4)
	{
		echo "<tr><td>Вы еще не вернули ни одной книги</td></tr>";
	}
	else
	if ($cat == 5)
	{
		echo "<tr><td>У Вас еще нет откаанных книг</td></tr>";
	}	
	}
	else{
		//$resultArray = mysql_fetch_array($borrowed);
		echo "<tr><td>Название</td><td>Автор</td></tr>";
		while ($resultArray = mysql_fetch_array($borrowed)) {
			echo "<tr>";
			$resultBOOKID = $resultArray['book_id'];
			$borrowed_2 = mysql_query("SELECT * FROM book_details WHERE book_id = '$resultBOOKID'") or die(mysql_error());
			$borrowed_2_1 = mysql_fetch_array($borrowed_2);
			//echo $borrowed_2_1['title']."<br>";
			//printf ("UserId: %s  BookId: %s", $borrowed_2_1[0], $borrowed_2_1[2]);  
			$borrowed_3 = mysql_query("SELECT author_name FROM author WHERE author_id = (SELECT author_id FROM saved_author WHERE book_id = '$resultBOOKID')");
			$borrowed_3_1 = mysql_fetch_array($borrowed_3);
			echo "<td>";
			echo $borrowed_2_1[1];
			echo "</td>";
			echo "<td>";
			echo $borrowed_3_1[0];
			echo "</td>";
			echo "</tr>";
		}	
		
		//for($i = 0; $i < mysql_num_rows($borrowed);$i++){
			
		//	$resultBOOKID = $resultArray['book_id'];
			//echo $result2;
		//	$borrowed_2 = mysql_query("SELECT * FROM book_details WHERE book_id = '$resultBOOKID'") or die(mysql_error());
		//	$borrowed_2_1 = mysql_fetch_array($borrowed_2);
		//	echo $borrowed_2_1['title']."<br>";
		//}
	}
	echo "</table>";
	}
?>
    </div>
    <!-- Content wrapper div ends here-->
    
    <!-- Right wrapper div starts here-->
      <div id="side_bar">
		<?php include('sidelinks.php'); ?>
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
<?php ob_flush();?>