<?php
	require_once('send_mail.php');
	require_once('connect.php');
	require_once('msg_str.php');
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
		msg_str("A LINK TO RESET THE PASSWORD HAS BEEN SENT TO GIVEN E-MAIL!");
		header('Refresh: 3; ../index.php');
	}
	else
	{
		msg_str("E-Mail was not given or something went wrong. Please contact helpdesk.");
	}
?>