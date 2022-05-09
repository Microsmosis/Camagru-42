<?php
	include("auth.php");
	session_start();
	if (auth($_POST['login'], $_POST['passwd']))
	{
		header('Location: ../html/gallery.html');
	}
	else
	{
		echo "Error, user does not exist or the password is wrong!\n";
		?>
		<!DOCTYPE html>
		<html>
			<body>
				</br>
				</br>
				<a href="../index.php">Return</a><br />
			</body>
		</html>
		<?php
	}
?>