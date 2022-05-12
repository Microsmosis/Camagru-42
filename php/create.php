<?php
	include("create_auth.php");
	session_start();
	$servername = "localhost";
	$username = "root";
	$password = "indigochild";
	$dbname = "user_db";
	$new_email = $_POST['email'];
	$new_user = $_POST['login'];
	$new_pw = $_POST['passwd'];
	$re_pw = $_POST['re_passwd'];
	$status = 0;
	$acti_code = md5($new_email.time());
	if($new_email == "")
	{
		echo "Email field is empty!" . PHP_EOL;
		?>
			<!DOCTYPE html>
			<html>
				<body>
					</br>
					</br>
					<a href="../html/create.html">Return</a><br />
				</body>
			</html>
		<?php
		return;
	}
	if($new_user == "")
	{
		echo "Username field is empty!" . PHP_EOL;
		?>
			<!DOCTYPE html>
			<html>
				<body>
					</br>
					</br>
					<a href="../html/create.html">Return</a><br />
				</body>
			</html>
		<?php
		return;
	}
	if($new_pw == "")
	{
		echo "Password field is empty!" . PHP_EOL;
		?>
			<!DOCTYPE html>
			<html>
				<body>
					</br>
					</br>
					<a href="../html/create.html">Return</a><br />
				</body>
			</html>
		<?php
		return;
	}
	if($re_pw == "")
	{
		echo "Password verification field is empty!" . PHP_EOL;
		?>
			<!DOCTYPE html>
			<html>
				<body>
					</br>
					</br>
					<a href="../html/create.html">Return</a><br />
				</body>
			</html>
		<?php
		return;
	}
	if ($new_pw != $re_pw)
	{
		echo "ERROR, passwords are not identical!" . PHP_EOL;
		?>
			<!DOCTYPE html>
			<html>
				<body>
					</br>
					</br>
					<a href="../html/create.html">Return</a><br />
				</body>
			</html>
		<?php
		return;
	}
	if($_POST['email'] && $_POST['login'] && $_POST['passwd'] === $_POST['re_passwd'] && $_POST['submit'] && $_POST['submit'] === 'OK')
	{
		$ret = create_auth($new_email, $new_user);
		if($ret == 1)
		{
			$new_pw = hash('whirlpool', $new_pw);
			try
			{
				$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password); //creating new php data object
				// set the PDO error mode to exception
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "INSERT INTO user_info (email, userr_name, pass_word, activation_code, acti_stat)
				VALUES ('$new_email', '$new_user', '$new_pw', '$acti_code', '$status')"; // created a sql string which will be executed below with the PDO
				// use exec() because no results are returned
				$conn->exec($sql);
				echo "User created! Return to log in." . PHP_EOL;
			}
			catch(PDOException $e)
			{
				echo $sql . "<br>" . $e->getMessage();
			}
			$conn = null;
			$to = $new_email;
			$subject = 'E-mail Verification';
			$message = 'Hello new user! Good to have you with us :) Start your journey in Camagru by verifying your e-mail address by pressing the link below!' . PHP_EOL . "http://localhost:8080/guru2/php/verification.php?code=$acti_code";
			mail($to, $subject, $message);
			?>
			<!DOCTYPE html>
				<html>
					<body>
						<a href="../index.php">Return</a><br />
					</body>
				</html>
			<?php
		}
		else if ($ret == 2)
		{
			echo "This username is already in use!" . PHP_EOL;
			$conn = null;
			?>
				<!DOCTYPE html>
					<html>
						<body>
							</br>
							</br>
							<a href="../html/create.html">Return</a><br />
						</body>
					</html>
			<?php
		}
		else if ($ret == 3)
		{
			echo "This email is already in use!" . PHP_EOL;
			$conn = null;
			?>
				<!DOCTYPE html>
					<html>
						<body>
							</br>
							</br>
							<a href="../html/create.html">Return</a><br />
						</body>
					</html>
			<?php
		}
	}
?>