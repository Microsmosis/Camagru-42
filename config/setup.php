<?php
$servername = "localhost";
$username = "root";
$password = "indigochild";
$dbname = "user_db";

try
{
	$conn = new PDO("mysql:host=$servername", $username, $password);
	// set the PDO error mode to exception
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "CREATE DATABASE IF NOT EXISTS user_db";
	// use exec() because no results are returned
	$conn->exec($sql);
	//echo "Database created successfully<br>";
}
catch(PDOException $e)
{
	echo $sql . "<br>" . $e->getMessage();
}
$conn = null;

try
{
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	// set the PDO error mode to exception
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	// sql to create table
	$sql = "CREATE TABLE IF NOT EXISTS `user_info` (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	email VARCHAR(100) NOT NULL,
	userr_name VARCHAR(20) NOT NULL,
	pass_word VARCHAR(150) NOT NULL,
	reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
	)";

	// use exec() because no results are returned
	$conn->exec($sql);
	//echo "Table user_info created successfully";
	
}
catch(PDOException $e)
{
	echo $sql . "<br>" . $e->getMessage();
}
$conn = null;

?>