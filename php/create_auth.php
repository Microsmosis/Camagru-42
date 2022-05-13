<?php
	require_once('connect.php');
	function create_auth($email, $login)
	{
		try
		{
			$conn = connect();
			$sql = "SELECT email, userr_name FROM user_info";
			$stmt = $conn->query($sql);
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			if($result)
			{
				foreach($result as $k)
				{
					if($k['email'] == $email)
					{
						$conn = null;
						return 3;
					}
					else if($k['userr_name'] == $login)
					{
						$conn = null;
						return 2;
					}
				}
			}
		}
		catch(PDOException $e)
		{
			echo $stmt . "<br>" . $e->getMessage();
		}
		$conn = null;
		return 1;
	}
?>