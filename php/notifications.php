<?php
	require_once('connect.php');
	session_start();
	if($_SESSION['logged_in_user'] == "")
		header('Location: ./gallery.php');
	if(isset($_POST['off']) || isset($_POST['on']))
	{
		$user = $_SESSION['logged_in_user'];
		$on = 1;
		$off = 0;
		if(isset($_POST['off']))
		{
			try
				{
					$conn = connect();
					$stmt = $conn->prepare("UPDATE user_info SET notif_stat=:notif_stat WHERE userr_name='$user'");
					$stmt-> bindParam(':notif_stat', $off, PDO::PARAM_STR);
					$stmt->execute();
				}
				catch(PDOException $e)
				{
					echo $stmt . "<br>" . $e->getMessage();
				}
				$conn = null;
				echo "Notifications turned off." . PHP_EOL;
				header('Refresh: 3; ./profile_page.php');
		}
		else if(isset($_POST['on']))
		{
			try
				{
					$conn = connect();
					$stmt = $conn->prepare("UPDATE user_info SET notif_stat=:notif_stat WHERE userr_name='$user'");
					$stmt-> bindParam(':notif_stat', $on, PDO::PARAM_STR);
					$stmt->execute();
				}
				catch(PDOException $e)
				{
					echo $stmt . "<br>" . $e->getMessage();
				}
				$conn = null;
				echo "Notifications turned on." . PHP_EOL;
				header('Refresh: 3; ./profile_page.php');
		}
	}
?>