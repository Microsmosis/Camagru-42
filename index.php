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
		<link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&family=Rampart+One&display=swap" rel="stylesheet">
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
			/* header effects and styling */
			h1 {
				position: absolute;
				top: -1vw;
				left: 14vw;
				font-family: 'Rampart One', cursive;
				font-size: 14vw;
				text-shadow: 0 0.5vw 0.15vw white;
				color: rgba(255, 251, 143, 0.911);
				animation: fadeInFromNone 3.5s ease-out;
				opacity: 0.7;
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
					opacity: 0.7;
				}
			}
			#hLayer {
				position: absolute;
				font-family: 'Rampart One', cursive;
				top: -0.5vw;
				left: 14vw;
				color: rgba(248, 141, 47, 0.855);
				text-shadow: 0 0 0.1vw white;
				font-size: 13.9vw;
				animation: fadeInFromNone 2.5s ease-out;
				opacity: 0.7;
				
			}
			/* background animation */
			#wireframe {
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
			/* log in form */
			form * {
				font-family: 'Poppins',sans-serif;
				color: #ffffff;
				letter-spacing: 0.05vw;
				outline: none;
				border: none;
			}
			input{
				display: block;
				height: 1.8vw;
				width: 7.6vw;
				background-color: rgba(255,255,255,0.07);
				border-radius: 0.7vw;
				padding: 0 0.4vw;
				margin-top: 0.4vw;
				font-size: 0.6vw;
				font-weight: 300;
				box-shadow: 0.2vw 0.2vw 0.2vw rgba(0, 0, 0, 0.618);
			}
			::placeholder{
				color: #e5e5e5;
			}
			button{
				margin-top: 5vw;
				width: 7.2vw;
				background-color: #ffffff;
				color: #080710;
				padding: 0.6vw 0;
				font-size: 18px;
				font-weight: 600;
				border-radius: 0.7vw;
				cursor: pointer;
				box-shadow: 0.2vw 0.2vw 0.2vw rgba(0, 0, 0, 0.618);
			}
			.daForm {
				position: absolute;
				top: 28vw;
				left: 46.2vw;
				font-family: 'Fredoka One', cursive;
				color: #caa0ff;
				text-shadow: 0.15vw 0.1vw 0.1vw #000;
				font-size: 0.65vw;
				opacity: 0.9;
			}
			.submittor {
				font-family: 'Fredoka One', cursive;
				text-shadow: 0.15vw 0.1vw 0.1vw #000;
			}
			/* background effects */
			#pillar {
				position: absolute;
				background: linear-gradient(-25deg, white, purple);
				width: 75.95vw;
				height: 50vw;
				top: 0vw;
				left: 11.7vw;
				opacity: 0.3;
				border-radius: 15vw;
			}
			#sidePillar { 
				position: absolute;
				background: blue;
				width: 100vw;
				height: 14vw;
				bottom: 22vw;
				left: 0vw;
				opacity: 0.1;
				border-radius: 0vw;
				box-shadow: 0vw 0.1vw 1vw white;
			}
		</style>
	</head>
	<body>
		<div id="pillar"></div>
		<div id="sidePillar"></div>
		<img id="wireframe" src="images/wow.png">
		<h1>CAMAGRU</h1>
		<h1 id="hLayer">CAMAGRU</h1>
		<form class="daForm" action="php/login.php" method="POST">
			&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp USERNAME: <input class="submittor" type="text" name="login" value=""/>
			<br/>
			&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp PASSWORD: <input class="submittor" type="password" name="passwd" value=""/>
			<br/>
			<input class="submittor" type="submit" name="submit" value="LOG IN"/>
			<br/>
			<a href="html/create.html"><input class="submittor" type="button" name="submit" value="CREATE A ACCOUNT"/></a>
		</form>
	</body>
</html>