<?php
	require_once('connect.php');
	session_start();
	if(isset($_GET['key']) && isset($_GET['reset']))
	{
		$username = $_GET['key'];
		$password = $_GET['reset'];
		$email = $_GET['mail'];
		try
			{
				$conn = connect();
				$sql = "SELECT userr_name, pass_word FROM user_info WHERE `email`='$email'";
				$stmt = $conn->query($sql);
				$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
				if ($result[0]['userr_name'] == $username && $result[0]['pass_word'] == $password)
						{
							echo ""; // fix this into something proper bro :D
						}
						else
						{
							echo "something went wrong". PHP_EOL;
						}
			}
			catch(PDOException $e)
			{
				echo $stmt . "<br>" . $e->getMessage();
			}
			$conn = null;
	}
	else
	{
		echo "something went wrong here too". PHP_EOL;
	}
?>

<!DOCTYPE html>
	<html>
		<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<title>Camagru</title>
			<link rel="preconnect" href="https://fonts.googleapis.com">
			<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
			<link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
			<link rel="preconnect" href="https://fonts.googleapis.com">
			<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
			<link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&family=Rampart+One&display=swap" rel="stylesheet">
			<link rel="preconnect" href="https://fonts.googleapis.com">
			<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
			<link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
			<link rel="preconnect" href="https://fonts.googleapis.com">
			<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
			<link href="https://fonts.googleapis.com/css2?family=Rubik+Glitch&display=swap" rel="stylesheet">
		</head>
		<style>
				body {
					overflow-x: hidden;
					overflow-y: hidden;
					animation: fadeInFromNone 2s ease-out;
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
				.anim {
					-webkit-animation: fadeOut 2s;
					animation: fadeOut 6s;
					animation-fill-mode: forwards;
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
					opacity: 0.2;
					-webkit-animation:spin 60s linear infinite;
					-moz-animation:spin 60s linear infinite;
					animation:spin 60s linear infinite;
				}
			#wf2 {
				position: fixed;
					top: 60vw;
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
				width: 8vw;
				background-color: rgba(255,255,255,0.07);
				border-radius: 0.7vw;
				padding: 0 0.4vw;
				margin-top: 0.4vw;
				font-size: 0.6vw;
				font-weight: 300;
				box-shadow: 0.2vw 0.2vw 0.2vw rgba(0, 0, 0, 0.618);
			}
			::placeholder {
				color: #e5e5e5;
			}
			button {
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
			/* 	position: absolute;
				top: 22vw;
				left: 45.2vw; */
				font-family: 'Fredoka One', cursive;
				color: #caa0ff;
				text-shadow: 0.15vw 0.1vw 0.1vw #000;
				font-size: 0.65vw;
				opacity: 0.9;
			}
			.submittor {
				font-family: 'Fredoka One', cursive;
				text-shadow: 0.15vw 0.1vw 0.1vw #000;
				width: 8.8vw;
			}
			#return {
				position: absolute;
				left: 1.5vw;
				font-family: 'Fredoka One', cursive;
				font-size: 1.5vw;
				color: rgba(124, 46, 250, 0.721);
			}
			.center {
				position: absolute;
				left: 50%;
				top: 50%;
				transform: translate(-50%, -50%);
			}
		</style>
	<body>
		<img id="wireframe" src="../images/wow.png">
		<img id="wf2" src="../images/wow.png">
		<div class="anim">
			<div id="sidePillar"></div>
			<h1 id="h3">CAMAGRU</h1>
			<h1>CAMAGRU</h1>
			<h1 id="h2">CAMAGRU</h1>
		</div>
			<div class="center">
				<form class="daForm" action="reset.php" method="POST">
					&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspNEW PASSWORD: <input type="password" name="passwd" value=""/>
					<br/>
					&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspVERIFY PASSWORD: <input type="password" name="re_passwd" value=""/>
					<input type="hidden" id="username" name="username" value='<?php echo $username;?>'>
					</br>
					<input class="submittor" type="submit" name="submit" value="OK"/>
					<br/>
				</form>
				<a id="return" href="../php/gallery.php">RETURN</a>
			</div>
	</body>
</html>