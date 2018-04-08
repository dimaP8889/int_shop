<?php
	session_start();

	session_destroy();
	if ($_SESSION)
		unset($_SESSION);
	header("Location: index.php");
	exit;
?>