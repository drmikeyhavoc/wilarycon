<?php
$connect = "";
$table = "";
function deleteItem($connect, $table) {
	if (isset($_POST['id'])) {# unique id of the row to delete. Usually hidden form etc
		$id_to_delete = mysqli_real_escape_string($connect, $_POST['id']);
		#Same here
		$delete = "DELETE FROM $table WHERE id of table row =$id_to_Delete";
		$success = mysqli_query($connect, $delete);
		if ($success) {header("Location: index.php");
			#probably change this to link not header
		} else {"Could not delete record";
		}
	} else {echo 'Not Found';
	}
}
?>