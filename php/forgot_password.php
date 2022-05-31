<?php
	require_once('send_mail.php');
	require_once('connect.php');
	session_start();
	if(!empty($_POST['email']) && isset($_POST['submit']))
	{
		$email = $_POST['email'];
		try
		{
			$conn = connect();
			$sql = "SELECT userr_name, pass_word FROM user_info WHERE `email`='$email'";
			$stmt = $conn->query($sql);
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$username = $result[0]['userr_name'];
			$password = $result[0]['pass_word'];
		}
		catch(PDOException $e)
		{
			echo $stmt . "<br>" . $e->getMessage();
		}
		$conn = null;
		sendEmail($email, 0, $username, $password, 2);
		?>
			<!DOCTYPE html>
			<html>
				<head>
				<link rel="preconnect" href="https://fonts.googleapis.com">
				<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
				<link href="https://fonts.googleapis.com/css2?family=Averia+Serif+Libre:ital,wght@1,700&display=swap" rel="stylesheet">
				</head>
				<style>
						#message {
							display: flex;
							align-items: center;
							justify-content: center;
							font-size: 2rem;
							font-family: 'Averia Serif Libre', cursive;
						}
				</style>
				<body>
					<p id="message"><?php echo "A LINK TO RESET THE PASSWORD HAS BEEN SENT TO GIVEN E-MAIL!";?></p>
				</body>
			</html>
		<?php
		header('Refresh: 3; ../index.php');
	}
	else
	{
		echo "E-Mail was not given or something went wrong. Contact superior web master llonnrot";
	}
?>