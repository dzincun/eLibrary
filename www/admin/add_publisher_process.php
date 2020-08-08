<?php 
require ('../connections/connect.php');
$publisher2 =strtolower ($_POST['publisher_name']);

$publisher =ucwords ($publisher2);
//$publisher_id= mktime();

$sqlb="insert into publisher (`publisher_name`,`publisher_id`) values('$publisher','')" or die(mysql_error());
mysql_query($sqlb) or die(mysql_error());


echo "<font color='red'><b>$publisher</b></font> has been saved successfully.
click <a href = 'add_book_property.php'>here</a> to go back"

?>




