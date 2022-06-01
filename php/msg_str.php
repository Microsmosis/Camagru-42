<?php

	function msg_str($message)
	{
		?>
			<!DOCTYPE html>
			<html>
			<head>
				<link rel="preconnect" href="https://fonts.googleapis.com">
				<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
				<link href="https://fonts.googleapis.com/css2?family=Averia+Serif+Libre:ital,wght@1,700&display=swap" rel="stylesheet">
				<style>
					#errorMessage {
						text-align: center;
						font-size: 4rem;
						font-family: 'Averia Serif Libre', cursive;
						padding: 400px 0;
					}
				</style>
			</head>
			<body>
				<p id="errorMessage"><?php echo $message;?></p>
			</body>
		<?php
	}
?>