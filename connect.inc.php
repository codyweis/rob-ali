<?php

$mysql_host = 'robotsvsaliens';
$mysql_user = 'username';
$mysql_pass = 'Password123';
$mysql_db = 'a.database';
$conn_error = 'couldnot conenct to database';
// || !@mysql_select_db($mysql_db)
if(!@mysql_connect($mysql_host, $mysql_user, $mysql_pass)){
	die($conn_error);
}

?>
