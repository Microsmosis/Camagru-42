<?php
	require_once('connect.php');
	session_start();
	if($_SESSION['logged_in_user'] == "")
		header('Location: ./gallery.php');
?>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Camagru</title>
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400&display=swap" rel="stylesheet">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Averia+Serif+Libre:ital,wght@1,700&display=swap" rel="stylesheet">
		<style>
		html {
			background: rgb(249, 249, 249);
		}
		textarea {
			resize: none;
		}
		a {
			text-decoration: none;
		}
		.image {
			display: block;
			margin-left: auto;
			margin-right: auto;
		}
		.deleteButton {
			padding: 10px;
			background: white;
			border-style: solid;
			border-color: white;
			margin-top: 16px;
		}
		#gallery {
			position: fixed;
			top: 0.9%;
			left: 8%;
		}
		#photo {
			position: fixed;
			top: 0.7%;
			left: 35%;
		}
		#settings {
			position: fixed;
			top: 0.8%;
			left: 60%;
		}
		#logout {
			position: fixed;
			top: 0.8%;
			left: 90%;
		}
		@media screen and (min-width: 300px) and (max-width: 450px) {
			#gallery {
				position: fixed;
				top: 1.2%;
				left: 6%;
			}
			#photo {
				position: fixed;
				top: 0.7%;
				left: 30%;
			}
			#settings {
				position: fixed;
				top: 1.2%;
				left: 50%;
			}
			#logout {
				position: fixed;
				top: 1.4%;
				left: 80%;
			}
		}
		#hrNavbar {
			width: 2600px;
			height: 0px;
			background: black;
			position: fixed;
			top: 60px;
			right: -1px;
		}
		#hrcomment {
			width: 373.5px;	
			border: 0.5px solid rgba(0, 0, 0, 0.132);
			margin-top: -10px;
		}
		.navPanel {
			width: 2580px;
			height: 80px;
			background: white;
			position: fixed;
			top: -10px;
			right: 0px;
		}
		.submitButton {
			padding: 10px;
			background: white;
			border-style: solid;
			border-color: white;
		}
		.commentsArea {
			display: flex;
			align-items: center;
			justify-content: center;
			margin-top: -15px;
		}
		.commentBox {
			width: 270px;
			height: 32px;
			padding: 12px;
			border-radius: 20px;
			margin-left: 5px;
			background-color: white;
			font-family: 'Montserrat', sans-serif;
			font-weight: 400;
			overflow: hidden;
			font-size: 15px;
		}
		.user_name_comment {
			font-weight: 800;
		}
		.test {
			display: flex;
			align-items: center;
			flex-direction: column;
			width: 374.5px;
			min-height: 500px;
			margin-top: 200px;
			border-radius: 2px;
			border: 1px solid rgba(0, 0, 0, 0.132);
			background-color: white;
		}
		.test1 {
			display: flex;
			align-items: center;
			flex-direction: column;
		}
		.test2 {
			display: block;
			margin-right: auto;
			margin-left: 25px;
		}
		.test3 {
			font-family: 'Montserrat', sans-serif;
			display: flex;
			font-weight: 200;
		}
		.likes {
			margin-right: 310px;
			margin-top: -36px;
			font-size: 0.7rem;
			font-family: 'Montserrat', sans-serif;
		}
		
		.footer {
			display: flex;
			align-items: center;
			justify-content: center;
			font-family: 'Averia Serif Libre', cursive;
			font-size: 1rem;
		}
		</style>
	</head>
	<body>
		<div class="navPanel"></div>
		<div class="redirects">
			<a id="gallery" href="user_gallery.php"><img src="../images/globe1.png" width="50"></a>
			<a id="photo" href="photobooth.php"><img src="../images/camera.png" width="55"></a>
			<a id="settings" href="settings.php"><img src="../images/settings.png" width="95"></a>
			<a id="logout" href="logout.php"><img src="../images/logout.png" width="45"></a>
		</div>
		<div class="test1">
			<?php
				try
				{
					$conn = connect();
					$sql = "SELECT img_path, img_name, img_user FROM user_images ORDER BY id DESC";
					$stmt = $conn->query($sql);
					$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
					if($result)
					{
						foreach($result as $k)
						{
							$img_id = $k['img_name'];
							$sql1 = "SELECT COUNT(*) FROM likes WHERE img='$img_id'";
							$stmt1 = $conn->query($sql1);
							$result1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);
							?>
								<!DOCTYPE html>
								<html>
									<body>
									<div class="test">
										<img class="image" src=<?php echo $k['img_path'];?>>
											<form action="comments.php" method="post">
													<div class="commentsArea">
														<textarea class="commentBox" name="comments" placeholder="..."></textarea>
														<input type="hidden" name="image_name" value=<?php echo $k['img_name'];?>>
														<input type="hidden" name="image_user" value=<?php echo $k['img_user'];?>>
														<button class="submitButton" type="submit" name="submit" value="Send"><img src="../images/send.png" width="25"></button>
													</form>
													<form action="delete_img.php" method="post"> <!-- could add a onclick function to check if user really wants to delete -->
																<button class="deleteButton" type="submit" name="del_button" value="Delete"> <img src="../images/delete.png" width="25"></button>
																<input type="hidden" name="image_path" value=<?php echo $k['img_path'];?>>
																<input type="hidden" name="image_name" value=<?php echo $k['img_name'];?>>
													</form>
												</div>
												<p class="likes"> LIKES : <?php echo $result1[0]['COUNT(*)'];?></p>
												<hr id="hrcomment">
												<div class="test2">
													<?php
														$sql0 = "SELECT user, msg FROM comments WHERE `img`='$img_id'";
														$stmt0 = $conn->query($sql0);
														$result0 = $stmt0->fetchAll(PDO::FETCH_ASSOC);
														foreach($result0 as $k0)
														{
															?>
															<!DOCTYPE html>
																<html>
																	<body>
																		<div class="test3">
																			<p class="comment"><div class="user_name_comment"><?php echo $k0['user'];?></div>&nbsp<?php echo $k0['msg'];?></p>
																		</div>
																	</body>
																</html>
															<?php
														}
													?>
												</div>
											</div>
									</body>
								</html>
							<?php
						}
					}
				}
				catch(PDOException $e)
				{
					echo $stmt . "<br>" . $e->getMessage();
				}
				$conn = null;
				?>
				</div>
		<hr id="hrNavbar">
		<hr>
		<div class="footer">
			<p>CAMAGRU<img src="../images/wow.png" width="20"></p>
		</div>
	</body>
</html>
