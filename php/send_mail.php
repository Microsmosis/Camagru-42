<?php
	function sendEmail($email_adrs, $acti_code, $username, $password, $email_type)
	{
		if ($email_type == 1)
		{
			$to = $email_adrs;
			$subject = 'E-mail Verification';
			$message = 'Hello new user! Good to have you with us :) Start your journey in Camagru by verifying your e-mail address by pressing the link below!' . PHP_EOL . "http://localhost:8080/guru4/php/verification.php?code=$acti_code";
			mail($to, $subject, $message);
			
		}
		else if ($email_type == 2)
		{
			$to = $email_adrs;
			$subject = 'Password Reset';
			$message = 'To reset your password, please click the link below.' . PHP_EOL . "http://localhost:8080/guru4/php/reset_form.php?key=$username&reset=$password&mail=$email_adrs";
			mail($to, $subject, $message);
			
		}
	}
?>