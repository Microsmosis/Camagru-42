<?php
	require_once('connect.php');
	session_start();
	if($_SESSION['logged_in_user'] == "")
		header('Location: ./gallery.php');
	$photo_user = $_SESSION['logged_in_user'];
	$photos_dir = "../uploads/";
	$photo_name = basename($_FILES["photo"]["name"]);
	$photo_file = $photos_dir . basename($_FILES["photo"]["name"]);
	$uploadOk = 1;
	$snap_stat = 0;
	$file_type = strtolower(pathinfo($photo_file, PATHINFO_EXTENSION));

	if(isset($_POST["add"]))
	{
		$check = getimagesize($_FILES["photo"]["tmp_name"]);
		if($check === false)
		{
		  echo "File is not an image." . PHP_EOL;
		  $uploadOk = 0;
		}
	}

	if(file_exists($photo_file))
	{
		echo "Filename is in use, please choose an other one." . PHP_EOL;
		$uploadOk = 0;
	}

	if($_FILES["photo"]["size"] > 7000000)
	{
		echo "Sorry, your file is too large." . PHP_EOL;
		$uploadOk = 0;
	}

	if($file_type != "jpg" && $file_type != "png" && $file_type != "jpeg")
	{
		echo "Sorry, only JPG, JPEG, PNG." . PHP_EOL;
		$uploadOk = 0;
	}

	if($uploadOk == 0)
	{
		echo "Sorry, your file was not uploaded." . PHP_EOL;
	}
	else
	{
		if(move_uploaded_file($_FILES["photo"]["tmp_name"], $photo_file))
		{

			$conn = connect();
			$stmt = $conn->prepare("INSERT INTO user_images (img_path, img_name, img_user, snap_shot)
									VALUES (:img_path, :img_name, :img_user, :snap_shot)");
			$stmt->bindParam(':img_path', $photo_file, PDO::PARAM_STR);
			$stmt->bindParam(':img_name', $photo_name, PDO::PARAM_STR);
			$stmt->bindParam(':img_user', $photo_user, PDO::PARAM_STR);
			$stmt->bindParam(':snap_shot', $snap_stat, PDO::PARAM_STR);
			$stmt->execute();
			$conn = null;
			if ($file_type == "jpeg" || $file_type == "jpg")
				$img = imagecreatefromjpeg($photo_file);
			else if ($file_type == "png")
				$img = imagecreatefrompng($photo_file);
			$scaled_img = imagescale($img, 375, -1, IMG_BILINEAR_FIXED);
			imagejpeg($scaled_img, $photo_file, 100);
			imagedestroy($img);
			imagedestroy($scaled_img);
			header('Location: user_gallery.php');
		}
		else
		{
			echo "Sorry, there was an error uploading your file.\n";
		}
	}
	if (isset($_POST['stamp']))
	{
		$stamp_path = $_POST['stamp'];
		$stamp = imagecreatefrompng($stamp_path);
		if ($file_type == "jpeg" || $file_type == "jpg")
			$img = imagecreatefromjpeg($photo_file);
		if ($file_type == "png")
			$img = imagecreatefrompng($photo_file);

		$margin_r = 1;
		$margin_b = 1;

		$sx = imagesx($stamp);
		$sy = imagesy($stamp);

		imagecopy($img, $stamp, imagesx($img) - $sx - $margin_r, imagesy($img) - $sy - $margin_b, 0, 0, imagesx($stamp), imagesy($stamp));
		$scaled_img = imagescale($img, 375, -1, IMG_BILINEAR_FIXED);
		imagejpeg($scaled_img, $photo_file, 100);
		imagedestroy($img);
		imagedestroy($scaled_img);
	}
?>