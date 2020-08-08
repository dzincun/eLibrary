<?php
$hostname_connecting = "localhost";
$database_connecting = "e_library";
$username_connecting = "root";
$password_connecting = "";
$connecting = @mysql_pconnect($hostname_connecting, $username_connecting, $password_connecting) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_select_db($database_connecting, $connecting);
mysql_query("SET NAMES cp1251");
?>