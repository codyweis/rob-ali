<?php

$mysql_host = 'robotsvsaliens.database.windows.net';
$mysql_user = 'unsername';
$mysql_pass = 'Password123';
$mysql_db = 'a_database';
$conn_error = 'couldnot conenct to database';

if(!@mysql_connect($mysql_host, $mysql_user, $mysql_pass) || !@mysql_select_db($mysql_db)){
	die($conn_error);
}

?>
