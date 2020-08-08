<?php
require ('../connections/connect.php');

$books_for_deleting = $_POST['books_delete'];
if (count($books_for_deleting) > 0){
foreach($books_for_deleting as $book){
	$sql_1 = "DELETE FROM book_details WHERE book_id=$book";
	mysql_query($sql_1);
	echo $book;
}
}

?>