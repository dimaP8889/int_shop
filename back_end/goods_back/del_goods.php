<?php
	if ($_POST['submit'] != 'OK')
		echo "ERROR\n";
	else {
	$conn = mysqli_connect("localhost", "root", "p0grebn", "site");
	if (!$conn)
		echo "No connection\n";
	$name = $_POST['name'];
	$category = $_POST['category'];
	$sql = "SELECT * FROM goods WHERE name='$name' and category='$category'";
	$result = mysqli_query($conn, $sql);
	echo mysqli_error($conn);
	$array = mysqli_fetch_array($result);
	if($array) {
		$sql = "DELETE FROM goods 
		WHERE name = '$name' and category = '$category'";
		echo mysqli_error($conn);
		$result = mysqli_query($conn, $sql);
		echo "good deleted";
	}
	else {
		echo "wrong good";
	}
	mysqli_close($conn);
	}
?>