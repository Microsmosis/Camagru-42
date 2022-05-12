<?php
function auth($login, $passwd)
{
	$servername = "localhost";
	$username = "root";
	$password = "indigochild";
	$dbname = "user_db";
	$ret = 0;
	try
	{
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT userr_name, pass_word, acti_stat FROM user_info";
		$stmt = $conn->query($sql);
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		if ($result)
		{
			foreach ($result as $k)
			{
				$user_pw = hash('whirlpool', $passwd);
				if ($k['userr_name'] == $login && $k['pass_word'] == $user_pw)
				{
					//$conn = null;
					$ret += 1;
				}
				if($k['acti_stat'] == 1 && $ret == 1)
				{
					$conn = null;
					return ($ret += 1);
				}
			}
		}
	}
	catch(PDOException $e)
	{
		echo "\n";
	}
	$conn = null;
	return $ret;
}
?>
