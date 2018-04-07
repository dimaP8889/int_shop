<?php
if ($_POST['submit'] != 'OK')
		echo "ERROR\n";
	else {
	$conn = mysqli_connect("localhost", "root", "p0grebn", "site");
	if (!$conn)
		echo "No connection\n";
	$sql = "CREATE TABLE IF NOT EXISTS bask (
		id INT AUTO_INCREMENT,
		name TEXT,
		category TEXT,
		quan INT,
		price INT,
		PRIMARY KEY(id))";
	if (!mysqli_query($conn, $sql)) {
	echo "Error creating table: " . mysqli_error($conn);
	}
	$name = $_POST['name'];
	$category = $_POST['category'];
	$sql = "SELECT * FROM goods WHERE name='$name' and category='$category'";
	$result = mysqli_query($conn, $sql);
	echo mysqli_error($conn);
	$array_g = mysqli_fetch_array($result);
	if(!$array_g) {
		echo "Choose other";
	}
	else {
		$sql = "SELECT * FROM bask 
		WHERE name='$name' and category='$category'";
		$result = mysqli_query($conn, $sql);
		$array_b = mysqli_fetch_array($result);
		if(!$array_b) {
			$price = $array_g[3];
			$quan = 1;
			$sql = "INSERT INTO bask (name, category, quan, price)
			VALUES ('$name', '$category', '$quan', '$price')";
			$result = mysqli_query($conn, $sql);
			echo mysqli_error($conn);
			echo "Succesfully add\n";
		}
		else {
			$sql = "SELECT * FROM bask WHERE name='$name' and category='$category'";
			$result = mysqli_query($conn, $sql);
			$array = mysqli_fetch_array($result, MYSQLI_NUM);
			$quan = $array[3] + 1;
			$sql = "UPDATE bask SET quan='$quan'
			WHERE name='$name' and category='$category'";
			$result = mysqli_query($conn, $sql);
			echo "add +1\n";
		}
	}
	mysqli_close($conn);
	}
?>