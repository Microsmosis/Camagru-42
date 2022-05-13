<?php
	function error_msg($flag)
	{
		if($flag == 0)
		{
			return;
		}
		else if($flag == 1)
		{
			$message = "USER NAME TOO LONG (MAX 20 CHARACTERS)";
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
		?>
			<!DOCTYPE html>
			<html>
				<body>
					<p id="error"><?php echo $message;?></p>
					</br>
					</br>
					<a id="return" href="../html/create.html">RETURN</a><br />
				</body>
			</html>
		<?php
		return;
	}
?>