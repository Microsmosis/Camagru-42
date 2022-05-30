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
					margin-top: 200px;
					margin-bottom: 5px;
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
				.commentsArea {
					display: flex;
					align-items: center;
					justify-content: center;
				}
				.commentBox {
					width: 444px;
					height: 42px;
					padding: 10px;
					border-radius: 2px;
					background-color: #fffff8;
					font-family: 'Roboto Mono', monospace;
					font-weight: bold;
					margin-bottom: 0px;
				}
				.submitButton {
					padding: 10px;
					border-radius: 4px;
					font-family: 'Roboto Mono', monospace;
					margin-bottom: 2px;
					background: white;
					box-shadow: 1px 2px 2px hsl(0deg 0% 0% / 0.44);
					border-color: white;
				}
				.allCommentsPos{
					display: block;
					margin-left: auto;
					margin-right: auto;
				}
				.allComments{
					width: 500px;
					padding: 17px;
					border-radius: 1px;
					background-color: #fffff8;
					font-family: 'Roboto Mono', monospace;
					margin-bottom: 2px;
				}
				#profile {
					position: fixed;
					top: 0.7%;
					left: 4%;
				}
				#addphoto {
					position: fixed;
					top: 0.7%;
					left: 47%;
				}
				#logout {
					position: fixed;
					top: 0.7%;
					left: 92%;
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
					right: -1px;
				}
				.meta {
					width: 2000px;
					height: 80px;
					background: white;
					position: fixed;
					top: -10px;
					right: 0px;
				}
				.likeButton {
					padding: 10px;
					border-radius: 4px;
					font-family: 'Roboto Mono', monospace;
					background: white;
					box-shadow: 1px 2px 2px hsl(0deg 0% 0% / 0.44);
					border-color: white;
				}
			</style>
		</head>
		<body>
		<div class="meta"></div>
			<div class="redirects">
				<a id="profile" href="profile_page.php"><img src="../images/profile.png"></a>
				<a id="addphoto" href="photobooth.php"><img src="../images/camera.png"></a>
				<a id="logout" href="logout.php"><img src="../images/logout.png"></a>
			</div>
			<hr>
		</body>
	</html>
<?php
	require_once('connect.php');
	session_start();
	if($_SESSION['logged_in_user'] == "")
		header('Location: ./gallery.php');
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
								<img class="image" src=<?php echo $k['img_path'];?>>
									<form action="comments.php" method="post">
											<div class="commentsArea">
												<textarea class="commentBox" name="comments">Enter comment</textarea>
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
														<div class="commentsArea">
															<textarea class="allComments"><?php echo $k0['user'];?>     <?php echo $k0['msg'];?></textarea>
														</div>
													</body>
												</html>
											<?php
										}
									?>
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
