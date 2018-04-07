<?php
	if ($_POST['submit'] != 'OK')
		echo "ERROR\n";
	else {
	$conn = mysqli_connect("localhost", "root", "p0grebn", "site");
	if (!$conn)
		echo "No connection\n";
	$name = $_POST['name'];
	$category = $_POST['category'];
	$sql = "SELECT * FROM bask WHERE name='$name' and category='$category'";
	$result = mysqli_query($conn, $sql);
	echo mysqli_error($conn);
	$array = mysqli_fetch_array($result);
	if($array) {
		$quan = $array[3];
		if ($quan < 2) {
		$sql = "DELETE FROM bask 
		WHERE name = '$name' and category = '$category'";
		echo mysqli_error($conn);
		$result = mysqli_query($conn, $sql);
		echo "good deleted";
		}
		else {
			$quan--;
			$sql = "UPDATE bask SET quan='$quan'
			WHERE name='$name' and category='$category'";
			$result = mysqli_query($conn, $sql);
			echo mysqli_error($conn);
			echo "-1\n";
		}
	}
	else {
		echo "wrong good";
	}
	mysqli_close($conn);
	}
?>