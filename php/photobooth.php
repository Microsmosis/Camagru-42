<?php
	session_start();
	//print $_SESSION['logged_in_user'];
?>

<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Camagru</title>
		<meta http-equiv="X-UA-Compatible" content="ie=edge" />
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
		<style>
			
		</style>
	</head>
	<body>
			<button id="start-camera">Start Camera</button>
			<video id="video" width="320" height="240" autoplay></video>
			<button id="click-photo">Take Photo</button>
			<canvas id="canvas" width="320" height="240" value="canvas"></canvas>
		</form>
		<br>
		<br>
		<br>
		<br>
		<form class="fotoform" action="add_foto.php" method="POST" enctype="multipart/form-data">
			Photo: <input type="file" name="photo">
			<br>
			<br>
			<input id="submittor" type="submit" value="Add">
		</form>
	</body>
</html>
<script> 
	let camera_button = document.querySelector("#start-camera");
	let video = document.querySelector("#video");
	let click_button = document.querySelector("#click-photo");
	let canvas = document.querySelector("#canvas");

	camera_button.addEventListener('click', async function() {
		let stream = await navigator.mediaDevices.getUserMedia({ video: true, audio: false });
		video.srcObject = stream;
	});

	click_button.addEventListener('click', function() {
		canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);
		let image_data_url = canvas.toDataURL('image/jpeg');
		// data url of the image
		//console.log(image_data_url);
		var image = new Image(); // new stuff here, trying to turn the base64 into image 
		image.src = image_data_url; // now how do we put this into the uploads dir and info to table ????
	});
	
</script>