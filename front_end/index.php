<?php
	session_start();
	$conn = mysqli_connect("localhost", "root", "p0grebn", "site");
	if (!$conn)
		echo "No connection\n";
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Drug shop</title>
</head>
<body>
  <header>
    <nav role="navigation">
      <div id="menuToggle">
        <input type="checkbox" />
        <span></span>
        <span></span>
        <span></span>
        <ul id="menu">
          <a href="#"><li>Home</li></a>
          <a href="#"><li>About</li></a>
          <a href="#"><li>Info</li></a>
          <a href="#"><li>Contact</li></a>
          <a href="https://erikterwan.com/" target="_blank"><li>Show me more</li></a>
        </ul>
      </div>
    </nav>
    <p align="center">Drug store</p>
    <a href="#basket"><div id="box"><img title="box" id="cartInfo" src="https://magazin-pixel.ru/themes/pxl/images/cart-big.png">
      <div id="basket" class="overlay">
        <div class="popup">
          <h3 align="center">Basket</h3>
          <a class="close" href="#">&times;</a>
          <div class="order info">
          	<?php $sql = "SELECT * FROM bask";
				echo mysqli_error($conn);
				$result = mysqli_query($conn, $sql);
				while ($res = mysqli_fetch_assoc($result)) :
			?>
            <p>Product title:<?php echo $res['name']?></p>
            <p>Quantity: <?php echo $res['quan']?></p>
            <p>Price: <?php echo $res['price']?></p>
            <?php $sum += $res['quan'] * $res['price'] ?>
        <?php endwhile ?>
          </div>
          <p>Summary: <?php echo $sum?></p>
          <form action="../../back_end/bask_back/clear_bask.php" method="post">
  					<input type="submit" name="submit" value="DEL" />
				</form>
        </div>
      </div>
    </div></a>
<?php
if ($_SESSION['logged_in'] == 0)
{
?>
<link rel='stylesheet' href='style.css'>
<div align="middle" id="log">
    <form action="log_front/log_in_h.php" method="post">
    <input class='but' type="submit" name="submit" value="Login"/></form>
    <form action="log_front/create.php" method="post">
    <input class='but' type="submit" name="submit" value="Register"/></form>
</div>
<?php
}
else 
{
    ?>
    <link rel='stylesheet' href='style.css'>
    <div align="middle" id="log">
        <form action="../back_end/log_back/log_out.php" method="post">
        <input class='but' type="submit" name="submit" value="Log Out"/></form>
        <form action="log_front/change.php" method="post">
        <input class='but' type="submit" name="submit" value="Change Pass"/></form>
        <form action="log_front/del.php" method="post">
        <input class='but' type="submit" name="submit" value="Delete"/></form>
    </div>
    <?php
    if ($_SESSION['admin'] == 1)
    {
    	?>
    	<div align="middle" id="adm">
        <form action="goods_front/create_goods.php" method="post">
        <input class='but' type="submit" name="submit" value="Create"/></form>
       </div>
       <div align="middle"  id="adm1">
        <form action="goods_front/del_goods.php" method="post">
        <input class='but' type="submit" name="submit" value="DEL"/></form>
      </div>
        <?php
    }
}
$sql = "SELECT * FROM goods";
echo mysqli_error($conn);
$result = mysqli_query($conn, $sql);
while ($res = mysqli_fetch_assoc($result)){
        $arr[] = $res['category'];
}
$arr = array_unique($arr);
?>
  </header>
  <div class="main">
  	<?php $i = 1;foreach($arr as $num) {?>
    <div class="category-container">
      <h2 align="center"><?php  echo $num?></h2>
	     <div class="category">
	     	<?php $sql = "SELECT * FROM goods 
                    WHERE category = '$num'";
                echo mysqli_error($conn);
                $result = mysqli_query($conn, $sql);
            while ($res = mysqli_fetch_assoc($result)): ?>
   			<div class="list-item">
   	  			<a href="#popup<?php echo $i?>"><h2><?php  echo $res['name']?></h2></a>
   	  			<div class="image-container"><img src=<?php  echo $res['img']?> alt="" /></div>
            <div id="popup<?php echo $i?>" class="overlay">
              <div class="popup">
                <h3><?php  echo $res['name']?></h3>
                <a class="close" href="#">&times;</a>
                <img src=<?php  echo $res['img']?> alt="" />
                <p>Name :<?php  echo $res['name']?></p>
                <p>Price :<?php  echo $res['price']?></p>
                <form action="../../back_end/bask_back/add_goods_bask.php?name=<?php  echo $res['name']?>&cat=<?php  echo $res['category']?>" method="post">
  					<input type="submit" name="submit" value="add" />
				</form>
				<?php if ($_SESSION['admin'] == 1) {?>
				 <form action="goods_front/change_goods.php?name=<?php  echo $res['name']?>&cat=<?php  echo $res['category']?>" method="post">
  					<input type="submit" name="submit" value="change" />
  				<?php }?>
				</form>
              </div>
            </div>
   			</div>
   			<?php $i++; endwhile ?>
		</div>
  </div>
  <?php }?>
</div>
<footer>
  <p align="center">developed with <3 by <a href="https://profile.intra.42.fr/users/dpogrebn">dpogrebn</a> & <a href="https://profile.intra.42.fr/users/eyevresh">eyevresh</a></p>
</footer>
</body>
</html>