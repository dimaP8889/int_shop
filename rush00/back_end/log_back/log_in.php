<?php
	if ($_POST['submit'] != 'OK')
		echo "ERROR\n";
	else {
	$conn = mysqli_connect("localhost", "root", "p0grebn", "site");
	if (!$conn)
		echo "No connection\n";
	$name = $_POST['login'];
	$passwd = hash('whirlpool', $_POST['passwd']);
	$sql = "SELECT * FROM people WHERE login='$name'";
	$result = mysqli_query($conn, $sql);
	echo mysqli_error($conn);
	$array = mysqli_fetch_array($result);
	if ($array) {
		$sql = "SELECT * FROM people WHERE pw='$passwd'";
		$result = mysqli_query($conn, $sql);
		$array = mysqli_fetch_array($result);
		if(!$array) {
			echo "Wrong pass\n";
		}
		else
			echo "you Log In\n";
	}
	else {
		echo "No User\n";
	}
	mysqli_close($conn);
	}
?>