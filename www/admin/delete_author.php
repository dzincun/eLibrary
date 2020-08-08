<?php
 $author_id=$_REQUEST['id'];
require ('../connections/connect.php');

mysql_query("DELETE FROM author WHERE author_id = '$author_id' ");
header('location:list_author_process.php');

?>