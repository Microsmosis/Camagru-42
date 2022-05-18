<?php
	require_once('connect.php');
	session_start();
	$photo_user = $_SESSION['logged_in_user'];
	$photos_dir = "../uploads/";
	$photo_name = basename($_FILES["photo"]["name"]);
	$photo_file = $photos_dir . basename($_FILES["photo"]["name"]);
	$uploadOk = 1;
	$file_type = strtolower(pathinfo($photo_file, PATHINFO_EXTENSION));

	if(isset($_POST["add"]))
	{
		$check = getimagesize($_FILES["photo"]["tmp_name"]);
		if($check !== false)
		{
		  echo "File is an image - " . $check["mime"] . ".";
		  $uploadOk = 1;
		}
		else
		{
		  echo "File is not an image.\n";
		  $uploadOk = 0;
		}
	}

	if(file_exists($photo_file))
	{
		echo "Sorry, file already exists.\n";
		$uploadOk = 0;
	}

	if($_FILES["photo"]["size"] > 4000000)
	{
		echo "Sorry, your file is too large.\n";
		$uploadOk = 0;
	}

	// Allow certain file formats
	if($file_type != "jpg" && $file_type != "png" && $file_type != "jpeg" && $file_type != "gif" )
	{
		echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.\n";
		$uploadOk = 0;
	}

	// Check if $uploadOk is set to 0 by an error
	if($uploadOk == 0)
	{
		echo "Sorry, your file was not uploaded.\n";
	}
	else
	{
		if(move_uploaded_file($_FILES["photo"]["tmp_name"], $photo_file))
		{
			echo "The file ". htmlspecialchars(basename( $_FILES["photo"]["name"])). " has been uploaded.\n";
			$conn = connect();
			$stmt = $conn->prepare("INSERT INTO user_images (img_path, img_name, img_user)
									VALUES (:img_path, :img_name, :img_user)");
			$stmt->bindParam(':img_path', $photo_file, PDO::PARAM_STR);
			$stmt->bindParam(':img_name', $photo_name, PDO::PARAM_STR);
			$stmt->bindParam(':img_user', $photo_user, PDO::PARAM_STR);
			$stmt->execute();
			header('Refresh: 2; ./user_gallery.php');
		}
		else
		{
			echo "Sorry, there was an error uploading your file.\n";
		}
	}
	
	// next we should insert the photo into the database, for that we have to create a new table with the info of who
	// aka the $_SESSION['logged_in_user'] has uploaded what pic and the pic info ?? 
	// so the setup.php has to be modified. add a new table creation. sounds like a plan
	
?>