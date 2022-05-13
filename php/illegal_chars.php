<?php
	function illegal_chars($username)
	{
		if (preg_match('/[\'^£$%&*()}{@#~?><>\s+,\/|=+¬-]/', $username))
		{
			return 1;
		}
		return 0;
	}
?>