

<?php
 $publisher_id=$_REQUEST['id'];
require ('../connections/connect.php');

 mysql_query("DELETE FROM publisher WHERE publisher_id = '$publisher_id' ")or die(mysql_error());
header("location:list_publisher_process.php");

?>