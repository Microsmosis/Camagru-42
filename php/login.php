<?php
	include("auth.php");
	session_start();
	$access = auth($_POST['login'], $_POST['passwd']);
	if ($access == 2)
	{
		header('Location: ../html/gallery.html');
	}
	else if ($access == 1)
	{
		header('Refresh: 5; ../index.php');
		?>
			<!DOCTYPE html>
				<html>
					<body>
						<p id="error">USER EMAIL NOT VERIFIED!</p>
					</body>
				</html>
		<?php
	}
	else if ($access == 0)
	{
		header('Refresh: 5; ../index.php');
		?>
			<!DOCTYPE html>
				<html>
					<body>
						<p id="error">USER DOES NOT EXIST OR PASSWORD IS INCORRECT !</p>
					</body>
				</html>
		<?php
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