<?php

//This is my code snippet for creating a table in a database. Will modify as required

$tableName = "";

function createTable($connection, $tableName) {
	$createTable = "CREATE TABLE $tableName (enter fields to be added to the table in here)";
	mysqli_query($connection, $createTable);
	if ($createTable) {
		return;
		#echo "Table has been created<br>";
	} else {echo "Table creation has failed";
	}
}
?>