<?php
	session_start();
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
		img TEXT,
		PRIMARY KEY(id))";
	if (!mysqli_query($conn, $sql)) {
	echo "Error creating table: " . mysqli_error($conn);
	}
	$name = $_POST['name'];
	$category = $_POST['category'];
	$price = $_POST['price'];
	$img = $_POST['img'];
	$sql = "SELECT * FROM goods WHERE name='$name' and category='$category'";
	$result = mysqli_query($conn, $sql);
	echo mysqli_error($conn);
	$array = mysqli_fetch_array($result);
	if(!$array and $name and $price and $img)  {
		$sql = "INSERT INTO goods (name, category, price, img)
		VALUES ('$name', '$category', '$price', '$img')";
		$result = mysqli_query($conn, $sql);
		echo mysqli_error($conn);
		header("Location: ../../front_end/index.php");
	}
	else {
		$_SESSION['create_fail'] = 1;
		header("Location: ../../front_end/goods_front/create_goods.php");
	}
	mysqli_close($conn);
	}
?>