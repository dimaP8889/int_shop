<?php
	if ($_POST['submit'] != 'OK')
		echo "ERROR\n";
	else {
	$conn = mysqli_connect("localhost", "root", "p0grebn", "site");
	if (!$conn)
		echo "No connection\n";
	$name = $_POST['login'];
	$old_passwd = hash('whirlpool', $_POST['old_passwd']);
	$new_passwd = hash('whirlpool', $_POST['new_passwd']);
	$sql = "SELECT * FROM people WHERE login='$name' and pw='$old_passwd'";
	$result = mysqli_query($conn, $sql);
	echo mysqli_error($conn);
	$array = mysqli_fetch_array($result);
	if($array) {
		$sql = "UPDATE people SET pw='$new_passwd'
		WHERE login='$name'";
		echo mysqli_error($conn);
		$result = mysqli_query($conn, $sql);
		echo "pass change";
	}
	else {
		echo "wrong pass";
	}
	mysqli_close($conn);
	}
?>