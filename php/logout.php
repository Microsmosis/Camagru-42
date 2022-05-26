<?php
	session_start();
	if($_SESSION['logged_in_user'] == "")
		header('Location: ./gallery.php');

	$_SESSION['logged_in_user'] = "";
	echo "You have logged out!";
	header('Refresh: 2; ../index.php');
?>