<?php
ob_start();
session_start();
//connect to database
$file_name = mktime();

if ($_FILES['file']['name'] != ''){
	require('upload_file.php');
	upload_file('../books', $file_name);
}

$exten = $_SESSION['exten'];

require ('../connections/connect.php');
$title2=strtolower( $_POST['title']);
$title=ucwords( $title2);

$author=$_POST['author_id'];
$publisher=$_POST['publisher_id'];
$subject = $_POST['subject_id'];
$edition=$_POST['edition'];

$isbn = $_POST['isbn'];
// replace all instances of "Frank" with "Crazy Dan"
$newisbn = str_replace("-", "", $isbn);
$newisbn2 = trim($newisbn);


  $book_id2 = $_SESSION['book_id'];
  //echo $book_id2;
 //update name
 
  $g=mysql_query("DELETE FROM saved_author WHERE book_id = $book_id2 ")or die(mysql_error());
  
  $h=mysql_query("DELETE FROM saved_subject WHERE book_id = '$book_id2' ")or die(mysql_error());

// if receive a valid file from server
if (isset ($_POST['author'])) {
  // checks the files received for upload
  
  for($f=0; $f<count($_POST['author']); $f++) {
    $author_list = $_POST['author'][$f];       // gets the name of the file

    // checks to not be an empty field (the name of the file to have more then 1 character)
    if (strlen($author_list)>=1) {
	
	$insert = mysql_query("insert into saved_author values ('$book_id2', '$author_list' )");
}
}
}
// if receive a valid file from server
if (isset ($_POST['subject'])) {
  // checks the files received for upload
  for($n=0; $n<count($_POST['subject']); $n++) {
    $subject_list = $_POST['subject'][$n];       // gets the name of the file

    // checks to not be an empty field (the name of the file to have more then 1 character)
    if (strlen($subject_list)>=1) {
	
	$insert2 = mysql_query("insert into saved_subject values ('$book_id2', '$subject_list' )");
}
}
}
if ($_FILES['file']['name'] != ''){
	$sqlb= "UPDATE book_details SET title = '$title', edition = '$_POST[edition]', isbn = '$newisbn2', publisher_id = '$_POST[publisher_id]', soft_copy = '$file_name.$exten'  WHERE book_id = '$book_id2' " ;
}
else
{
	$sqlb= "UPDATE book_details SET title = '$title', edition = '$_POST[edition]', isbn = '$newisbn2', publisher_id = '$_POST[publisher_id]' WHERE book_id = '$book_id2' " ;
}
mysql_query($sqlb) or die(mysql_error());

echo "Книга успешно изменена. Нажмите <a href='list_book_process.php'>здесь</a>, чтобы вернуться назад";
ob_flush();
?>
