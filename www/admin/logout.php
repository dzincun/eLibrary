<?php
session_start();
//unset session variable
unset($_SESSION['myusername']);
//end session
session_destroy();
header("location:index.php");
?>