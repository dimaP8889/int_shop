<?php
	$conn = mysqli_connect("localhost", "root", "p0grebn", "site");
	if (!$conn)
		echo "No connection\n";
	$sql = "TRUNCATE TABLE bask";
	$result = mysqli_query($conn, $sql);
	echo mysqli_error($conn);
	mysqli_close($conn);
	header("Location: ../../front_end/index.php");
?>