<?php
	require_once('connect.php');
	session_start();
	if(!empty($_POST['comments'])) // newline is not empty but will pass this if
	{
		$comment = strip_tags($_POST['comments']);
		$user = $_SESSION['logged_in_user'];
		$img_id = $_POST['image_name'];
		try
		{
			$conn = connect();
			$stmt = $conn->prepare("INSERT INTO comments (user, msg, img)
									VALUES (:user, :msg, :img)");
			$stmt->bindParam(':user', $user, PDO::PARAM_STR);
			$stmt->bindParam(':msg', $comment, PDO::PARAM_STR);
			$stmt->bindParam(':img', $img_id, PDO::PARAM_STR);
			$stmt->execute();
		}
		catch(PDOException $e)
		{
			echo $stmt . "<br>" . $e->getMessage();
		}
		$conn = null;
		header('Location: ./user_gallery.php');
	}
	else
	{
		echo "error" . PHP_EOL;
	}
	
?>