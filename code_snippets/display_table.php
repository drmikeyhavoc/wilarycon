<?php
$tablename = "";
$connection = "";
$db = "";

function displayRecords($tablename, $connection, $db) {
	mysqli_select_db($connection, $db);
	$query = "SELECT * FROM $tablename ORDER BY main content heading";
	# Will amend this
	$result = mysqli_query($connection, $query);
	$script = $_SERVER['SCRIPT_NAME'];
	# Will add in table headings as required
	echo "<table class='table' border = '3'>
						<tr class = 'info'>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
						</tr>";
	while ($row = mysqli_fetch_array($result)) {
		$id = $row[''];
		# This will be based on the unique id used in the table to determine the row
		echo "<tr class = 'success'>";
		echo "<td>" . $row[''] . "</td>";
		#This is relative to the fields in the table
		echo "<td>" . $row[''] . "</td>";
		echo "<td>" . $row[''] . "</td>";
		# I will most likely utilise the delete, edit and show forms which are using concurrently with their respective functions/pages
		echo "<td>" . "<form method='post' action='delete.php')'>
						<input type='hidden' name='delete_id' value='$id' />
						<input type='submit' name='delete' value='Delete' class='btn btn-danger btn-large'>
						</form>" . "</td>";
		echo "<td>" . "<form method='post' action='edit.php'>
						<input type='hidden' name='edit_id' value='$id' />
						<input type='submit' name='edit' value='Edit' class='btn btn-info btn-large'>
						</form>" . "</td>";
		echo "<td>" . "<form method='post' action='show.php'>
						<input type='hidden' name='show_id' value='$id' />
						<input type='submit' name='show' value='Show' class='btn btn-link btn-large'>
						</form>" . "</td>";
		echo "</tr>";
	}

	echo "</table>";
}
?>