 <?php
	require_once('connect.php');
	require_once('send_mail.php');
	session_start();
	if($_SESSION['logged_in_user'] == "")
		header('Location: ./gallery.php');
	if(!empty($_POST['comments'])) // newline is not empty but will pass this if
	{
		$comment = strip_tags($_POST['comments']);
		$user = $_SESSION['logged_in_user'];
		$img_id = $_POST['image_name'];
		$img_user = $_POST['image_user'];
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
		
		try
		{
			$conn = connect();
			$sql = "SELECT email, notif_stat FROM user_info WHERE `userr_name`='$img_user'";
			$stmt = $conn->query($sql);
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		catch(PDOException $e)
		{
			echo $stmt . "<br>" . $e->getMessage();
		}
		if($result[0]['notif_stat'] == 1)
			sendEmail($result[0]['email'], 0, 0, 0, 3);
		$conn = null;
		header('Location: ./user_gallery.php');
	}
	else
	{
		echo "error" . PHP_EOL;
	}
	
?>