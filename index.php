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
			h1 {
				position: absolute;
				top: -1vw;
				left: 14vw;
				font-family: 'Rampart One', cursive;
				font-size: 14vw;
				text-shadow: 0 10px 2px white;
				color: rgba(255, 251, 143, 0.911);
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
			.daForm {
				position: absolute;
				top: 28vw;
				left: 46.2vw;
				font-family: 'Fredoka One', cursive;
				color: #caa0ff;
				text-shadow: 0 0 2px #000;
			}
			.submittor {
				font-family: 'Fredoka One', cursive;
				text-shadow: 0 0 2px #000;
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
			/* log in form */

			form {
				/* height: 380px;
				width: 290px;
				background-color: rgba(255,255,255,0.13);
				position: absolute;
				transform: translate(-50%,-50%);
				top: 55vw;
				left: 55vw;
				border-radius: 10px;
				backdrop-filter: blur(10px);
				border: 2px solid rgba(255,255,255,0.1);
				box-shadow: 0 0 40px rgba(8,7,16,0.6);
				padding: 50px 35px; */
			}

			form * {
				font-family: 'Poppins',sans-serif;
				color: #ffffff;
				letter-spacing: 0.5px;
				outline: none;
				border: none;
			}
			form h3 {
			font-size: 32px;
			font-weight: 500;
			line-height: 42px;
			text-align: center;
			}
			label{
				display: block;
				margin-top: 30px;
				font-size: 16px;
				font-weight: 500;
			}
			input{
				display: block;
				height: 50px;
				width: 100%;
				background-color: rgba(255,255,255,0.07);
				border-radius: 3px;
				padding: 0 10px;
				margin-top: 8px;
				font-size: 14px;
				font-weight: 300;
				box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.618);
			}
			::placeholder{
				color: #e5e5e5;
			}
			button{
				margin-top: 50px;
				width: 100%;
				background-color: #ffffff;
				color: #080710;
				padding: 15px 0;
				font-size: 18px;
				font-weight: 600;
				border-radius: 5px;
				cursor: pointer;
				box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.618);
			}
		</style>
	</head>
	<body>
		<img id="hole" src="images/wow.png">
		<h1>CAMAGRU</h1>
		<form class="daForm" action="php/login.php" method="POST">
			&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp USERNAME: <input class="submittor" type="text" name="login" value=""/>
			<br/>
			&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp PASSWORD: <input class="submittor" type="password" name="passwd" value=""/>
			<br/>
			<input class="submittor okk" type="submit" name="submit" value="OK"/>
			<br/>
			<a href="html/create.html"><input class="submittor okk" type="button" name="submit" value="CREATE A ACCOUNT"/></a>
		</form>
	</body>
</html>