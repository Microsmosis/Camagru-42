<?php
	require_once('acti_auth.php');
	require_once('status_update.php');
	if(!empty($_GET['code']) && isset($_GET['code']))
	{
		$code = $_GET['code'];
		$status = acti_auth($code);
		if ($status == 1)
		{
			status_update($code);
			?>
				<!DOCTYPE html>
				<html>
					<body>
						<p id="success">EMAIL VERIFIED! YOU WILL BE REDIRECTED TO THE LOG IN PAGE.</p>
						<a id="return" href="../index.php">TO LOG IN</a><br />
					</body>
				</html>
			<?php
			header('Refresh: 5; ../index.php');
		}
		else
		{
			echo "error error beep boop think about all the edgecases!!!";
			// if user has already activated account? does this even matter
			// if activation code does not exist or is wrong
		}
	}
	else
	{
		echo "No activation code was sent. Please contact web minister overlord llonnrot.";
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
				#success {
					position: absolute;
					top: 1vw;
					left: 6vw;
					font-size: 8vw;
					font-family: 'Fredoka One', cursive;
				}
				#return {
					position: absolute;
					font-size: 2vw;
					font-family: 'Fredoka One', cursive;
					top: 44vw;
					left: 46vw;
				}
			</style>
		</head>
		<body>
			
		</body>
	</html>