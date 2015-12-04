<?php

$mysql_host = 'robotsvsaliens';
$mysql_user = 'username';
$mysql_pass = 'Stoley317';
$mysql_db = 'a.database';
$conn_error = 'couldnot conenct to database';

if(!@mysql_connect($mysql_host, $mysql_user, $mysql_pass) || !@mysql_select_db($mysql_db)){
	die($conn_error);
}

?>
