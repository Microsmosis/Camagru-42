<?php
	session_start();
?>

<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Camagru</title>
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Rubik+Glitch&display=swap" rel="stylesheet">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@800&display=swap" rel="stylesheet">
	<style>
			body {
					overflow-x: hidden;
					overflow-y: hidden;
			}
			a {
				text-decoration: none;
 			}
			#wireframe {
					position: fixed;
					top: 1;
					left: 0vw;
					width: 100vw;
					height: 100vw;
					opacity: 0.1;
					-webkit-animation:spin 60s linear infinite;
					-moz-animation:spin 60s linear infinite;
					animation:spin 60s linear infinite;
				}
			#wf2 {
				position: fixed;
					top: 60vw;
					width: 100vw;
					height: 100vw;
					opacity: 0.1;
					-webkit-animation:spin 60s linear infinite;
					-moz-animation:spin 60s linear infinite;
					animation:spin 60s linear infinite;
				}
			#wf3 {
				position: fixed;
					top: 120vw;
					width: 100vw;
					height: 100vw;
					opacity: 0.1;
					-webkit-animation:spin 60s linear infinite;
					-moz-animation:spin 60s linear infinite;
					animation:spin 60s linear infinite;
				}
			@-moz-keyframes spin { 100% { -moz-transform: rotate(360deg); } }
			@-webkit-keyframes spin { 100% { -webkit-transform: rotate(360deg); } }
			@keyframes spin { 100% { -webkit-transform: rotate(360deg); transform:rotate(360deg); } }
			.backpanel {
				display: block;
				margin-top: 250px;
				margin-left: auto;
				margin-right: auto;
				background: linear-gradient(-180deg, #ffffff, #eaeaea,  #a7a7a8, #7a7a7afe);
				width: 240px;
				height: 360px;
				border-radius: 7px;
				box-shadow: 0.15vw 0.3vw 0.3vw hsl(0deg 0% 0% / 0.44);
			
			}
			@media screen and (min-width: 350px) and (max-width: 400px) {
				.backpanel {
					margin-top: 120px;
				}
			}
			.form {
				position: relative;
				font-family: ;
				margin-left: 40;
				margin-bottom: 35px;
				font-size: 0.6rem;
				font-family: 'Roboto', sans-serif;
			}
			.submit {
				margin-top: 50px;
				width: 70px;
				height: 60px;
				border-radius: 30px;
				background: white;
				box-shadow: 0.15vw 0.3vw 0.3vw hsl(0deg 0% 0% / 0.44);
			}
			.return {
				margin-left: 100px;
				color: white;
			}
			.forgot {
				margin-left: 66px;
				color: white;
			}
			.unpw {
				border-radius: 5px;
			}
			
		</style>
	</head>
	<body>
		<img id="wireframe" src="../images/wow.png">
		<img id="wf2" src="../images/wow.png">
		<img id="wf3" src="../images/wow.png">
		<div class="backpanel">
			<form class="form" action="login.php" method="POST">
				<br/>
				<br/>
				<br/>
				<br/>
				USERNAME: <input class="unpw" type="text" name="login" value=""/>
				<br/>
				<br/>
				PASSWORD: <input class="unpw" type="password" name="passwd" value=""/>
				<input class="form submit" type="submit" name="submit" value="LOG IN"/>
				<br/>
			</form>
			<a class="form forgot" href="../html/forgot_password.html">FORGOT PASSWORD?</a>
			</br>
			</br>
			<a class="form return" id="return" href="gallery.php">RETURN</a>
		</div>
	</body>
</html>