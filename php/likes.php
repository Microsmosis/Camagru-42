<?php
	require_once('connect.php');
	require_once('send_mail.php');
	session_start();
	if(isset($_POST['liker']) && isset($_POST['like_button']))
	{
		$img_name = $_POST['image_name'];
		$img_user = $_POST['image_user'];
		try
		{
			$conn = connect();
			$sql = "CREATE TABLE IF NOT EXISTS `likes_'$img_name'` (
			id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			user VARCHAR(50) NOT NULL,
			submit_time DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
			)";
			$conn->exec($sql);
		}
		catch(PDOException $e)
		{
			echo $sql . "<br>" . $e->getMessage();
		}
		$conn = null;
		
		$liker = $_POST['liker'];
		try
		{
			$conn = connect();
			$sql = "SELECT user FROM `likes_'$img_name'` WHERE `user`='$liker'";
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
				$stmt = $conn->prepare("INSERT INTO `likes_'$img_name'` (user)
									VALUES (:user)");
				$stmt->bindParam(':user', $liker, PDO::PARAM_STR);
				$stmt->execute();
			}
			catch(PDOException $e)
			{
				echo $stmt . "<br>" . $e->getMessage();
			}
			$conn = null;
			
			try
			{
				$conn = connect();
				$sql = "SELECT email FROM user_info WHERE `userr_name`='$img_user'";
				$stmt = $conn->query($sql);
				$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			}
			catch(PDOException $e)
			{
				echo $stmt . "<br>" . $e->getMessage();
			}
			sendEmail($result[0]['email'], 0, 0, 0, 4);
			$conn = null;
			header('Location: ./user_gallery.php');
			}
		else
		{
			echo "well you have already liked this picture, and it would be propably better if developer would just make you to unlike the photo ...." . PHP_EOL;
		}
	}
	else
	{
		echo "yo webmaste superrior overlord llonnrot, fix this error message :D" . PHP_EOL;
	}
?>