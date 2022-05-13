<?php
	function connect()
	{
		$DB_DSN = 'mysql:host=localhost;dbname=user_db';
		$DB_USER = 'root';
		$DB_PASSWORD = 'indigochild';
		$DB_HOST = 'mysql:host=localhost';
		try
		{
			$conn = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch(PDOException $e)
		{
			echo "Connection failed: " . $e->getMessage();
		}
		return ($conn);
	}
?>
