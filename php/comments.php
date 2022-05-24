<?php
	require_once('connect.php');
	session_start();
	if(!empty($_POST['comments'])) // newline is not empty but will pass this if
	{
		$comment = $_POST['comments'];
		$user = $_SESSION['logged_in_user'];
		try
		{
			$conn = connect();
			$stmt = $conn->prepare("INSERT INTO comments (user, msg)
									VALUES (:user, :msg)");
			$stmt->bindParam(':user', $user, PDO::PARAM_STR);
			$stmt->bindParam(':msg', $comment, PDO::PARAM_STR);
			$stmt->execute();
		}
		catch(PDOException $e)
		{
			echo $stmt . "<br>" . $e->getMessage();
		}
		$conn = null;
	}
	else
	{
		echo "error" . PHP_EOL;
	}
	
?>