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
				#profile {
					position: fixed;
					top: 0.7%;
					left: 13%;
				}
				#addphoto {
					position: fixed;
					top: 0.7%;
					left: 47.8%;
				}
				#logout {
					position: fixed;
					top: 0.7%;
					left: 84%;
				}
				@media screen and (min-width: 300px) and (max-width: 450px) {
					#profile {
						position: fixed;
						top: 0.7%;
						left: 13%;
					}
					#addphoto {
						position: fixed;
						top: 0.7%;
						left: 44%;
					}
					#logout {
						position: fixed;
						top: 0.7%;
						left: 77%;
					}
				}
				@media screen and (min-width: 1500px) and (max-width: 2800px) {
					#profile {
						position: fixed;
						top: 0.7%;
						left: 13%;
					}
					#addphoto {
						position: fixed;
						top: 0.7%;
						left: 48.8%;
					}
					#logout {
						position: fixed;
						top: 0.7%;
						left: 84%;
					}
				}
				#hrNavbar {
					width: 2800px;
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
					width: 2800px;
					height: 80px;
					background: white;
					position: fixed;
					top: -10px;
					right: 0px;
				}
				.likeButton {
					padding: 10px;
					background: white;
					border-style: solid;
					border-color: white;
					margin-top: 16px;
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
				<a id="profile" href="profile_page.php"><img src="../images/profile.png" width="50"></a>
				<a id="addphoto" href="photobooth.php"><img src="../images/camera.png" width="50"></a>
				<a id="logout" href="logout.php"><img src="../images/logout.png" width="50"></a>
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
														<form action="likes.php" method="post">
															<button class="likeButton" type="submit" name="like_button" value="Like"><img src="../images/like.png" width="25"></button>
															<input type="hidden" name="liker" value=<?php echo $_SESSION['logged_in_user'];?>>
															<input type="hidden" name="image_name" value=<?php echo $k['img_name'];?>>
															<input type="hidden" name="image_user" value=<?php echo $k['img_user'];?>>
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
																				<p><div class="user_name_comment"><?php echo $k0['user'];?></div>&nbsp<?php echo $k0['msg'];?></p>
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
