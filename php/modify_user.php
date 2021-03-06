<?php
	require_once('auth.php');
	require_once('connect.php');
	require_once('msg_str.php');
	session_start();
	if($_SESSION['logged_in_user'] == "")
		header('Location: ./gallery.php');
	$mod_email = $_POST['email'];
	$mod_user_name = $_POST['login'];
	$mod_pw = $_POST['passwd'];
	$mod_re_pw  = $_POST['re_passwd'];
	$password = $_POST['current'];
	$user = $_SESSION['logged_in_user'];

	if(auth($user, $password) == 2)
	{
		if(!empty($mod_email))
		{
			if(check_info($mod_email, 0, 1) == 1)
			{
				try
				{
					$conn = connect();
					$stmt = $conn->prepare("UPDATE user_info SET email=:new_email WHERE userr_name='$user'");
					$stmt-> bindParam(':new_email', $mod_email, PDO::PARAM_STR);
					$stmt->execute();
				}
				catch(PDOException $e)
				{
					echo $stmt . "<br>" . $e->getMessage();
				}
				$conn = null;
				msg_str("E-mail changed succesfully!"); 
				header('Refresh: 3; ./profile_page.php');
			}
			else
			{
				msg_str("This E-mail is already in use!");
				header('Refresh: 3; ./settings.php');
			}
		}
		if(!empty($mod_pw))
		{
			if($mod_pw == $mod_re_pw)
			{
				$mod_pw = hash('whirlpool', $mod_pw);
				try
				{
					$conn = connect();
					$stmt = $conn->prepare("UPDATE user_info SET pass_word=:new_pw WHERE userr_name='$user'");
					$stmt-> bindParam(':new_pw', $mod_pw, PDO::PARAM_STR);
					$stmt->execute();
				}
				catch(PDOException $e)
				{
					echo $stmt . "<br>" . $e->getMessage();
				}
				$conn = null;
				msg_str("Password changed succesfully!");
				header('Refresh: 3; ./profile_page.php');
			}
			else
			{
				msg_str("The new passwords are not identical, please try again.");
				header('Refresh: 3; ./settings.php');
			}
		}
		if(!empty($mod_user_name))
		{
			if(check_info(0, $user, 2) == 1)
			{
				try
				{
					$conn = connect();
					$stmt = $conn->prepare("UPDATE user_info SET userr_name=:new_user WHERE userr_name='$user'");
					$stmt-> bindParam(':new_user', $mod_user_name, PDO::PARAM_STR);
					$stmt->execute();
					$stmt = $conn->prepare("UPDATE user_images SET img_user=:img_user WHERE img_user='$user'");
					$stmt-> bindParam(':img_user', $mod_user_name, PDO::PARAM_STR);
					$stmt->execute();
					$stmt = $conn->prepare("UPDATE likes SET user=:user WHERE user='$user'");
					$stmt-> bindParam(':user', $mod_user_name, PDO::PARAM_STR);
					$stmt->execute();
					$stmt = $conn->prepare("UPDATE comments SET user=:user WHERE user='$user'");
					$stmt-> bindParam(':user', $mod_user_name, PDO::PARAM_STR);
					$stmt->execute();
				}
				catch(PDOException $e)
				{
					echo $stmt . "<br>" . $e->getMessage();
				}
				$conn = null;
				$_SESSION['logged_in_user'] = $mod_user_name;
				msg_str("User name changed succesfully!");
				header('Refresh: 3; ./profile_page.php');
			}
			else
			{
				msg_str("This username is already in use!");
				header('Refresh: 3; ./settings.php');
			}
		}
	}
	else
	{
		msg_str("Password is incorrect, please try again.");
		header('Refresh: 3; ./settings.php');
	}
?>

<?php 
	function check_info($mail, $user, $flag)
	{
		try
		{
			$conn = connect();
			$sql = "SELECT email FROM user_info";
			$stmt = $conn->query($sql);
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		catch(PDOException $e)
		{
			echo $stmt . "<br>" . $e->getMessage();
		}
		$conn = null;
		foreach ($result as $k)
		{
			if ($flag == 1 && $k['email'] == $mail)
				return 0;
			if ($flag == 2 && $k['userr_name'] == $user)
				return 0;
		}
		return 1;
	}
?>