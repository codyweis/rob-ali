<?php

$mysql_host = 'robotsvsaliens.database.windows.net';
$mysql_user = 'username';
$mysql_pass = 'Stoley317';
$mysql_db = 'a.database';
$conn_error = 'couldnot conenct to database';
$conn = new mysqli($mysql_host, $$mysql_user, $mysql_pass, $mysql_db);

if($conn ->connect_error){
	die("conention failed: " . $conn->connect_error);
}
echo "connected";

//if(!@mysql_connect($mysql_host, $mysql_user, $mysql_pass) || !@mysql_select_db($mysql_db)){
//	die($conn_error);
//}

?>
