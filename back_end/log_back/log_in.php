<?php
	session_start();
	header("Content-Type: text/html");
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
		{
			$_SESSION['login'] = $array['login'];
			$_SESSION['role'] = $array['flag'];
			$_SESSION['logged_in'] = 1;
			header("Location: ../../front_end/menu.html");
			exit(1);
			echo "you Log In\n";
		}
	}
	else{
		echo "No User\n";
	}
	mysqli_close($conn);
	}
?>