<?php
	require_once('connect.php');
	/* require_once('add_stamp.php'); */
	session_start();
	// print $_SESSION['logged_in_user'];
	$webcam_photo = $_POST['new_pic'];
	if (isset($_POST['stamp']))
		$stamp_path = $_POST['stamp'];
	$photo_user = $_SESSION['logged_in_user'];

	$webcam_photo = str_replace('data:image/jpeg;base64,', '', $webcam_photo);
	$webcam_photo = str_replace(' ', '+', $webcam_photo);
	$data = base64_decode($webcam_photo);
	$photo_name =  uniqid() . '.jpeg';
	$file = "../uploads/" . uniqid() . '.jpeg';
	$success = file_put_contents($file, $data);
	$conn = connect();
	$stmt = $conn->prepare("INSERT INTO user_images (img_path, img_name, img_user)
								VALUES (:img_path, :img_name, :img_user)");
	$stmt->bindParam(':img_path', $file, PDO::PARAM_STR);
	$stmt->bindParam(':img_name', $photo_name, PDO::PARAM_STR);
	$stmt->bindParam(':img_user', $photo_user, PDO::PARAM_STR);
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
	imagejpeg($img, $file, 100);
	imagedestroy($img);
	/* header('Refresh: 2; user_gallery.php'); */
?>