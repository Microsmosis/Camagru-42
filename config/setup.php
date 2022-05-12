<?php
include("database.php");

try
{
	$conn = new PDO($DB_HOST, $DB_USER, $DB_PASSWORD);
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
	$conn = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
	// set the PDO error mode to exception
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	// sql to create table
	$sql = "CREATE TABLE IF NOT EXISTS `user_info` (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	email VARCHAR(100) NOT NULL,
	userr_name VARCHAR(20) NOT NULL,
	pass_word VARCHAR(250) NOT NULL,
	activation_code VARCHAR(255) NOT NULL,
	acti_stat int(11) NOT NULL,
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