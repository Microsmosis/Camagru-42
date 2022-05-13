<?php
	require_once('connect.php');
	function status_update($code)
	{
		try
		{
			$conn = connect();
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