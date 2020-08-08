<?php
session_start();
//unset session variable
//end session
session_destroy();
header ("location:index.php");

?>