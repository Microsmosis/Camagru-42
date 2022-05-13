<?php
	function sendEmail($new_email, $acti_code)
	{
		$to = $new_email;
		$subject = 'E-mail Verification';
		$message = 'Hello new user! Good to have you with us :) Start your journey in Camagru by verifying your e-mail address by pressing the link below!' . PHP_EOL . "http://localhost:8080/guru2/php/verification.php?code=$acti_code";
		mail($to, $subject, $message);
	}
?>