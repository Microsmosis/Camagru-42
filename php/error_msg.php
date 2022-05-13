<?php
	function error_msg($flag)
	{
		$return = "RETURN";
		if($flag == 0)
		{
			return;
		}
		else if($flag == 1)
		{
			$message = "USER NAME TOO LONG (MAX 20) OR TOO SHORT (MIN 4 CHARACTERS)";
		}
		else if($flag == 2)
		{
			$message = "EMAIL FIELD IS EMPTY!";
		}
		else if($flag == 3)
		{
			$message = "USERNAME FIELD IS EMPTY";
		}
		else if($flag == 4)
		{
			$message = "PASSWORD FIELD IS EMPTY!";
		}
		else if($flag == 5)
		{
			$message = "PASSWORD VERIFICATION FIELD IS EMPTY!";
		}
		else if($flag == 6)
		{
			$message = "PASSWORDS ARE NOT IDENTICAL!";
		}
		else if($flag == 7)
		{
			$message = "THIS USERNAME IS ALREADY IN USE!";
		}
		else if($flag == 8)
		{
			$message = "THIS EMAIL IS ALREADY IN USE!";
		}
		else if($flag == 9)
		{
			$message = "USERNAME CAN CONTAIN ONLY ALPHABETICAL CHARACTERS, NUMBERS OR UNDERSCORES '_'";
		}
		else if($flag == 10)
		{
			$message = "USER EMAIL NOT VERIFIED!";
			$return = "";
		}
		else if($flag == 11)
		{
			$message = "USER DOES NOT EXIST OR PASSWORD IS INCORRECT!";
			$return = "";
		}
		else if($flag == 12)
		{
			$message = "PASSWORD IS TOO SHORT! (MIN 8 CHARACTERS)";
		}
		?>
			<!DOCTYPE html>
			<html>
				<body>
					<p id="error"><?php echo $message;?></p>
					</br>
					</br>
					<a id="return" href="../html/create.html"><?php echo $return;?></a><br />
				</body>
			</html>
		<?php
		return;
	}
?>