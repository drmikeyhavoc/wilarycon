<?php

//Will have variables such as $user, $password, $db etc
$database = "";
$connection = "";

//This is my code snippet for creating a database. I will modify it as required

function createDB($connection, $database) {
	$createDB = mysqli_query($connection, "CREATE DATABASE $database");
	if ($createDB) {
		return;
		#echo "Database $database Created<br>";
	} else {"Database $database Failed<br>";
	}
	$dbstatus = mysqli_select_db($connection, $database);
	if ($dbstatus) {
		return;
		#echo "Database Successfully Opened<br>";
	} else {"Failed<br>";
	}
}
?>
