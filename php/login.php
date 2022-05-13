<?php
	require_once("auth.php");
	require_once('error_msg.php');
	session_start();
	$access = auth($_POST['login'], $_POST['passwd']);
	if ($access == 2)
	{
		header('Location: ../html/gallery.html');
	}
	else if ($access == 1)
	{
		header('Refresh: 5; ../index.php');
		error_msg(10);
	}
	else if ($access == 0)
	{
		header('Refresh: 5; ../index.php');
		error_msg(11);
	}
?>

<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Camagru</title>
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
				top: 2vw;
				left: 3vw;
				font-size: 5vw;
				font-family: 'Fredoka One', cursive;
			}
		</style>
	</head>
	<body>

	</body>
</html>