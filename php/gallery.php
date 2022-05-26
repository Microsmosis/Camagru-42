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
			.fotoform {
				position: absolute;
				top: 25vw;		}
			#submittor {
				width: 9vw;
				background-color: beige;
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
			.login {
				position: absolute;
				left: 1%;
				top: 50%;
				transform: translate(-50%, -1%);
				font-family: 'Work Sans', sans-serif;
				/* text-shadow: 0.3vw 0.3vw 0.1vw rgba(29, 29, 29, 0.562); */
				font-size: 1.2vw;
				color: black;
				opacity: 0.7;
				text-decoration: none;
			}
			.signup {
				position: absolute;
				left: 99%;
				top: 50%;
				transform: translate(-50%, -99%);
			}
			#l1 {
				position: absolute;
				top: 50%;
			}
			#l2 {
				position: absolute;
				top: 52%;
			}
			#l3 {
				position: absolute;
				top: 54%;
			}
			#l4 {
				position: absolute;
				top: 56%;
			}
			#l5 {
				position: absolute;
				top: 58%;
			}
			#s1 {
				position: absolute;
				top: 50%;
			}
			#s2 {
				position: absolute;
				top: 52%;
			}
			#s3 {
				position: absolute;
				top: 54%;
			}
			#s4 {
				position: absolute;
				top: 56%;
			}
			#s5 {
				position: absolute;
				top: 58%;
			}
			#s6 {
				position: absolute;
				top: 60%;
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
			#mainPic {
				position: fixed;
				top: 37%;
				left: 42%;
				width: 20vw;
				height: 20vw;
			}
		</style>
	</head>
	<body>
		<div class="header sticky" id="myHeader">
			<p id="hh"> CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU   CAMAGRU   CAMAGRU   CAMAGRU</p>
			<p id="hf"> CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU   CAMAGRU   CAMAGRU   CAMAGRU</p>
		</div>
			<div class="redirects">
				<a class="login" id="l1" href="login_form.php">L</a>
				<a class="login" id="l2" href="login_form.php">O</a>
				<a class="login" id="l3" href="login_form.php">G</a>
				<a class="login" id="l4" href="login_form.php">I</a>
				<a class="login" id="l5" href="login_form.php">N</a>
				<a class="login signup" id="s1" href="../html/create.html">S</a>
				<a class="login signup" id="s2" href="../html/create.html">I</a>
				<a class="login signup" id="s3" href="../html/create.html">G</a>
				<a class="login signup" id="s4" href="../html/create.html">N</a>
				<a class="login signup" id="s5" href="../html/create.html">U</a>
				<a class="login signup" id="s6" href="../html/create.html">P</a>
			</div>
	<!-- 	<form class="fotoform" action="add_foto.php" method="POST" enctype="multipart/form-data">
			Photo: <input type="file" name="photo">
			<br>
			<br>
			<input id="submittor" type="submit" value="Add">
		</form> 	THIS IS A FORM TO ADD A PICTURE!!!! DONT DELETE !!! -->
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