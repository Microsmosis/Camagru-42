<?php
	require_once('acti_auth.php');
	require_once('status_update.php');
	if(!empty($_GET['code']) && isset($_GET['code']))
	{
		$code = $_GET['code'];
		$status = acti_auth($code);
		if ($status == 1)
		{
			status_update($code);
			header('Location: ../index.php'); // FOR NOW BUT HAVE TO MAKE SOME "YES E MAIL VERIFIED YEEYEE" KIND OF MESSAGE OR PAGE BEFORE REDIRECT!
		}
		else
		{
			echo "error error beep boop think about all the edgecases!!!";
		}
	}
?>