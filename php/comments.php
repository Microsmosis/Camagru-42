<?php
	require_once('connect.php');
	require_once('send_mail.php');
	session_start();
	if($_SESSION['logged_in_user'] == "")
	header('Location: ./gallery.php');
	if(!empty($_POST['comments']))
	{
		header('Location: user_gallery.php');
		$comment = htmlspecialchars($_POST['comments']);
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
	}
	else
	{
		?>
			<!DOCTYPE html>
			<html>
				<head>
				<link rel="preconnect" href="https://fonts.googleapis.com">
				<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
				<link href="https://fonts.googleapis.com/css2?family=Averia+Serif+Libre:ital,wght@1,700&display=swap" rel="stylesheet">
				</head>
				<style>
					#error {
					display: flex;
					align-items: center;
					justify-content: center;
					font-size: 2rem;
					font-family: 'Averia Serif Libre', cursive;
				}
				</style>
				<body>
					<p id="error">Empty comment, please type something before submitting.</p>
				</body>
			</html>
		<?php
		header('Refresh: 2; user_gallery.php');
	}
	
?>