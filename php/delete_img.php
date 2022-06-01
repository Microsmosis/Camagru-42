<?php
	require_once('connect.php');
	require_once('msg_str.php');
	session_start();
	if($_SESSION['logged_in_user'] == "")
		header('Location: ./gallery.php');
	if(isset($_POST['del_button']) && isset($_POST['image_path']))
	{
		$image = $_POST['image_path'];
		$name = $_POST['image_name'];
		try
		{
			$conn = connect();
			$sql = "DELETE FROM user_images WHERE img_path='$image'";
			$conn->exec($sql);
			$sql = "DELETE FROM comments WHERE img='$name'";
			$conn->exec($sql);
			$sql = "DELETE FROM likes WHERE img='$name'";
			$conn->exec($sql);
			unlink($image);
		}
		catch(PDOException $e)
		{
			echo $sql . "<br>" . $e->getMessage();
		}
		$conn = null;
		header('Location: profile_page.php');
	}
	else
	{
		msg_str("hmmmm.. some sort of problems have occurred...");
	}
?>
