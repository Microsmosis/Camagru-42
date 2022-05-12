<?php
	function status_update($code)
	{
		$servername = "localhost";
		$username = "root";
		$password = "indigochild";
		$dbname = "user_db";
		try
		{
			$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE user_info SET acti_stat = 1 WHERE activation_code='$code'";
			$stmt = $conn->prepare($sql);
			$stmt->execute();
		}
		catch(PDOException $e)
		{
			echo $sql . "<br>" . $e->getMessage();
		}
		$conn = null;
	}
?>