<?php
	session_start();
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
			* {
				padding: 0;
				margin: 0;
				box-sizing: border-box;
				font-family: 'Oswald', sans-serif;
			}
				body {
				height: 100vh;
				width: 100vw;
				background: #f2f4f6;
				overflow: hidden;
			}
				.webcam-start-stop {
				position: fixed;
				left: 0;
				bottom: 0;
				right: 0;
				padding: 5px 0;
				background: #000;
				display: flex;
				align-items: center;
				justify-content: space-around;
			}
				.webcam-start-stop > a {
				text-decoration: unset;
				color: #000;
				background: #fff;
				padding: 10px 20px;
			}
		</style>
	</head>
	<body>
		<div class="webcam">
			<div class="video-outer">
				<video id="video" height="50%" width="50%" autoplay></video>
			</div>

			<div class="webcam-start-stop">
				<a href="#!" class="btn-start" onclick="start()">Start</a>
				<a href="#!" class="btn-stop" onclick="StopWebCam()">Stop</a>
			</div>
		</div>

		<script>
			let StopWebCam = function () {
				let stream = video.srcObject;
				let tracks = stream.getTracks();

				for (let i = 0; i < tracks.length; i++) {
					let track = tracks[i];
					track.stop();
				}
				video.srcObject = null;
			}

			let start = function () {
				let video = document.getElementById("video"),
					vendorURL = window.URL || window.webkitURL;

				if (navigator.mediaDevices.getUserMedia) {
					navigator.mediaDevices.getUserMedia({ video: true })
						.then(function (stream) {
							video.srcObject = stream;
						}).catch(function (error) {
							console.log("Something went wrong");
						});
				}
			}
			$(function () { start(); });
		</script>
	</body>
</html>