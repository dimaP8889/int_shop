<?php
	if ($_POST['submit'] != 'OK')
		echo "ERROR\n";
	else {
	$conn = mysqli_connect("localhost", "root", "p0grebn", "site");
	if (!$conn)
		echo "No connection\n";
	$sql = "CREATE TABLE IF NOT EXISTS goods (
		id INT AUTO_INCREMENT,
		name TEXT,
		category TEXT,
		price INT,
		PRIMARY KEY(id))";
	if (!mysqli_query($conn, $sql)) {
	echo "Error creating table: " . mysqli_error($conn);
	}
	$name = $_POST['name'];
	$category = $_POST['category'];
	$price = $_POST['price'];
	$sql = "SELECT * FROM goods WHERE name='$name' and category='$category'";
	$result = mysqli_query($conn, $sql);
	echo mysqli_error($conn);
	$array = mysqli_fetch_array($result);
	if(!$array) {
		$sql = "INSERT INTO goods (name, category, price)
		VALUES ('$name', '$category', '$price')";
		$result = mysqli_query($conn, $sql);
		echo "New good added";
	}
	else {
		echo "Goods are already exist";
	}
	mysqli_close($conn);
	}
?>