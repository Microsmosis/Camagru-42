<?php
	session_start();
	header('Refresh: 4.8; ./php/gallery.html');
?>

<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Camagru</title>
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Rubik+Glitch&display=swap" rel="stylesheet">
		<style>
				body {
					-webkit-animation: fadeOut 5s;
					animation: fadeOut 5s;
					animation-fill-mode: forwards;
					overflow-x: hidden;
					overflow-y: hidden;
				}
				h1 {
				position: absolute;
				top: 10vw;
				left: 24vw;
				font-family: 'Rubik Glitch', cursive;
				font-size: 10vw;
				/* text-shadow: 0 0.5vw 0.15vw black; */
				color: black;
				opacity: 0.95;
				}
				#h2 {
					position: absolute;
					top: 9.1vw;
					left: 25.3vw;
					font-size: 9.8vw;
					text-shadow: 0.4vw 0.2vw 0.2vw black;
					color: white;
					opacity: 1;
				}
				#h3 {
					position: absolute;
					top: 7.5vw;
					left: 22.8vw;
					font-size: 10.2vw;
					/* text-shadow: 0.2vw 0.2vw 0.2vw black; */
					color: gray;
					opacity: 0.8;
				}
				@-webkit-keyframes fadeOut {
					0% { opacity: 1;}
					99% { opacity: 0.01;width: 100%; height: 100%;}
					100% { opacity: 0;width: 0; height: 0;}
				}
				@-moz-keyframes fadeOut {
					0% { opacity: 1;}
					99% { opacity: 0.01;width: 100%; height: 100%;}
					100% { opacity: 0;width: 0; height: 0;}
				}
				@keyframes fadeOut {
					0% { opacity: 1;}
					99% { opacity: 0.01;width: 100%; height: 100%;}
					100% { opacity: 0;width: 0; height: 0;}
				}
				#wireframe {
					position: fixed;
					top: 1;
					left: 0vw;
					width: 100vw;
					height: 100vw;
					opacity: 0.5;
					-webkit-animation:spin 60s linear infinite;
					-moz-animation:spin 60s linear infinite;
					animation:spin 60s linear infinite;
				}
			#wf2 {
				position: fixed;
					top: 60vw;
					width: 100vw;
					height: 100vw;
					opacity: 0.5;
					-webkit-animation:spin 60s linear infinite;
					-moz-animation:spin 60s linear infinite;
					animation:spin 60s linear infinite;
				}
				@-moz-keyframes spin { 100% { -moz-transform: rotate(360deg); } }
				@-webkit-keyframes spin { 100% { -webkit-transform: rotate(360deg); } }
				@keyframes spin { 100% { -webkit-transform: rotate(360deg); transform:rotate(360deg); } }
				#sidePillar { 
				position: absolute;
				background: linear-gradient(-90deg, #1336cf, #81d7ff, #ab34e2c7, #a908d1be);
				width: 100vw;
				height: 7vw;
				left: 0vw;
				top: 18vw;
				opacity: 0.3;
				border-radius: 0vw;
				box-shadow: 0vw 0.1vw 1vw white;
				}
		</style>
	</head>
	<body>
		<img id="wireframe" src="images/wow.png">
		<img id="wf2" src="images/wow.png">
		<div id="sidePillar"></div>
		<h1 id="h3">CAMAGRU</h1>
		<h1>CAMAGRU</h1>
		<h1 id="h2">CAMAGRU</h1>
	</body>
</html>