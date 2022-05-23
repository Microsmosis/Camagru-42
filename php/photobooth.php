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
			<form class="fotoform" action="add_webcam.php" method="POST" enctype="multipart/form-data">
				<input id="submittor" type="submit" value="Add">
				<input type="hidden" id="crazy" name="new_pic" value="">
				<input type="hidden" id="stamp" name="stamp" value="">
			</form>
		<br>
		<br>
		<button><img id="first" onclick="stampPath()" src="../images/wow.png" width='200' height='200'></button>
		<br>
		<br>
		<form class="fotoform" action="add_foto.php" method="POST" enctype="multipart/form-data">
			Photo: <input type="file" name="photo">
			<input type="hidden" id="stamp1" name="stamp" value="">
			<br>
			<br>
			<input id="submittor" type="submit" value="Add">
		</form>
		<br>
		<br>
		<br>
		<br>
	</body>
</html>
<script> 
	let camera_button = document.querySelector("#start-camera");
	let video = document.querySelector("#video");
	let click_button = document.querySelector("#click-photo");
	let canvas = document.querySelector("#canvas");
	let new_pic = document.querySelector("#crazy");
	let final_stamp = document.querySelector("#stamp");
	let final_stamp1 = document.querySelector("#stamp1");
	
	let stamp_auth = 0;
	
	function stampPath() {
		final_stamp.value = "../images/wow.png";
		final_stamp1.value = "../images/wow.png";
		stamp_auth = 1;
	}

	camera_button.addEventListener('click', async function() {
		let stream = await navigator.mediaDevices.getUserMedia({ video: true, audio: false });
		video.srcObject = stream;
	});

	click_button.addEventListener('click', function() {
		if (stamp_auth == 1)
		{
			canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);
			let image_data_url = canvas.toDataURL('image/jpeg');
			new_pic.value = image_data_url;
		}
	});
	
	</script>