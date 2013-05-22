<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_login = "student.santarosa.edu";
$database_login = "cwalker1";
$username_login = "cwalker1_admin";
$password_login = "dsX54esA";
$login = mysql_pconnect($hostname_login, $username_login, $password_login) or trigger_error(mysql_error(),E_USER_ERROR); 
?>