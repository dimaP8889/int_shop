<?php

function check_serial_a($database){
	$log = $_POST['login_a'];
	$pas = hash("whirlpool", $_POST['password_a']);
	$query = "SELECT * FROM `people` WHERE login='$log' OR pw='$pas' LIMIT 1";
	$row = mysqli_query($database, $query);
	$array = mysqli_fetch_array($row);
	if ($array)
		return (FALSE);
	return (TRUE);
}

function create_tables($mysql)
{
	mysqli_query($mysql, "CREATE TABLE IF NOT EXISTS people(
		id int(10) AUTO_INCREMENT,
		login varchar(255),
		pw varchar(255),
		flag varchar(255),
		PRIMARY KEY(id))");
	//var_dump(mysqli_error($mysql));
	mysqli_query($mysql, "CREATE TABLE IF NOT EXISTS bask(
		id int(10) AUTO_INCREMENT,
		name varchar(255),
		category varchar(255),
		quan  int(10),
		price int(10),
		PRIMARY KEY(id))");
	//var_dump(mysqli_error($mysql));
	mysqli_query($mysql, "CREATE TABLE IF NOT EXISTS goods(
		id int(10) AUTO_INCREMENT,
		name varchar(255),
		category varchar(255),
        price int(10),
        img varchar(255),
        PRIMARY KEY(id))");
	//var_dump(mysqli_error($mysql));
}




$login = $_POST['login'];


$password = $_POST['password'];


$connect = mysqli_connect("localhost", $login, $password);
mysqli_connect_error();
$sql="CREATE DATABASE IF NOT EXISTS site";
if (mysqli_query($connect, $sql))
	echo "Database created successfully <br />";
else
{
	echo "Error creating database\n\n";
	return ;
}


$admin_login = $_POST['login_a'];
$admin_password = hash("whirlpool", $_POST['password_a']);


$connect = mysqli_connect('localhost', $login, $password, 'site');
create_tables($connect);

if (mysqli_query($connect, $sql))
	echo "Table created successfully <br />";
else
{
	echo "Error creating table:\n\n";
}

$sql = "INSERT INTO `site`.`people` (`login`, `pw`, `flag`) VALUES ('$admin_login', '$admin_password', '1')";
if (check_serial_a($connect) == TRUE)
	echo "Admin added successfully <br />";
else
{
	echo "Error adding admin <br />";
}
?>

<form action="./index1.php" method="POST" class="form_login">
		<div>
			<input class="bouton" type="submit" name="submit" value="Back"/>
		</div>
</form>