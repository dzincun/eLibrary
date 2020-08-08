

<?php
 $book_id=$_REQUEST['id'];
require ('../connections/connect.php');


		$sql2= mysql_query("UPDATE book_details SET `availability`  = '1' WHERE book_id = '$book_id' ")or die(mysql_error());


 mysql_query("UPDATE borrow_details SET `status`= '0' WHERE book_id = '$book_id' ")or die(mysql_error());
 
 
 
header("location:../admin/return.php");

?>