<?php
	require_once("connect.php");
	session_start();
	if($_SESSION['logged_in_user'] == "")
		header('Location: ./gallery.php');
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
			html {
					background: rgb(249, 249, 249);
			}
			.image {
				display: flex;
				align-items: center;
				justify-content: center;
				margin-bottom: 10px;
			}
			#video {
				display: block;
				margin-top: 150px;
				margin-left: auto;
				margin-right: auto;
			}
			#start-camera {
				display: block;
				margin-top: 10px;
				margin-left: auto;
				margin-right: auto;
				border-style: none;
				background: white;
				padding: 10px;
				border-radius: 50px;
				box-shadow: 1px 2px 2px hsl(0deg 0% 0% / 0.44);
				margin-bottom: 20px;
			}
			#click-photo {
				display: block;
				margin-top: 10px;
				margin-left: auto;
				margin-right: auto;
				border-style: none;
				background: white;
				padding: 7px;
				border-radius: 10px;
				box-shadow: 1px 2px 2px hsl(0deg 0% 0% / 0.44);
			}
			#canvas {
				display: block;
				margin-top: 10px;
				margin-left: auto;
				margin-right: auto;
			}
			#web_add {
				display: block;
				margin-top: 10px;
				margin-left: auto;
				margin-right: auto;
			}
			.stamps {
				display: flex;
				align-items: center;
				justify-content: center;
			}
			.img_add {
				display: flex;
				align-items: center;
				justify-content: center;
				margin-top: 10px;
			}
			#return {
				display: flex;
				align-items: center;
				justify-content: center;
			}
			hr {
				width: 2600px;
				height: 0px;
				background: black;
				position: fixed;
				top: 60px;
				right: 0px;
			}
			.meta {
				width: 2580px;
				height: 80px;
				background: white;
				position: fixed;
				top: -10px;
				right: 0px;
			}
			#profile {
				position: fixed;
				top: 0.7%;
				left: 4%;
			}
			#gallery {
				position: fixed;
				top: 0.7%;
				left: 47.8%;
			}
			#logout {
				position: fixed;
				top: 0.7%;
				left: 92%;
			}
			.redirects {
			font-size: 1rem;
			font-family: 'Roboto', sans-serif;
			}
			#web_add {
				background: white;
				border-style: solid;
				border-color: white;
				padding: 10px;
				border-radius: 50px;
				box-shadow: 1px 2px 2px hsl(0deg 0% 0% / 0.44);
				margin-bottom: 20px;
			}
			#img_size {
				width: 150px;
			}
		</style>
	</head>
	<body>
		<div class="meta"></div>
		<div class="redirects">
			<a id="profile" href="profile_page.php"><img src="../images/profile.png"width="50"></a>
			<a id="gallery" href="user_gallery.php"><img src="../images/globe1.png" width="50"></a>
			<a id="logout" href="logout.php"><img src="../images/logout.png" width="50"></a>
		</div>
		<video id="video" width="375" height="250" autoplay></video>
		<button id="start-camera"><img src="../images/snapshot.png" width="50"></button><button id="click-photo"><p>CHOOSE STICKER TO TAKE PHOTO</p><img src="../images/capture.png" width="50"></button>
			<canvas id="canvas" width="320" height="240" value="canvas"></canvas>
			<form class="fotoform" action="add_webcam.php" method="POST" enctype="multipart/form-data">
				<button id="web_add" type="submit" name="add" value=""><img src="../images/add.png" width="50"></button>
				<input type="hidden" id="web_photo" name="new_pic" value="">
				<input type="hidden" id="stamp" name="stamp" value="">
			</form>
		<div class="image">
		<?php
			try
		{
			$user = $_SESSION['logged_in_user'];
			$snap_stat = 1;
			$conn = connect();
			$sql = "SELECT img_path, snap_shot FROM user_images WHERE img_user='$user'";
			$stmt = $conn->query($sql);
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			if($result)
			{
				foreach($result as $k)
				{
					if ($k['snap_shot'] == 1)
					{
						$img_id = $k['img_name'];
						?>
							<!DOCTYPE html>
								<html>
									<body>
										<img id="img_size" src=<?php echo $k['img_path'];?>>&nbsp
									</body>
							</html>
						<?php
					}
				}
			}
		}
		catch(PDOException $e)
		{
			echo $stmt . "<br>" . $e->getMessage();
		}
		$conn = null;
		?>
		</div>
		<br>
		<br>
		<div class="stamps">
			<button><img id="first" onclick="stampPath1()" src="../images/kuruma.png" width='200' height='100'></button>
			<button><img id="second" onclick="stampPath2()" src="../images/shenron1.png" width='70' height='100'></button>
			<button><img id="third" onclick="stampPath3()" src="../images/gamabunta.png" width='100' height='100'></button>
			<button><img id="fourth" onclick="stampPath4()" src="../images/sharingan.png" width='100' height='100'></button>
			<button><img id="fifth" onclick="stampPath5()" src="../images/wow.png" width='100' height='100'></button>
		</div>
		<div class="img_add">
			<form class="fotoform" action="add_foto.php" method="POST" enctype="multipart/form-data">
				Add Photo From Device : <input type="file" name="photo"><input type="submit" value="Add">
				<input type="hidden" id="stamp1" name="stamp" value="">
			</form>
		</div>
		<br>
		<hr>
	</body>
</html>
<script> 
	let camera_button = document.querySelector("#start-camera");
	let video = document.querySelector("#video");
	let click_button = document.querySelector("#click-photo");
	let canvas = document.querySelector("#canvas");
	let new_pic = document.querySelector("#web_photo");
	let final_stamp_web = document.querySelector("#stamp");
	let final_stamp_add = document.querySelector("#stamp1");
	let first = document.querySelector("#first");
	let second = document.querySelector("#second");
	let third = document.querySelector("#third");
	let fourth = document.querySelector("#fourth");
	let fifth = document.querySelector("#fifth");
	
	let stamp_auth = 0;
	
	function stampPath1() {
		final_stamp_web.value = first.src;
		final_stamp_add.value = first.src;
		stamp_auth = 1;
	}
	
	function stampPath2() {
		final_stamp_web.value = second.src;
		final_stamp_add.value = second.src;
		stamp_auth = 1;
	}
	
	function stampPath3() {
		final_stamp_web.value = third.src;
		final_stamp_add.value = third.src;
		stamp_auth = 1;
	}
	
	function stampPath4() {
		final_stamp_web.value = fourth.src;
		final_stamp_add.value = fourth.src;
		stamp_auth = 1;
	}
	
	function stampPath5() {
		final_stamp_web.value = fifth.src;
		final_stamp_add.value = fifth.src;
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