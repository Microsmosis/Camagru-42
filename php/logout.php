<?php
	session_start();
	if($_SESSION['logged_in_user'] == "")
		header('Location: ./gallery.php');

	$_SESSION['logged_in_user'] = "";
	echo "Bye Bye";
	header('Refresh: 1; ../index.php');
?>