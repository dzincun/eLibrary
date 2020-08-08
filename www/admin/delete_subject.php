<?php
$subject_id=$_REQUEST['id'];
require ('../connections/connect.php');

mysql_query("DELETE FROM subject WHERE subject_id = '$subject_id' ");
header('location:list_subject_process.php');

?>