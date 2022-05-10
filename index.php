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
				width: 100%;
				overflow-x: hidden;
				overflow-y: hidden;
			}
			h1 {
				position: absolute;
				left: 13.5vw;
				font-family: 'Rampart One', cursive;
				font-size: 14vw;
				text-shadow: 0 0 2px #000;
				color: rgba(255, 255, 255, 0.961);
				animation: fadeInFromNone 2.5s ease-out;
			}
			@keyframes fadeInFromNone {
						0% {
					display: none;
					opacity: 0;
				}

				1% {
					display: block;
					opacity: 0;
				}

				100% {
					display: block;
					opacity: 1;
				}
			}
			#hLayer {
				color: rgba(0, 0, 0, 0.977);
				font-size: 13.8vw;
			}
			.daForm {
				position: absolute;
				top: 32.5vw;
				left: 42vw;
				font-family: 'Permanent Marker', cursive;
			}
			#creation {
				position: absolute;
				top: 38vw;
				left: 41.5vw;
				font-family: 'Permanent Marker', cursive;
				font-size: 2vw;
				color: rgba(124, 46, 250, 0.721);
				text-shadow: 0 0 1px #000;
			}
			.submittor {
				font-family: 'Permanent Marker', cursive;
			}
			.okk {
				position: absolute;
				top: -0.1vw;
				left: 11vw;
				width: 3vw;
				height: 3vw;
				box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.618);
			}
			#hole {
				position: absolute;
				top: -20vw;
				left: 0vw;
				width: 100vw;
				height: 100vw;
				opacity: 0.2;
				-webkit-animation:spin 60s linear infinite;
				-moz-animation:spin 60s linear infinite;
				animation:spin 60s linear infinite;
			}
			@-moz-keyframes spin { 100% { -moz-transform: rotate(360deg); } }
			@-webkit-keyframes spin { 100% { -webkit-transform: rotate(360deg); } }
			@keyframes spin { 100% { -webkit-transform: rotate(360deg); transform:rotate(360deg); } }
		</style>
	</head>
	<body>
		<img id="hole" src="images/wow.png">
		<h1>CAMAGRU</h1>
		<h1 id="hLayer">CAMAGRU</h1>
		<form class="daForm" action="php/login.php" method="POST">
			Username: <input class="submittor" type="text" name="login" value=""/>
			<br/>
			<br/>
			Password: <input class="submittor" type="password" name="passwd" value=""/>
			<input class="submittor okk" type="submit" name="submit" value="OK"/>
		</form>
		<a id="creation" href="html/create.html">Create a account</a><br />
	</body>
</html>