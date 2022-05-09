<?php
	session_start();
	require_once("config/setup.php");
?>

<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Lets go with something for now!</title>
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
		<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&family=Rampart+One&display=swap" rel="stylesheet">
		<style>
			body {
				background: linear-gradient(-25deg, #fffd81, #f9b05c, #88d7f1, #f3aff7);
			}
			h1 {
				position: absolute;
				left: 13.5vw;
				font-family: 'Rampart One', cursive;
				font-size: 14vw;
			}
			.daForm {
				position: absolute;
				top: 32.5vw;
				left: 44vw;
				font-family: 'Permanent Marker', cursive;
			}
			#creation {
				position: absolute;
				top: 37vw;
				left: 42.5vw;
				font-family: 'Permanent Marker', cursive;
				font-size: 2vw;
			}
			.submittor {
				font-family: 'Permanent Marker', cursive;
			}
			.okk {
				position: absolute;
				top: -0.05vw;
				left: 11vw;
				width: 3vw;
				height: 3vw;
			}
		</style>
	</head>
	<body>
		<h1>CAMAGRU</h1>
		<form class="daForm" action="php/login.php" method="POST">
			Username: <input class="submittor" type="text" name="login" value=""/>
			<br/>
			<br/>
			Password: <input class="submittor" type="password" name="passwd" value=""/>
			<br/>
			<br/>
			<input class="submittor okk" type="submit" name="submit" value="OK"/>
		</form>
		<a id="creation" href="html/create.html">Create a account</a><br />
	</body>
</html>