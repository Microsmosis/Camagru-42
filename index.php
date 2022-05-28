<?php
	session_start();
	require_once("config/setup.php");
	if ($_SESSION['logged_in_user'] != "")
		header('Location: ./php/user_gallery.php');
?>

<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Camagru</title>
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Averia+Serif+Libre:ital,wght@1,700&display=swap" rel="stylesheet">
		<style>
				a {
					text-decoration: none;
					color: black;
				}
				body {
					padding: 0;
					margin: 0;
					height: 100vh;
					overflow-x: hidden;
				}
				#camagru {
					font-family: 'Averia Serif Libre', cursive;
					font-size: 4rem;
					position: absolute;
					transform: translate(-0%, -0%);
					transition: 1.1s ease-out;
				}
			
				.image {
					width: 100px;
					position: fixed;
				}
				
				.box {
					width: 700px;
					color: white;
				}
		</style>
	</head>
	<body>
		<div id="camagru">
			<a href="php/gallery.php">CAMAGRU<img class="image" src="images/wow.png"></a>
		</div>
	</body>
</html>

<script>
let myDiv = document.getElementById("camagru");
//Detect touch device
function isTouchDevice() {
  try {
    //We try to create TouchEvent. It would fail for desktops and throw error
    document.createEvent("TouchEvent");
    return true;
  } catch (e) {
    return false;
  }
}
const move = (e) => {
  //Try, catch to avoid any errors for touch screens (Error thrown when user doesn't move his finger)
  try {
    //PageX and PageY return the position of client's cursor from top left of screen
    var x = !isTouchDevice() ? e.pageX : e.touches[0].pageX;
    var y = !isTouchDevice() ? e.pageY : e.touches[0].pageY;
  } catch (e) {}
  //set left and top of div based on mouse position
  myDiv.style.left = x - 50 + "px";
  myDiv.style.top = y - 50 + "px";
};
//For mouse
document.addEventListener("mousemove", (e) => {
  move(e);
});
//For touch
document.addEventListener("touchmove", (e) => {
  move(e);
});

</script>