<?php
function findTopic($connect, $table) {
	if (isset($_REQUEST[''])) {
		$key = $_REQUEST[''];
		#The use of the mysqli_real_escape_string was to prevent an error if certain characters were used
		#such as single/double apos.
		$search = mysqli_real_escape_string($connect, trim());
		$script = $_SERVER['SCRIPT_NAME'];
		#the $find variable looks inside both the topic headings and content to see if they match the user chars
		$find = "SELECT * FROM $table WHERE  LIKE '%$search%' OR  LIKE '%$search%' ";
		$found = mysqli_query($connect, $find);
		echo "<table class='table table-condensed' border = '3'>
						<tr class = 'info'>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
						</tr>";
		while ($row = mysqli_fetch_array($found)) {
			$delete_id = $row[''];
			# These will all be the same which is the unique ID that validates each row in the table
			$edit_id = $row[''];
			$show_id = $row[''];
			echo "<tr class = 'success'>";
			# echo "<td>" . $row['topicID'] . "</td>";
			echo "<td>" . $row[''] . "</td>";
			# For each field to be shown in the table
			echo "<td>" . $row[''] . "</td>";
			echo "<td>" . $row[''] . "</td>";
			echo "<td> <form method='post' action='$script'>
						<input type='hidden' name='delete_id' value='$delete_id' />
						<input type='submit' name='delete' value='Delete' class='btn btn-danger btn-large'>
						</form> </td>";
			echo "<td>" . "<form method='post' action='$script'>
						<input type='hidden' name='edit_id' value='$edit_id' />
						<input type='submit' name='edit' value='Edit' class='btn btn-info btn-large'>
						</form>" . "</td>";
			echo "<td>" . "<form method='post' action='show.php'>
						<input type='hidden' name='show_id' value='$show_id' />
						<input type='submit' name='show' value='Show' class='btn btn-link btn-large'>
						</form>" . "</td>";
			echo "</tr>";
		}

		echo "</table>";
	} else {echo 'Please enter a keyword';
	}
}
?>