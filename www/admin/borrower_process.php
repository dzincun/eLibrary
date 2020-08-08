<?php 
require ('../connections/connect.php');
$borrower_id=mktime();
$user_id=$_POST['user'];
//$book_name=$_POST['book'];

$date=date('Y-m-d');

$date2 = strtotime(date("Y-m-d", strtotime($date)) . " +2 week");
$expire = date('Y-m-d',$date2);
$status=1;
// if receive a valid file from server
if (isset ($_POST['book'])) {
  // checks the files received for upload
  for($d=0; $d<count($_POST['book']); $d++) {
    $book_id2 = $_POST['book'][$d];       // gets the name of the file

    // checks to not be an empty field (the name of the file to have more then 1 character)
    if(strlen($book_id2)>1) {
	
$insert = mysql_query("insert into borrow_details values ('$user_id','$borrower_id','$book_id2','$date','$expire','$status' )");

	
		$sql2= mysql_query("UPDATE book_details SET `availability`  = '0' WHERE book_id = '$book_id2' ")or die(mysql_error());

	

}
}
}
// if receive a valid file from server
echo "Borrower saved successfully click <a href='borrower.php'>here</a> to go back";

?>




