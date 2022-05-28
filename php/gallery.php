
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Camagru</title>
		
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@800&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="../css/user_gallery.css">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@800&display=swap" rel="stylesheet">
		
		<style>
			body {
				background: white;

				overflow-x: hidden;
	
			}
			.header {
				background: rgb(255, 255, 255);
				color: #f1f1f1;
			}

			.sticky {
				position: fixed;
				top: 10;
				width: 100%
			}

			.stickyB {
				position: fixed;
				display: flex;
				align-items: right;
				justify-content: right:
				width: 100%
			}
			.sticky + .content {
			padding-top: 102px;
			}
			.imagee {
				position: fixed;
				top: 10;
				right: 25;
				width: 50px;

				}
		</style>
	</head>
	<body>
	
			<div class="redirects header ">
				<a class="login sticky" href="login_form.php">LOG IN</a>
					<a class="signup stickyB" href="../html/create.html">SIGN UP</a>
					<img class="imagee" src="../images/wow.png">
		</div>
	</body>
</html>



<?php
	require_once('connect.php');
	session_start();
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
