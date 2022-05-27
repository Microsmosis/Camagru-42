<?php
	function is_number($string)
	{
		$i = 0;
		while($string[$i] != '\0')
		{
			if(is_numeric($string[$i]) == 1)
				return 1;
			$i++;
		}
		return 0;
	}
?>