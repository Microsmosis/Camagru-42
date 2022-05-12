<html>
		<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<title>Camagru</title>
			<link rel="preconnect" href="https://fonts.googleapis.com">
			<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
			<link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
			<style>
				body {
					background: linear-gradient(-90deg, #ffffff, #8ad8fc, #ffffff, #c678f7);
					width: 100%;
					overflow-x: hidden;
					overflow-y: hidden;
				}
				#error {
					text-align-last: center;
					display: flex;
					justify-content: center;
					align-items: center;
					height: 30vw;
					font-size: 6vw;
					font-family: 'Fredoka One', cursive;
				}
				#return {
					position: absolute;
					font-size: 4vw;
					font-family: 'Fredoka One', cursive;
					top: 36vw;
					left: 42vw;
				}
			</style>
		</head>
		<body>
			
		</body>
</html>

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
		?>
			<!DOCTYPE html>
			<html>
				<body>
					<p id="error">EMAIL FIELD IS EMPTY!</p>
					</br>
					</br>
					<a id="return" href="../html/create.html">RETURN</a><br />
				</body>
			</html>
		<?php
		return;
	}
	if($new_user == "")
	{
		?>
			<!DOCTYPE html>
			<html>
				<body>
					<p id="error">USERNAME FIELD IS EMPTY</p>
					</br>
					</br>
					<a id="return" href="../html/create.html">RETURN</a><br />
				</body>
			</html>
		<?php
		return;
	}
	if($new_pw == "")
	{
		?>
			<!DOCTYPE html>
			<html>
				<body>
				<p id="error">PASSWORD FIELD IS EMPTY!</p>
					</br>
					</br>
					<a id="return" href="../html/create.html">RETURN</a><br />
				</body>
			</html>
		<?php
		return;
	}
	if($re_pw == "")
	{
		?>
			<!DOCTYPE html>
			<html>
				<body>
					<p id="error">PASSWORD VERIFICATION FIELD IS EMPTY!</p>
					</br>
					</br>
					<a id="return" href="../html/create.html">RETURN</a><br />
				</body>
			</html>
		<?php
		return;
	}
	if ($new_pw != $re_pw)
	{
		?>
			<!DOCTYPE html>
			<html>
				<body>
				<p id="error">PASSWORDS ARE NOT IDENTICAL!</p>
					</br>
					</br>
					<a id="return" href="../html/create.html">RETURN</a><br />
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
					<p id="error">USER CREATED SUCCESSFULLY!</p>
						<a id="return" href="../index.php">RETURN</a><br />
					</body>
				</html>
			<?php
		}
		else if ($ret == 2)
		{
			$conn = null;
			?>
				<!DOCTYPE html>
					<html>
						<body>
						<p id="error">THIS USERNAME IS ALREADY IN USE!</p>
							</br>
							</br>
							<a id="return" href="../html/create.html">RETURN</a><br />
						</body>
					</html>
			<?php
		}
		else if ($ret == 3)
		{
			$conn = null;
			?>
				<!DOCTYPE html>
					<html>
						<body>
							<p id="error">THIS EMAIL IS ALREADY IN USE!</p>
							</br>
							</br>
							<a id="return" href="../html/create.html">RETURN</a><br />
						</body>
					</html>
			<?php
		}
	}
?>