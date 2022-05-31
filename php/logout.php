<?php
	session_start();
	if($_SESSION['logged_in_user'] == "")
		header('Location: ./gallery.php');
	$_SESSION['logged_in_user'] = "";
	?>
			<!DOCTYPE html>
			<html>
				<head>
				<link rel="preconnect" href="https://fonts.googleapis.com">
				<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
				<link href="https://fonts.googleapis.com/css2?family=Averia+Serif+Libre:ital,wght@1,700&display=swap" rel="stylesheet">
				</head>
				<style>
						#message {
							text-align: center;
							font-size: 4rem;
							font-family: 'Averia Serif Libre', cursive;
							padding: 550px 0;
						}
				</style>
				<body>
					<p id="message">BYE BYE</p>
				</body>
			</html>
		<?php
	header('Refresh: 1; ../index.php');
?>