<?php
	require_once('connect.php');
	session_start();
	// print $_SESSION['logged_in_user'];
	$webcam_photo = $_POST['new_pic'];
	$photo_user = $_SESSION['logged_in_user'];
	print_r($webcam_photo);

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
	header('Refresh: 2; user_gallery.php');
?>