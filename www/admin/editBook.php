<?php
session_start();
require ('../connections/connect.php');
if (isset($_SESSION['myusername'])) {
	$book_id = $_GET['bookId'];
	
	$sql_1 = "SELECT * FROM book_details WHERE book_id='$book_id'";
	$executeQuery_1 = mysql_query($sql_1);
	$result_1 = mysql_fetch_array($executeQuery_1);
	
	$sql_2_1 = "SELECT subject_id FROM saved_subject WHERE book_id='$book_id'";
	$executeQuery_2_1 = mysql_query($sql_2_1);
	$result_2_1 = mysql_fetch_array($executeQuery_2_1);
	$result_2_1_1 = $result_2_1['subject_id'];
	
	$sql_2_2 = "SELECT subject_name FROM subject WHERE subject_id = '$result_2_1_1'";
	$executeQuery_2_2 = mysql_query($sql_2_2);
	$result_2_2 = mysql_fetch_array($executeQuery_2_2);
	
	$sql_3_1 = "SELECT author_id FROM saved_author WHERE book_id='$book_id'";
	$executeQuery_3_1 = mysql_query($sql_3_1);
	$result_3_1 = mysql_fetch_array($executeQuery_3_1);
	$result_3_1_1 = $result_3_1['author_id'];
	
	$sql_3_2 = "SELECT author_name FROM author WHERE author_id = '$result_3_1_1'";
	$executeQuery_3_2 = mysql_query($sql_3_2);
	$result_3_2 = mysql_fetch_array($executeQuery_3_2);
	
	echo '<form action=updateBookInfo.php method=POST>';
	echo '<table>';
	echo '<input type=hidden name=book_id_hidden value="'.$book_id.'"/>';
	echo '<tr><td>Название</td><td><input type=text name=title value="'.$result_1[title].'"/></td></tr>';
	echo '<tr><td>Автор</td><td><input type=text name=author value="'.$result_3_2[author_name].'"/></td></tr>';
	echo '<tr><td>Категория</td><td><input type=text name=category value="'.$result_2_2[subject_name].'"/></td></tr>';
	echo '<tr><td>Издание</td><td><input type=text name=edition value="'.$result_1[edition].'"/></td></tr>';
	echo '<tr><td>ISBN</td><td><input type=text name=isbn value="'.$result_1[isbn].'"/></td></tr>';
	
	
	echo '<tr><td></td><td><button>Сохранить</button></td></tr>';
	echo '</table>';
	echo '</form>';
	//while($row = mysql_fetch_array($executeQuery_1)){
	//	echo $row['title'].'<br>';	
	//}	
}

?>