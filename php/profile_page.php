

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
		<link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@800&display=swap" rel="stylesheet">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@100&display=swap" rel="stylesheet">
		<style>
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
				@media screen and (min-width: 376px) and (max-width: 510px) {
					.image {
						width: 500px;
						margin-left: -8px;
					}
				}
				@media screen and (min-width: 300px) and (max-width: 375px) {
					.image {
						width: 375px;
						margin-left: -8px;
					}
				}
			.deleteButton {
				padding: 10px;
					background: white;
					border-style: solid;
					border-color: white;
					margin-top: 16px;
			}

			#settings {
				position: fixed;
				top: 0.7%;
				left: 62%;
			}
			#photo {
				position: fixed;
				top: 0.7%;
				left: 32%;
			}
			#gallery {
				position: fixed;
				top: 0.7%;
				left: 4%;
			}
			#logout {
				position: fixed;
				top: 0.7%;
				left: 90%;
			}
			.redirects {
			font-size: 1rem;
			font-family: 'Roboto', sans-serif;
		}
		hr {
			width: 2600px;
			height: 0px;
			background: black;
			position: fixed;
			top: 60px;
			right: 0px;
			
		}
		.meta {
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
					width: 380px;
					height: 32px;
					padding: 10px;
					border-radius: 20px;
					margin-left: 5px;
					background-color: white;
					font-family: 'Roboto Mono', monospace;
					overflow: hidden;
				}
				.comment {
					
				}
				.user_name_comment {
					font-weight: 800;
				}
				.test1 {
					display: flex;
					align-items: center;
					flex-direction: column;
				}
				.test {
					display: flex;
					align-items: center;
					flex-direction: column;
					width: 500px;
					min-height: 500px;
					margin-top: 200px;
					border-radius: 2px;
					box-shadow: 1px 2px 2px hsl(0deg 0% 0% / 0.44);
					background-color: white;
				}
				.test2 {
					display: block;
					margin-right: auto;
					margin-left: 25px;
				}
				.test3 {
					display: flex;
				}
		</style>
	</head>
	<body>
		<div class="meta"></div>
		<div class="redirects">
			<a id="gallery" href="user_gallery.php"><img src="../images/globe.png" width="50"></a>
			<a id="photo" href="photobooth.php"><img src="../images/camera.png"></a>
			<a id="settings" href="settings.php"><img src="../images/settings.png"></a>
			<a id="logout" href="logout.php"><img src="../images/logout.png"></a>
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
							?>
								<!DOCTYPE html>
								<html>
									<body>
									<div class="test">
										<img class="image" src=<?php echo $k['img_path'];?>>
											<form action="comments.php" method="post">
													<div class="commentsArea">
														<textarea class="commentBox" name="comments">...</textarea>
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
		<hr>
	</body>
</html>
