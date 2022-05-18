<?php
	session_start();
	$_SESSION['logged_in_user'] = "";
	echo "You have logged out!";
	header('Refresh: 2; ../index.php');
?>