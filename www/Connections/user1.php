<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_user1 = "localhost";
$database_user1 = "user1";
$username_user1 = "root";
$password_user1 = "";
mysql_query("SET NAMES utf8");
$user1 = mysql_pconnect($hostname_user1, $username_user1, $password_user1) or trigger_error(mysql_error(),E_USER_ERROR); 
?>