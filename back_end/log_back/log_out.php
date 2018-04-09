<?php
	session_start();

	session_destroy();
	if ($_SESSION)
		unset($_SESSION);
	header("Location: ../../front_end/index.php");
	exit;
?>