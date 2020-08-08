<?php
require ('../connections/connect.php');
$userIdGet = $_GET['userId'];
$query_1 = mysql_query("SELECT * FROM borrow_details WHERE user_id = '$userIdGet' AND status ='0'") or die(mysql_error());	
//$result = mysql_fetch_array($query_1);
echo '<table border=1px>';
while($row = mysql_fetch_array($query_1)){
	$book = $row['book_id'];
	
	$query_2 = mysql_query("SELECT * FROM book_details WHERE book_id = '$book'") or die(mysql_error());	
	while($row2 = mysql_fetch_array($query_2)){
		
		$query_3 = mysql_query("SELECT author_name FROM author WHERE author_id = (SELECT author_id FROM saved_author WHERE book_id = '$book')") or die(mysql_error());	
		$row3 = mysql_fetch_array($query_3);

		echo '<tr><td>'.$row2['title'].'</td><td>'.$row2['isbn'].'</td><td>'.$row2['edition'].'</td><td>'.$row3['author_name'].'</td><td><form action="get_books_on_hands_formAction.php" method="POST"><input type=hidden name="userID" value="'.$userIdGet.'"><input type=hidden name="bookID" value="'.$book.'"><input type=Submit value=Вернул /></form></td></tr>';
	}
}
echo '</table>';
?>
