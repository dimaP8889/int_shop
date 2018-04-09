<?php
	session_start();
	if ($_POST['submit'] != 'OK')
		echo "ERROR\n";
	else {
	$conn = mysqli_connect("localhost", "root", "p0grebn", "site");
	if (!$conn)
		echo "No connection\n";
	$name = $_GET['name'];
	$category = $_GET['cat'];
	$nm = $_POST['name'];
	$cat = $_POST['category'];
	$pc = $_POST['price'];
	$img = $_POST['img'];
	if ($_POST['name']) {
		$sql = "UPDATE goods SET name='$nm'
		WHERE name='$name' and category = '$category'";
		$result = mysqli_query($conn, $sql);
		echo mysqli_error($conn);
	}
	if ($_POST['category']) {
		$sql = "UPDATE goods SET category='$cat'
		WHERE name='$name' and category = '$category'";
		$result = mysqli_query($conn, $sql);
		echo mysqli_error($conn);
	}
	if ($_POST['price']) {
		$sql = "UPDATE goods SET price='$pc'
		WHERE name='$name' and category = '$category'";
		$result = mysqli_query($conn, $sql);
		echo mysqli_error($conn);
	}
	if ($_POST['img']) {
		$sql = "UPDATE goods SET img='$img'
		WHERE name='$name' and category = '$category";
		$result = mysqli_query($conn, $sql);
		echo mysqli_error($conn);
	}
	mysqli_close($conn);
	header("Location: ../../front_end/index.php");
	}
?>