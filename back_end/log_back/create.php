<?php
	if ($_POST['submit'] != 'OK')
		echo "ERROR\n";
	else {
	$conn = mysqli_connect("localhost", "root", "p0grebn", "site");
	if (!$conn)
		echo "No connection\n";
	$sql = "CREATE TABLE IF NOT EXISTS people (
		id INT AUTO_INCREMENT,
		login TEXT,
		pw TEXT,
		PRIMARY KEY(id))";
	if (!mysqli_query($conn, $sql)) {
	echo "Error creating table: " . mysqli_error($conn);
	}
	$name = $_POST['login'];
	$passwd = hash('whirlpool', $_POST['passwd']);
	$sql = "SELECT * FROM people WHERE login='$name'";
	$result = mysqli_query($conn, $sql);
	echo mysqli_error($conn);
	$array = mysqli_fetch_array($result);
	if(!$array) {
		$sql = "INSERT INTO people (login, pw)
		VALUES ('$name', '$passwd')";
		$result = mysqli_query($conn, $sql);
		echo "Now you can log in";
	}
	else { 
		echo "User is already exist";
	}
	mysqli_close($conn);
	}
?>