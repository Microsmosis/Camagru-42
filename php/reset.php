<?php
	require_once('connect.php');
	session_start();
	// if isset on all these dudes
	$new_pw = $_POST['passwd'];
	$re_pw = $_POST['re_passwd'];
	$username = $_POST['username'];
	if ($new_pw == $re_pw)
	{
		try
		{	$new_pw = hash('whirlpool', $new_pw);
			$conn = connect();
			$stmt = $conn->prepare("UPDATE user_info SET pass_word=:new_pw WHERE userr_name='$username'");
			$stmt-> bindParam(':new_pw', $new_pw, PDO::PARAM_STR);
			$stmt->execute();
		}
		catch(PDOException $e)
		{
			echo $stmt . "<br>" . $e->getMessage();
		}
		$conn = null;
		echo "Password has been changed succesfully" . PHP_EOL;
		header('Refresh: 3; ../index.php');
	}
	else
	{
		echo "passwords are not identical, try again." . PHP_EOL;
	}
?>
