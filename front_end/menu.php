<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Menu</title>
	<link rel='stylesheet' href='menu.css'>
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
<div id="box"><img title="box" id="cartInfo" src="https://magazin-pixel.ru/themes/pxl/images/cart-big.png">
</div>
<?php
if ($_SESSION['logged_in'] == 0)
{
?>
<div id="log">
	<form action="log_front/log_in_h.html" method="post">
	<input class='but' type="submit" name="submit" value="Login"/></form>
	<form action="log_front/create.html" method="post">
	<input class='but' type="submit" name="submit" value="Register"/></form>
</div>
<?php
}
?>
</header>
</body>
</html>
<?php
print_r($_SESSION);
?>