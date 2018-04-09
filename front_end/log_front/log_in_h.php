<?php
session_start();
if ($_SESSION['wrong_pass'] == 1)
	echo "Wrong pass\n";
if ($_SESSION['wrong_pass'] == 2)
	echo "No User\n";
if ($_SESSION['register'] == 1)
	echo "Now you can log in\n";
$_SESSION['wrong_pass'] = 0;
$_SESSION['register'] = 0;
?>
<html><body>
<form action="../../back_end/log_back/log_in.php" method="post">
	Username : <input type="text" name="login" value="">
	<br />
	Password : <input type="text" name="passwd" value="">
	<input type="submit" name="submit" value="OK" />
</form>
</body></html>
