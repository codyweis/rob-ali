<?php

$mysql_host = 'robotsvsaliens.database.windows.net';
$mysql_user = 'username';
$mysql_pass = 'Password123';
$mysql_db = 'a.database';
$conn_error = 'YOU FUCKING SUCK';

if(!mysql_connect($mysql_host, $mysql_user, $mysql_pass) || !mysql_select_db($mysql_db)){
	die($conn_error);
}

?>
