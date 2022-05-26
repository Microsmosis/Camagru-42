<?php
	require_once('connect.php');
	session_start();
	if($_SESSION['logged_in_user'] == "")
		header('Location: ./gallery.php');
	if(isset($_POST['del_button']) && isset($_POST['image_path']))
	{
		try
		{
			$image = $_POST['image_path'];
			$conn = connect();
			$sql = "DELETE FROM user_images WHERE img_path='$image'";
			$conn->exec($sql);
			unlink($image);
			echo "Image deleted succesfully!" . PHP_EOL;
		}
		catch(PDOException $e)
		{
			echo $sql . "<br>" . $e->getMessage();
		}
		$conn = null;
		header('Refresh: 3; ./profile_page.php');
	}
	else
	{
		echo "hmmmm.. some sort of problems have occurred..." . PHP_EOL;
	}
?>
