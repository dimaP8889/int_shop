<html><body>
<form action="../../back_end/goods_back/change_goods.php?name=<?php echo $_GET['name'] ?>&cat=<?php echo $_GET['cat']?>" method="post">
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