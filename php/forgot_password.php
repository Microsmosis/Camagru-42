<?php
	require_once('send_mail.php');
	session_start();
	if(isset($_POST['email']) && isset($_POST['submit']))
	{
		sendEmail($new_email, 0, 2);
		echo "Email for password reset sent!";
		header('Refresh: 3; ../index.php');
	}
	else
	{
		echo "E-Mail was not given or something went wrong. Contact superior web master llonnrot";
	}
?>