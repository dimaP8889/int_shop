<?php
	session_start();
	if ($_SESSION['register'] == 2)
		echo "User exist, try other\n";
	$_SESSION['register'] = 0;
?>
<html><body>
<form action="../../back_end/log_back/create.php" method="post">
	Username : <input type="text" name="login" value="">
	<br />
	Password : <input type="text" name="passwd" value="">
	<input type="submit" name="submit" value="OK" />
</form>
</body></html>
