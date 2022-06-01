<?php
	require_once('connect.php');
	require_once('msg_str.php');
	session_start();
	if(isset($_GET['key']) && isset($_GET['reset']))
	{
		$username = $_GET['key'];
		$password = $_GET['reset'];
		$email = $_GET['mail'];
		try
			{
				$conn = connect();
				$sql = "SELECT userr_name, pass_word FROM user_info WHERE `email`='$email'";
				$stmt = $conn->query($sql);
				$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
				if ($result[0]['userr_name'] == $username && $result[0]['pass_word'] == $password)
				{
					?>
					<!DOCTYPE html>
						<html>
							<head>
								<meta charset="utf-8">
								<meta name="viewport" content="width=device-width, initial-scale=1.0">
								<title>Camagru</title>
								<link rel="preconnect" href="https://fonts.googleapis.com">
								<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
								<link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@800&display=swap" rel="stylesheet">
								<link rel="preconnect" href="https://fonts.googleapis.com">
								<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
								<link href="https://fonts.googleapis.com/css2?family=Averia+Serif+Libre:ital,wght@1,700&display=swap" rel="stylesheet">
							<style>
									body {
											overflow: auto;
									}
									a {
										text-decoration: none;
									}
									.backpanel {
										display: block;
										margin-top: 250px;
										margin-left: auto;
										margin-right: auto;
										background: linear-gradient(-180deg, #ffffff, #eaeaea,  #a7a7a8, #7a7a7afe);
										width: 240px;
										height: 360px;
										border-radius: 7px;
										box-shadow: 0.15vw 0.3vw 0.3vw hsl(0deg 0% 0% / 0.44);
									
									}
									@media screen and (min-width: 350px) and (max-width: 400px) {
										.backpanel {
											margin-top: 120px;
										}
									}
									.form {
										position: relative;
										margin-left: 40;
										margin-bottom: 0px;
										font-size: 0.6rem;
										font-family: 'Roboto', sans-serif;
									}
									.submit {
										margin-top: 50px;
										width: 70px;
										height: 60px;
										border-radius: 30px;
										background: white;
										box-shadow: 0.15vw 0.3vw 0.3vw hsl(0deg 0% 0% / 0.44);
									}
									.return {
										margin-left: 100px;
										color: white;
									}
									.forgot {
										margin-left: 66px;
										color: white;
									}
									.unpw {
										border-radius: 5px;
									}
									#camagru {
										font-family: 'Averia Serif Libre', cursive;
										font-size: 1rem;
										margin-left: 71px;
									}
									.image {
										width: 20px;
									}
									#errorMessage {
										display: flex;
										align-items: center;
										justify-content: center;
										font-size: 2rem;
										font-family: 'Averia Serif Libre', cursive;
									}
								</style>
							</head>
							<body>
								<div class="backpanel">
									<form class="form" action="reset.php" method="POST">
										<br/>
										<br/>
										<br/>
										<br/>
										NEW PASSWORD: <input class="unpw" type="password" name="passwd" value=""/>
										<br/>
										<br/>
										VERIFY PASSWORD: <input class="unpw" type="password" name="re_passwd" value=""/>
										<input type="hidden" id="username" name="username" value='<?php echo $username;?>'>
										<input class="form submit" type="submit" name="submit" value="OK"/>
										<br/>
									</form>
									<p id="camagru">CAMAGRU<img class="image" src="../images/wow.png"></p>
									<a class="form forgot" href="../html/forgot_password.html">FORGOT PASSWORD?</a>
									</br>
									</br>
									<a class="form return" id="return" href="../php/gallery.php">RETURN</a>
								</div>
							</body>
						</html>
					<?php
				}
				else
				{
					msg_str("Something went wrong");
				}
			}
			catch(PDOException $e)
			{
				echo $stmt . "<br>" . $e->getMessage();
			}
			$conn = null;
	}
	else
	{
		msg_str("Something went wrong or you are not authorized to enter this page. Please try again or contact helpdesk.");
	}
?>