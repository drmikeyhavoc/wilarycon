<?php
function edit($connect) {
	if (isset($_POST["edit_id"])) {
		$edit = mysqli_real_escape_string($connect, $_POST['edit_id']);
		$script = htmlspecialchars($_SERVER['SCRIPT_NAME']);
		$query = "SELECT * FROM Topic WHERE id = '$edit' ";
		$result = mysqli_query($connect, $query);
		$details = mysqli_fetch_array($result);

		$savedfieldOne = $details[""];
		$savedfieldTwo = $details[""];
		echo "<form method='post' class='well' action='$script'>
			<input type='hidden' name='edit_field' value='$edit'>
			<label style='font-style: italic; font-weight: bolder';>Write something here:</label>
			<br>
			<input type='text' name='field_edit' class='input-lg' size='30' value ='$savedfieldOne'></input>
			<br>
			<label>Write something here:</label>
			<br>
			<textarea name='anotherField_edit' rows='10' cols='50' class='form-horizontal'>$savedFieldTwo</textarea></br>
			<input type='submit' name='amend' value='Amend' class='btn btn-info btn-default'/>
			<br>
			<label>Press the &nbsp;<kbd>Back</kbd>&nbsp;button to go back to homepage</label>
			<br>
			<input type='submit' name='back' value='Back' class='btn btn-danger btn-default'/>
	</form>
			<form method='post'action='index.php'>
			<label>Press the &nbsp;<kbd>Back</kbd>&nbsp;button to go back to homepage</label>
			<br>
			<input type='submit' name='back' value='Back' class='btn btn-danger btn-default'/>
	</form>";
	}
}

#The updateTopic function updates the existing information for the topic with the new information the user has amended
function updateTopic($connect, $table) {
	if (isset($_POST['edit_field'])) {
		$id = mysqli_real_escape_string($connect, $_POST['edit_field']);
		$fieldOne= $_POST['field_edit'];
		$fieldTwo = $_POST['anotherField_edit'];
		$update = "UPDATE $table
					SET fieldname= '$fieldOne', fieldnameTwo='$fieldTwo'
					WHERE topic_id = $id";
		$success = mysqli_query($connect, $update);
		if ($success) {
			echo "<h3>Write something here</h3>";
			echo "<form method='post' class='well' action='index.php'>
			<label>Press the &nbsp;<kbd>Back</kbd>&nbsp;button to go back to the homepage</label>
			<br>
			<input type='submit' name='back' value='Back' class='btn btn-danger btn-default'>
			</form>";
		} else {"Update Failed";
		}
	} else {echo 'Something here';
	};
}
?>