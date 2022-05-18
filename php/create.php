<html>
		<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<title>Camagru</title>
			<link rel="preconnect" href="https://fonts.googleapis.com">
			<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
			<link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
			<style>
				body {
					background: linear-gradient(-90deg, #ffffff, #8ad8fc, #ffffff, #c678f7);
					width: 100%;
					overflow-x: hidden;
					overflow-y: hidden;
				}
				#error {
					text-align-last: center;
					display: flex;
					justify-content: center;
					align-items: center;
					height: 30vw;
					font-size: 5vw;
					font-family: 'Fredoka One', cursive;
				}
				#return {
					position: absolute;
					font-size: 4vw;
					font-family: 'Fredoka One', cursive;
					top: 36vw;
					left: 42vw;
				}
			</style>
		</head>
		<body>
			
		</body>
</html>

<?php
	require_once('create_auth.php');
	require_once('connect.php');
	require_once('send_mail.php');
	require_once('error_msg.php');
	require_once('error_flag.php');
	session_start();
	$new_email = $_POST['email'];
	$new_user = strip_tags($_POST['login']);
	$new_pw = $_POST['passwd'];
	$re_pw = $_POST['re_passwd'];
	$status = 0;
	$acti_code = md5($new_email.time()); // random string for activation code
	if(error_msg(error_flag($new_email, $new_user, $new_pw, $re_pw)) !== 420)
	{
		return;
	} // function to check if user input is okay, if not sending out error message and returning to creation page
	if($_POST['email'] && $_POST['login'] && $_POST['passwd'] === $_POST['re_passwd'] && $_POST['submit'] && $_POST['submit'] === 'OK')
	{
		$ret = create_auth($new_email, $new_user);
		if($ret == 1)
		{
			$new_pw = hash('whirlpool', $new_pw);
			try
			{
				$conn = connect();
				$stmt = $conn->prepare("INSERT INTO user_info (email, userr_name, pass_word, activation_code, acti_stat)
										VALUES (:new_email, :new_user, :new_pw, :acti_code, :acti_stat)");
				$stmt->bindParam(':new_email', $new_email, PDO::PARAM_STR);
				$stmt->bindParam(':new_user', $new_user, PDO::PARAM_STR);
				$stmt->bindParam(':new_pw', $new_pw, PDO::PARAM_STR);
				$stmt->bindParam(':acti_code', $acti_code, PDO::PARAM_STR);
				$stmt->bindParam(':acti_stat', $status, PDO::PARAM_STR);
				$stmt->execute();
			}
			catch(PDOException $e)
			{
				echo $stmt . "<br>" . $e->getMessage();
			}
			$conn = null;
			sendEmail($new_email, $acti_code);
			?>
			<!DOCTYPE html>
				<html>
					<body>
					<p id="error">USER CREATED SUCCESSFULLY!</p>
						<a id="return" href="../index.php">RETURN</a><br />
					</body>
				</html>
			<?php
		}
		else if ($ret == 2)
		{
			$conn = null;
			error_msg(7);
		}
		else if ($ret == 3)
		{
			$conn = null;
			error_msg(8);
		}
	}
?>