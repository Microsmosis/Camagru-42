<?php
	require_once('connect.php');
	session_start();
	if($_SESSION['logged_in_user'] == "")
		header('Location: ./gallery.php');
	
	if (!empty($_POST['new_pic']) && !empty($_POST['stamp']))
	{
		$webcam_photo = $_POST['new_pic'];
		$stamp_path = $_POST['stamp'];
		$photo_user = $_SESSION['logged_in_user'];
		$snap_stat = 1;
		$_POST = array();
		$webcam_photo = str_replace('data:image/jpeg;base64,', '', $webcam_photo);
		$webcam_photo = str_replace(' ', '+', $webcam_photo);
		$data = base64_decode($webcam_photo);
		$photo_name =  uniqid() . '.jpeg';
		$file = "../uploads/" . uniqid() . '.jpeg';
		$success = file_put_contents($file, $data);
		$conn = connect();
		$stmt = $conn->prepare("INSERT INTO user_images (img_path, img_name, img_user, snap_shot)
									VALUES (:img_path, :img_name, :img_user, :snap_shot)");
		$stmt->bindParam(':img_path', $file, PDO::PARAM_STR);
		$stmt->bindParam(':img_name', $photo_name, PDO::PARAM_STR);
		$stmt->bindParam(':img_user', $photo_user, PDO::PARAM_STR);
		$stmt->bindParam(':snap_shot', $snap_stat, PDO::PARAM_STR);
		$stmt->execute();
		$conn = null;
		$stamp = imagecreatefrompng($stamp_path);
		$img = imagecreatefromjpeg($file);
		
		$margin_r = 10;
		$margin_b = 10;
	
		$sx = imagesx($stamp);
		$sy = imagesy($stamp);
	
		imagecopy($img, $stamp, imagesx($img) - $sx - $margin_r, imagesy($img) - $sy - $margin_b, 0, 0, imagesx($stamp), imagesy($stamp));
		header('Content-type: image/png');
		imagejpeg($img, $file, 95);
		imagedestroy($img);
		header('Location: user_gallery.php');
	}
	else
	{
		?>
			<!DOCTYPE html>
			<html>
				<head>
				<link rel="preconnect" href="https://fonts.googleapis.com">
				<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
				<link href="https://fonts.googleapis.com/css2?family=Averia+Serif+Libre:ital,wght@1,700&display=swap" rel="stylesheet">
				</head>
				<style>
					#error {
					display: flex;
					align-items: center;
					justify-content: center;
					font-size: 2rem;
					font-family: 'Averia Serif Libre', cursive;
				}
				</style>
				<body>
					<p id="error">Please take an image and choose a sticker for it!</p>
				</body>
			</html>
		<?php
		header('Refresh: 2; photobooth.php');
	}
?>