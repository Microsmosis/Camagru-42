<?php
	function error_flag($new_email, $new_user, $new_pw, $re_pw)
	{
		if (strlen($new_user) > 20)
		{
			return 1;
		}
		else if($new_email == "")
		{
			return 2;
		}
		else if($new_user == "")
		{
			return 3;
		}
		else if($new_pw == "")
		{
			return 4;
		}
		else if($re_pw == "")
		{
			return 5;
		}
		else if ($new_pw != $re_pw)
		{
			return 6;
		}
		return 0;
	}
?>