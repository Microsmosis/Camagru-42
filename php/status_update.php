<?php
	require_once('connect.php');
	function status_update($code)
	{
		$status = 1;
		try
		{
			$conn = connect();
			$stmt = $conn->prepare("UPDATE user_info SET acti_stat=:acti_stat WHERE activation_code=:acti_code");
			$stmt-> bindParam(':acti_code', $code, PDO::PARAM_STR);
			$stmt-> bindParam(':acti_stat', $status, PDO::PARAM_STR);
			$stmt->execute();
		}
		catch(PDOException $e)
		{
			echo $stmt . "<br>" . $e->getMessage();
		}
		$conn = null;
	}
?>
