<?php
	session_start();
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
		$sql1 = "SELECT * FROM people WHERE pw='$passwd'";
		$result1 = mysqli_query($conn, $sql1);
		$array1 = mysqli_fetch_array($result1);
		if(!$array1) {
			$_SESSION['wrong_pass'] = 1;
			header("Location: ../../front_end/log_front/log_in_h.php");
			exit;
		}
		else
		{
			$_SESSION['wrong_pass'] = 0;
			$_SESSION['login'] = $array['login'];
			$_SESSION['role'] = $array['flag'];
			$_SESSION['logged_in'] = 1;
			if ($_SESSION['login'] == "dima")
				$_SESSION['admin'] = 1;
			
			header("Location: ../../front_end/index.php");
			exit;
		}
	}
	else{
		$_SESSION['wrong_pass'] = 2;
		header("Location: ../../front_end/log_front/log_in_h.php");
		exit;
	}
	mysqli_close($conn);
	}
?>