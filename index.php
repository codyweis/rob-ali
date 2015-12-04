<?php
require 'connect.inc.php';
?>

<form action="index.php" method="GET">
	Choose a table:
	<select name="ra">
		<option value="robots"> Robot</option>
		<option value="aliens">Alien</option>
	</select><br><br>
	<input type="submit" value="Display All">
</form>

<br>

<form action="index.php" method="POST">
	Add Alien: <br> <br>
	Name:<br> <input type="text" name="alienname" value="">
	<br>
	Color:<br> <input type="text" name="color" value="">
	<br>
	Size:<br> <input type="text" name="size" value="">
	<br>
	<input type="submit" value="Add Alien">
</form>

<br><br>

<form action="index.php" method="POST">
	Add Robot: <br> <br>
	Name:<br> <input type="text" name="robotname" value="">
	<br>
	Color:<br> <input type="text" name="color" value="">
	<br>
	MAC:<br> <input type="text" name="mac" value="">
	<br>
	<input type="submit" value="Add Robot">
</form>

<br>

<form action="index.php" method="POST">
	<input type="hidden" name="id" value="1" />
	<input type="text" name="name" /> <br><br>
	<input type="submit" value="update" value="">
	
</form>


<?php

function updateColorRob($value, $id){
	$sql = "UPDATE `robots` SET `color` = '{$value}' WHERE 'id' = '{$id}'";
	if ($query_run = mysql_query($sql)) {
       echo "Name updated successfully";
   } else {
       echo "Error updating";
   }
}

if(isset($_POST['color'])){
    updateColorRob($_POST['color'],$_POST['id']);
}

//add alien
if(isset($_POST['alienname']) && isset($_POST['color']) && isset($_POST['size'])){
	$alienname = $_POST['alienname'];
	$color = $_POST['color'];
	$size = $_POST['size'];
	if(!empty($alienname) && !empty($color) && !empty($size)){
		$query = "SELECT `alienname` FROM `aliens` WHERE `alienname` = '$alienname'";
		$query_run = mysql_query($query);
		if(mysql_num_rows($query_run) == 1){
			echo 'The alien ' .$alienname. ' already exists. Choose another name.';
		}
		else{
			$queryAdd = "INSERT INTO `aliens` VALUES (, '$alienname', '$color', '$size')";
			$query_run = mysql_query($queryAdd);
			echo 'Added';
		}
	}
	else{
		echo 'All fields Required';
	}
}

//add robot
if(isset($_POST['robotname']) && isset($_POST['color']) && isset($_POST['mac'])){
	$robotname = $_POST['robotname'];
	$color = $_POST['color'];
	$mac = $_POST['mac'];
	if(!empty($robotname) && !empty($color) && !empty($mac)){
		$query = "SELECT `robotname` FROM `robots` WHERE `robotname` = '$robotname'";
		$query_run = mysql_query($query);
		if(mysql_num_rows($query_run) == 1){
			echo 'The robot ' .$robotname. ' already exists. Choose another name.';
		}
		else{
			$queryAdd = "INSERT INTO `robots` VALUES ('', '$robotname', '$mac', '$color')";
			$query_run = mysql_query($queryAdd);
			echo 'Added';
		}
	}
	else{
		echo 'All fields Required';
	}
}

//display tables
if(isset($_GET['ra']) && !empty($_GET['ra'])){
	$ra = strtolower($_GET['ra']);
	
	if($ra == 'robots' || $ra == 'aliens'){
	
		$query = "SELECT* FROM `$ra`";

		if($query_run = mysql_query($query)){
			if(mysql_num_rows($query_run) == NULL){
				echo 'no results found';
			}
			else{
				if($ra == 'aliens'){
					while($query_row = mysql_fetch_assoc($query_run)){
						$alienname = $query_row['alienname'];
						$color = $query_row['color'];
						$size = $query_row['size'];
						
						echo $alienname. ' is ' .$color. ' and has size of '. $size. '<br><br>';
					}
				}else{ 
					while($query_row = mysql_fetch_assoc($query_run)){
					$robotsname = $query_row['robotname'];
					$color = $query_row['color'];
					$mac = $query_row['mac'];
	
					echo $robotsname. ' is ' .$color. ' and has a MAC address of '. $mac. '<br><br>';
					}
				}
			}
		}else{
			echo mysql_error();
		}
	}
}



?>
