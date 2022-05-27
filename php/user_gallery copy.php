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
								<div class="mainPic">
									<img class="gallery cropped1" src=<?php echo $k['img_path'];?>>
									<!-- <form action="comments.php" method="post">
										<div>
											<textarea name="comments" id="comments">Enter comment</textarea>
										</div>
										<input type="hidden" name="image_name" value=<?php echo $k['img_name'];?>>
										<input type="hidden" name="image_user" value=<?php echo $k['img_user'];?>>
										<input type="submit" name="submit" value="Submit">
										</form>
										<form action="likes.php" method="post">
											<input type="submit" name="like_button" value="LIKE">
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
															<p><?php echo $k0['user'];?> : <?php echo $k0['msg'];?></p>
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
		<link href="https://fonts.googleapis.com/css2?family=Rubik+Glitch&display=swap" rel="stylesheet">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@800&display=swap" rel="stylesheet">
		<style>
			body {
				background: white;
			}
			.fotoform {
				position: absolute;
				top: 25vw;		}
			#submittor {
				width: 9vw;
				background-color: beige;
			}
			#hh {
				position: fixed;
				top: 0;
				left: 1.8%;
				font-family: 'Rubik Glitch', cursive;
				font-size: 0.88vw;
				color: black;
				opacity: 0.7;
			}
			#hf {
				position: fixed;
				bottom: 0;
				left: 1.8%;
				font-family: 'Rubik Glitch', cursive;
				font-size: 0.88vw;
				color: black;
				opacity: 0.7;
			}
			/* Style the header */
			.header {
			padding: 1vw 1.8vw;
			background: white;
			color: #f1f1f1;
			}

			/* The sticky class is added to the header with JS when it reaches its scroll position */
			.sticky {
			position: fixed;
			top: 0;
			width: 100%
			}

			.sticky2 {
			position: fixed;
			bottom: 0;
			width: 100%
			}

			/* Add some top padding to the page content to prevent sudden quick movement (as the header gets a new position at the top of the page (position:fixed and top:0) */
			.sticky + .content {
			padding-top: 102px;
			}
			/* .mainPic {
				position: relative;
				margin-bottom: 23vw;
				margin-left: 38.7vw;
			}
			img {
				box-shadow: 0.05vw 0.1vw 0.1vw hsl(0deg 0% 0% / 0.44);
				border-radius: 0.1vw;
			}
			.gallery {
				margin-top: 20vw;
				display: table-cell;
    			vertical-align: middle;
    			text-align:center
			}
			.cropped1 {
				width: 23vw; 
				height: 23vw; 
				object-fit: cover;
				border: 0.1vw white;
			} */
			#profile {
				position: fixed;
				top: 5%;
				left: 4%;
			}
			#photo {
				position: fixed;
				top: 5%;
				left: 45%;
			}
			#logout {
				position: fixed;
				top: 5%;
				left: 90%;
			}

		</style>
	</head>
	<body>
		<div class="header sticky" id="myHeader">
			<p id="hh"> CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU   CAMAGRU   CAMAGRU   CAMAGRU</p>
		</div>
		<div class="header sticky2" id="myHeader">
			<p id="hf"> CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU    CAMAGRU   CAMAGRU   CAMAGRU   CAMAGRU</p>
		</div>
		<a id="profile" href="profile_page.php">PROFILE</a>
		<a id="photo" href="photobooth.php">ADD PHOTO</a>
		<a id="logout" href="logout.php">LOG OUT</a>
	</body>
</html>

<script>// When the user scrolls the page, execute myFunction
window.onscroll = function() {myFunction()};

// Get the header
var header = document.getElementById("myHeader");

// Get the offset position of the navbar
var sticky = header.offsetTop;

// Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
function myFunction() {
  if (window.pageYOffset > sticky) {
	header.classList.add("sticky");
  } else {
	header.classList.remove("sticky");
  }
}

</script>