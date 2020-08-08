<?php
$book_id=$_REQUEST['id'];
require ('../connections/connect.php');
mysql_query("DELETE FROM book_details WHERE book_id = '$book_id' ");
header('location:list_book_process.php');

?>