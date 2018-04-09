<?php
	session_start();
	if ($_SESSION['create_fail'] == 1)
		echo "try again";
	$_SESSION['create_fail'] = 0;
?>
<html><body>
<form action="../../back_end/goods_back/create_goods.php" method="post">
	Name : <input type="text" name="name" value="">
	<br />
	Category : <input type="text" name="category" value="">
	<br />
	Price : <input type="text" name="price" value="">
	<br />
	Url : <input type="text" name="img" value="">
	<input type="submit" name="submit" value="OK" />
</form>
</body></html>
