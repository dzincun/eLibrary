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

	// check if number of borrowed is not maximum
	$getLastBooks = mysql_query("SELECT * FROM last_book_view WHERE userId = (SELECT id FROM users WHERE name = '$_SESSION[username]') ORDER BY bookId DESC") or die(mysql_error());
	echo "<table border=1>";
	if(mysql_num_rows($getLastBooks) < 1){
		echo "<tr><td>Вы еще не просматривали книги</td></tr>";
	}
	else{
		//$resultArray = mysql_fetch_array($borrowed);
		echo "<tr><td>Название</td><td>Автор</td><td>Ссылка</td></tr>";
		while ($resultArray = mysql_fetch_array($getLastBooks)) {
			echo "<tr>";
			$resultBook = $resultArray['bookId'];
						
			$resultBook_2 = mysql_query("SELECT * FROM book_details WHERE book_id = '$resultBook'") or die(mysql_error());
			$resultBook_2_1 = mysql_fetch_array($resultBook_2);
			
			$resultAuthor = $resultArray['userId'];
			
			echo '<td>';
			echo $resultBook_2_1['title'];
			echo "</td>";
			
			$getAuthorId = mysql_query("SELECT * FROM saved_author WHERE book_id = '$resultBook'") or die(mysql_error());
			$getAuthorId2 = mysql_fetch_array($getAuthorId);
			$authorId = $getAuthorId2['author_id'];
			$getAuthorName = mysql_query("SELECT * FROM author WHERE author_id = '$authorId'") or die(mysql_error());
			$getAuthorName2 = mysql_fetch_array($getAuthorName);
			$getAuthorNameEnd = $getAuthorName2['author_name'];
			
			//echo $borrowed_2_1['title']."<br>";
			//printf ("UserId: %s  BookId: %s", $borrowed_2_1[0], $borrowed_2_1[2]);  
			//$borrowed_3 = mysql_query("SELECT author_name FROM author WHERE author_id = (SELECT author_id FROM saved_author WHERE book_id = '$resultBOOKID')");
			//$borrowed_3_1 = mysql_fetch_array($borrowed_3);
			//echo "<td>";
			//echo $borrowed_2_1[1];
			//echo "</td>";
			//echo "<td>";
			//echo $borrowed_3_1[0];
			echo '<td>';
			echo $getAuthorNameEnd;
			echo "</td>";
			
			echo '<td>';
			$link_ = 'books/'.$resultBook_2_1['soft_copy'];
			echo "<a href='$link_'>Открыть</a>";
			
			echo '</td>';
			
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