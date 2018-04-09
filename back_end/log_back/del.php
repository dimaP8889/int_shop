<?php
	session_start();
	if ($_POST['submit'] != 'OK')
		echo "ERROR\n";
	else {
	$conn = mysqli_connect("localhost", "root", "p0grebn", "site");
	if (!$conn)
		echo "No connection\n";
	$name = $_SESSION['login'];
	$sql = "DELETE FROM people 
	WHERE login = '$name'";
	echo mysqli_error($conn);
	$result = mysqli_query($conn, $sql);
	session_destroy();
	if ($_SESSION)
		unset($_SESSION);
	header("Location: ../../front_end/index.php");
	exit;
	}
?>