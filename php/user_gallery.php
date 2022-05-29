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
			<link href="../css/user_gallery.css" rel="stylesheet">
			
			<style>
				body {
					color: #fffff1;
				}
				#profile {
				position: fixed;
				top: 5%;
				left: 4%;
			}
			#addphoto {
				position: fixed;
				top: 5%;
				left: 42%;
			}
			#logout {
				position: fixed;
				top: 5%;
				left: 88%;
			}
			.redirects {
				font-size: 1rem;
				font-family: 'Roboto', sans-serif;
			}

hr {
	width: 2000px;
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
			</style>
		</head>
		<body>
		<div class="meta"></div>
			<div class="redirects">
				<a id="profile" href="profile_page.php">PROFILE</a>
				<a id="addphoto" href="photobooth.php">ADD PHOTO</a>
				<a id="logout" href="logout.php">LOG OUT</a>
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
			$sql = "SELECT img_path, img_name, img_user FROM user_images";
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
													<input class="submitButton" type="submit" name="submit" value="Send">
												</div>
											</form>
											<!-- <form action="likes.php" method="post">
												<input class="likeButton" type="submit" name="like_button" value="LIKE">
												<input type="hidden" name="liker" value=<?php echo $_SESSION['logged_in_user'];?>>
												<input type="hidden" name="image_name" value=<?php echo $k['img_name'];?>>
												<input type="hidden" name="image_user" value=<?php echo $k['img_user'];?>>
											</form> -->
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
