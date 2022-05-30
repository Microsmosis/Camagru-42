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
											<!-- <form action="delete_img.php" method="post">
												<input type="submit" name="del_button" value="DELETE">
												<input type="hidden" name="image_path" value=<?php echo $k['img_path'];?>>
												<input type="hidden" name="image_name" value=<?php echo $k['img_name'];?>>
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
																<textarea class="allComments"><?php echo $k0['user'];?>  <?php echo $k0['msg'];?></textarea>
															</div>
														</body>
													</html>
												<?php
										}
									?>
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
			body {
				background: white;
			}
			/* Style the header */
			.header {
/* 			padding: 10px 16px; */
			background: rgb(255, 255, 255);
			color: #f1f1f1;
			}

			/* The sticky class is added to the header with JS when it reaches its scroll position */
			.sticky {
			position: fixed;
			top: 0;
			width: 100%
			}

			/* Add some top padding to the page content to prevent sudden quick movement (as the header gets a new position at the top of the page (position:fixed and top:0) */
			.sticky + .content {
			padding-top: 102px;
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
				margin-bottom: 2px;
			}

			.submitButton {
				height: 62px;
				padding: 10px;
				border-radius: 4px;
				font-family: 'Roboto Mono', monospace;
				margin-bottom: 2px;
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

			.likeButton {
				height: 52px;
				padding: 10px;
				border-radius: 4px;
				font-family: 'Roboto Mono', monospace;
			}

			#settings {
				position: fixed;
				top: 2%;
				left: 4%;
			}
			#photo {
				position: fixed;
				top: 2%;
				left: 32%;
			}
			#gallery {
				position: fixed;
				top: 2%;
				left: 62%;
			}
			#logout {
				position: fixed;
				top: 2%;
				left: 90%;
			}
			.redirects {
			font-size: 1rem;
			font-family: 'Roboto', sans-serif;
		}
		hr {
			width: 2580px;
			height: 0px;
			background: black;
			position: fixed;
			top: 60px;
			
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
			<a id="settings" href="settings.php">SETTINGS</a>
			<a id="photo" href="photobooth.php">ADD PHOTO</a>
			<a id="gallery" href="user_gallery.php">GALLERY</a>
			<a id="logout" href="logout.php">LOG OUT</a>
		</div>
		<hr>
	</body>
</html>
