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
			html {
					background: rgb(249, 249, 249);
			}
			.backpanel {
				display: block;
				margin-top: 150px;
				margin-left: auto;
				margin-right: auto;
				background: linear-gradient(-180deg, #ffffff, #eaeaea,  #a7a7a8, #7a7a7afe);
				width: 240px;
				height: 500px;
				border-radius: 7px;
				box-shadow: 0.15vw 0.3vw 0.3vw hsl(0deg 0% 0% / 0.44);
				
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
				margin-left: 5px;
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
			#hrNavbar {
				width: 2800px;
				height: 0px;
				background: black;
				position: fixed;
				top: 60px;
				right: -1px;
			}
			.meta {
				width: 2800px;
				height: 80px;
				background: white;
				position: fixed;
				top: -10px;
				right: 0px;
			}
			#profile {
					position: fixed;
				top: 0.7%;
				left: 14%;
			}
			#addphoto {
				position: fixed;
				top: 0.7%;
				left: 47.8%;
			}
			#logout {
				position: fixed;
				top: 0.7%;
				left: 80%;
			}
			@media screen and (min-width: 300px) and (max-width: 450px) {
				#profile {
					position: fixed;
					top: 0.7%;
					left: 12%;
				}
				#addphoto {
					position: fixed;
					top: 0.7%;
					left: 42.8%;
				}
				#logout {
					position: fixed;
					top: 1%;
					left: 75%;
				}
				.backpanel {
					margin-top: 100px;
				}
		}
		@media screen and (min-width: 1500px) and (max-width: 2800px) {
				#profile {
					position: fixed;
					top: 0.7%;
					left: 12%;
				}
				#addphoto {
					position: fixed;
					top: 0.7%;
					left: 48.8%;
				}
				#logout {
					position: fixed;
					top: 1%;
					left: 80%;
				}
		}
		</style>
	</head>
	<body>
		<div class="meta"></div>
		<div class="redirects">
				<a id="profile" href="profile_page.php"><img src="../images/profile.png" width="50"></a>
				<a id="addphoto" href="photobooth.php"><img src="../images/camera.png" width="50"></a>
				<a id="logout" href="logout.php"><img src="../images/logout.png" width="45"></a>
		</div>
		<div class="backpanel">
			<form class="form" action="modify_user.php" method="POST">
					<br/>
					<br/>
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
					OLD PW TO SAVE CHANGES: <input class="unpw" type="password" name="current" value=""/>
					</br>
					<br/>
					<input class="form submit" type="submit" name="submit" value="OK"/>
					<br/>
			</form>
		<form class="form e" action="notifications.php" method="POST">
		&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspEMAIL NOTIFICATIONS</br></br><input class="notif" type="submit" name="off" value="OFF"/>&nbsp<input class="notifOn" type="submit" name="on" value="ON"/>
		</form>
		</div>
		<hr id="hrNavbar">
	</body>
</html>