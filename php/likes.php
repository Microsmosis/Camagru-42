<?php

	require_once('connect.php');
	require_once('send_mail.php');
	session_start();
	if($_SESSION['logged_in_user'] == "")
		header('Location: ./gallery.php');
	if(isset($_POST['liker']) && isset($_POST['like_button']))
	{
		header('Location: ./user_gallery.php');
		$img_name = $_POST['image_name'];
		$img_user = $_POST['image_user'];
		
		$liker = $_POST['liker'];
		try
		{
			$conn = connect();
			$sql = "SELECT user FROM `likes` WHERE `img`='$img_name'";
			$stmt = $conn->query($sql);
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		catch(PDOException $e)
		{
			echo $stmt . "<br>" . $e->getMessage();
		}
		$conn = null;
		if($result[0]['user'] != $liker)
		{
			try
			{
				$conn = connect();
				$stmt = $conn->prepare("INSERT INTO `likes` (user, img)
									VALUES (:user, :img)");
				$stmt->bindParam(':user', $liker, PDO::PARAM_STR);
				$stmt->bindParam(':img', $img_name, PDO::PARAM_STR);
				$stmt->execute();
			}
			catch(PDOException $e)
			{
				echo $stmt . "<br>" . $e->getMessage();
			}
			$conn = null;
			}
		else
		{
			try
			{
				$conn = connect();
				$sql = "DELETE FROM likes WHERE img='$img_name' AND user='$img_user'";
				$conn->exec($sql);
				unlink($image);
			}
			catch(PDOException $e)
			{
				echo $sql . "<br>" . $e->getMessage();
			}
			$conn = null;
		}
	}
	else
	{
		echo "A problem has occured, please contact the helpdesk!" . PHP_EOL;
	}
?>