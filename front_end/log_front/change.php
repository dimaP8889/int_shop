<?php
	session_start();
	if ($_SESSION['change_pass'] == 1)
		echo "Successfully changed\n";
	if ($_SESSION['change_pass'] == 2)
		echo "Wrong Pass\n";
	$_SESSION['change_pass'] == 0;
?>
<html><body>
<form action="../../back_end/log_back/change.php" method="post">
	Old Password : <input type="text" name="old_passwd" value="">
	<br />
	New Password : <input type="text" name="new_passwd" value="">
	<input type="submit" name="submit" value="OK" />
</form>
</body></html>