<?php
	require_once('connect.php');
	function acti_auth($code)
	{
		try
		{
			$conn = connect();
			$sql = "SELECT activation_code FROM user_info WHERE BINARY activation_code='$code'";
			$stmt = $conn->query($sql);
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			if($result)
			{
				foreach($result as $k)
				{
					if($code == $k['activation_code'])
					{
						$conn = null;
						return 1;
					}
				}
			}
		}
		catch(PDOException $e)
		{
			echo $stmt . "<br>" . $e->getMessage();
		}
		$conn = null;
		return (0);
	}
?>