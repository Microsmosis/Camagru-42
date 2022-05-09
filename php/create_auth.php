<?php
function create_auth($email, $login)
{
	$servername = "localhost";
	$username = "root";
	$password = "indigochild";
	$dbname = "user_db";
	try
	{
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
		echo "\n";
	}
	$conn = null;
	return 1;
}
?>