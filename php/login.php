<?php
	require_once("auth.php");
	require_once('error_msg.php');
	session_start();
	$access = auth($_POST['login'], $_POST['passwd']);
	if ($access == 2)
	{
		$_SESSION['logged_in_user'] = $_POST['login'];
		header('Location: ./user_gallery.php');
	}
	else if ($access == 1)
	{
		header('Refresh: 3; login_form.php');
		error_msg(10);
	}
	else if ($access == 0)
	{
		header('Refresh: 3; login_form.php');
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
		<link href="https://fonts.googleapis.com/css2?family=Averia+Serif+Libre:ital,wght@1,700&display=swap" rel="stylesheet">
		<style>
			body {
				overflow-x: hidden;
				overflow-y: hidden;
			}
			#error {
				display: flex;
				align-items: center;
				justify-content: center;
				font-size: 2rem;
				font-family: 'Averia Serif Libre', cursive;
			}
		</style>
	</head>
	<body>

	</body>
</html>