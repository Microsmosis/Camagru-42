<?php
	session_start();
	if($_SESSION['logged_in_user'] == "")
		header('Location: ./gallery.php');
?>

<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Camagru</title>
		
		<style>
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
				margin-top: 150px;
				margin-left: auto;
				margin-right: auto;
				background: linear-gradient(-180deg, #ffffff, #eaeaea,  #a7a7a8, #7a7a7afe);
				width: 240px;
				height: 560px;
				border-radius: 7px;
				box-shadow: 0.15vw 0.3vw 0.3vw hsl(0deg 0% 0% / 0.44);
				
			}
			@media screen and (min-width: 350px) and (max-width: 400px) {
				.backpanel {
					margin-top: 50px;
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
				
				width: 70px;
				height: 60px;
				border-radius: 30px;
				background: white;
				box-shadow: 4px 8px 8px hsl(0deg 0% 0% / 0.44);
				margin-top: 30px;
			}
			.notif {
				width: 70px;
				height: 20px;
				border-radius: 30px;
				background: white;
				box-shadow: 4px 8px 8px hsl(0deg 0% 0% / 0.44);
				
			}
			.notifOn {
				width: 70px;
				height: 20px;
				border-radius: 30px;
				background: white;
				box-shadow: 4px 8px 8px hsl(0deg 0% 0% / 0.44);

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
			.e {
				color: white;
			}
		</style>
	</head>
	<body>
		<img id="wireframe" src="../images/wow.png">
		<img id="wf2" src="../images/wow.png">
		<img id="wf3" src="../images/wow.png">
		<div class="backpanel">
			<form class="form" action="modify_user.php" method="POST">
					CHANGE E-MAIL: <input class="unpw" type="email" name="email" value=""/>
					<br/>
					<br/>
					CHANGE USERNAME: <input class="unpw" type="text" name="login" value=""/>
					<br/>
					<br/>
					CREATE NEW PASSWORD: <input class="unpw" type="password" name="passwd" value=""/>
					<br/>
					<br/>
					VERIFY PASSWORD: <input class="unpw" type="password" name="re_passwd" value=""/>
					</br>
					<br/>
					CURRENT PASSWORD TO SAVE CHANGES: <input class="unpw" type="password" name="current" value=""/>
					</br>
					<br/>
					<input class="form submit" type="submit" name="submit" value="OK"/>
					<br/>
			</form>
		<form class="form e" action="notifications.php" method="POST">
		&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspEMAIL NOTIFICATIONS</br></br><input class="notif" type="submit" name="off" value="OFF"/>&nbsp<input class="notifOn" type="submit" name="on" value="ON"/>
		</form>
		</div>
	</body>
</html>