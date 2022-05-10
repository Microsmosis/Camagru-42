<?php
	include("auth.php");
	session_start();
	if (auth($_POST['login'], $_POST['passwd']))
	{
		header('Location: ../html/gallery.html');
	}
	else
	{
		header('Refresh: 5; ../index.php');
	}
?>

<html>
<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Lets go with something for now!</title>
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
		<style>
			body {
				background: linear-gradient(-25deg, #fffd81, #f9b05c, #88d7f1, #f3aff7);
				width: 100%;
				overflow-x: hidden;
				overflow-y: hidden;
			}
			#error {
				position: absolute;
				top: 1vw;
				left: 6vw;
				font-size: 8vw;
				font-family: 'Fredoka One', cursive;
			}
		</style>
	</head>
	<body>
			<p id="error">USER DOES NOT EXIST OR PASSWORD IS INCORRECT !</p>
	</body>
</html>
