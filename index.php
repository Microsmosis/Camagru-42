<?php
	session_start();
	require_once("config/setup.php");
?>

<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Lets go with something for now!</title>
		<style>
			
		</style>
	</head>
	<body>
		<form action="php/login.php" method="POST">
			Username: <input type="text" name="login" value=""/>
			<br/>
			Password: <input type="password" name="passwd" value=""/>
			<br/>
			<input type="submit" name="submit" value="OK"/>
		</form>
		<a href="html/create.html">Create a account</a><br />
	</body>
</html>