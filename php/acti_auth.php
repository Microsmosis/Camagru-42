<?php
	function acti_auth($code)
	{
		$servername = "localhost";
		$username = "root";
		$password = "indigochild";
		$dbname = "user_db";
		try
		{
			$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
			echo $sql . "<br>" . $e->getMessage();
		}
		$conn = null;
		return (0);
	}
?>