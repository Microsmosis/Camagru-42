<?php
	session_start();
	//print $_SESSION['logged_in_user'];
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
				background: white;
				animation: fadeInFromNone 2s ease-out;
			}
			#hh {
				position: fixed;
				top: 0;
				left: 1.8%;
				font-family: 'Rubik Glitch', cursive;
				font-size: 0.88vw;
				color: black;
				opacity: 0.7;
			}
			#hf {
				position: fixed;
				bottom: 0;
				left: 1.8%;
				font-family: 'Rubik Glitch', cursive;
				font-size: 0.88vw;
				color: black;
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
					opacity: 1;
				}
			}
			
			/* Style the header */
			.header {
/* 			padding: 10px 16px; */
			background: rgb(255, 255, 255);
			color: #f1f1f1;
			}

			/* The sticky class is added to the header with JS when it reaches its scroll position */
			.sticky {
			position: fixed;
			top: 0;
			width: 100%
			}

			/* Add some top padding to the page content to prevent sudden quick movement (as the header gets a new position at the top of the page (position:fixed and top:0) */
			.sticky + .content {
			padding-top: 102px;
			}
			.modForm {
				position: fixed;
				top: 10rem;
			}
		</style>
	</head>
	<body>
		<div class="header sticky" id="myHeader">
			<p id="hh"> CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU   CAMAGRU   CAMAGRU   CAMAGRU</p>
			<p id="hf"> CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU   CAMAGRU   CAMAGRU   CAMAGRU</p>
		</div>
		<form class="modForm" action="modify_user.php" method="POST">
				CHANGE E-MAIL: <input type="email" name="email" value=""/>
				<br/>
				<br/>
				CHANGE USERNAME: <input type="text" name="login" value=""/>
				<br/>
				<br/>
				CREATE NEW PASSWORD: <input type="password" name="passwd" value=""/>
				<br/>
				<br/>
				VERIFY PASSWORD: <input type="password" name="re_passwd" value=""/>
				</br>
				<br/>
				CURRENT PASSWORD TO SAVE CHANGES: <input type="password" name="re_passwd" value=""/>
				</br>
				<br/>
				<input class="submittor" type="submit" name="submit" value="OK"/>
				<br/>
		</form>
	</body>
</html>

<script>// When the user scrolls the page, execute myFunction
window.onscroll = function() {myFunction()};

// Get the header
var header = document.getElementById("myHeader");

// Get the offset position of the navbar
var sticky = header.offsetTop;

// Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}
</script>