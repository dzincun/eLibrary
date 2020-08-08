<?php 
require ('../connections/connect.php');
$subject2 =strtolower($_POST['subject_name']);


$subject =ucwords ($subject2);
//$subject_id= mktime();

$sqlb="insert into subject (`subject_name`,`subject_id`) values('$subject','')" or die(mysql_error());
mysql_query($sqlb) or die(mysql_error());


echo "<font color='red'><b>$subject</b></font> has been saved successfully.
click <a href = 'add_book_property.php'>here</a> to go back"

?>




