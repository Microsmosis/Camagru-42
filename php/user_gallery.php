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
															<p class="commentPos"><?php echo $k0['user'];?> : <?php echo $k0['msg'];?></p>
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
		<link href="../css/user_gallery.css" rel="stylesheet">
		<style>
			
		</style>
	</head>
	<body>

	</body>
</html>
