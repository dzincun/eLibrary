<?php 
$userID = $_POST['user'];
$bookID = $_POST['book'];
$xy = $_POST['xy'];
require ('../connections/connect.php');
if ($xy == 1){
	$sql_1 = "UPDATE borrow_details SET status='0' WHERE user_id='$userID' AND book_id='$bookID'";
}
else
if ($xy == 0){
	$sql_1 = "UPDATE borrow_details SET status='3' WHERE user_id='$userID' AND book_id='$bookID'";
}
//0 - взятые
//1 - в заявке
//2 - вернутые
//3 - отказанные

mysql_query($sql_1);
?>