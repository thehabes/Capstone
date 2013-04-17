<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_imagesetconnection = "localhost:8889";
$database_imagesetconnection = "imagestest";
$username_imagesetconnection = "root";
$password_imagesetconnection = "root";
$imagesetconnection = mysql_pconnect($hostname_imagesetconnection, $username_imagesetconnection, $password_imagesetconnection) or trigger_error(mysql_error(),E_USER_ERROR); 
?>