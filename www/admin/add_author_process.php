<?php 
require ('../connections/connect.php');

$author2 =strtolower ($_POST['author_name']);

$author =ucwords ($author2);
//$author_id= mktime();

$sqlb="insert into author (`author_name`,`author_id`) values('$author','')" or die(mysql_error());
mysql_query($sqlb) or die(mysql_error());


echo "<font color='red'><b>$author</b></font> has been saved successfully.
click <a href = 'add_book_property.php'>here</a> to go back"

?>
<p>&nbsp;</p>


