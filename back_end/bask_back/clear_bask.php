<?php
	if ($_POST['submit'] != 'OK')
		echo "ERROR\n";
	else {
	$sql = "DELETE TABLE IF EXISTS bask";
	$result = mysqli_query($conn, $sql);
	echo "bask";
	echo mysqli_error($conn);
	mysqli_close($conn);
	}
?>