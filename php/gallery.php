<?php
	require_once('connect.php');
	session_start();
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
		<link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@800&display=swap" rel="stylesheet">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Averia+Serif+Libre:ital,wght@1,700&display=swap" rel="stylesheet">
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


			.redirects {
				font-size: 2rem;
				font-family: 'Roboto', sans-serif;
			}

			.login {
				display: flex;
				align-items: left;
				justify-content: left;
				width: 120px;
			}
			.signupBox {
				position:relative;
			}
			.signup {
				position: absolute;
				bottom: 5;
				right: -14;
				width: 150px;
			}

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
			.imagee:hover {
				-webkit-animation:spin 2s linear infinite;
					-moz-animation:spin 2s linear infinite;
					animation:spin 2s linear infinite;
			}
			@-moz-keyframes spin { 100% { -moz-transform: rotate(360deg); } }
			@-webkit-keyframes spin { 100% { -webkit-transform: rotate(360deg); } }
			@keyframes spin { 100% { -webkit-transform: rotate(360deg); transform:rotate(360deg); } }
			a {
				font-family: 'Averia Serif Libre', cursive;
			}
			.login {
				display: flex;
				align-items: left;
				justify-content: left;
				width: 120px;
			}
			#hrNavbar {
				width: 2600px;
				height: 0px;
				background: black;
				position: fixed;
				top: 60px;
				right: -1px;
			}
			.meta {
				width: 2580px;
				height: 80px;
				background: white;
				position: fixed;
				top: -10px;
				right: 0px;
			}
			.footer {
				display: flex;
				align-items: center;
				justify-content: center;
				font-family: 'Averia Serif Libre', cursive;
				font-size: 1rem;
			}
			.pagination {
				display: flex;
				align-items: center;
				justify-content: center;
				margin-top: 50px;
				margin-bottom: 50px;
			}
		</style>
	</head>
	<body>
		<div class="meta"></div>
		<div class="redirects header ">
			<a class="login sticky" href="login_form.php">LOG IN</a>
			<a class="signup stickyB" href="../html/create.html">SIGN UP</a>
			<img class="imagee" src="../images/wow.png">
		</div>
		<?php
			$conn = connect();
			if (isset($_GET['page_no']) && $_GET['page_no']!="")
			{
				$page_no = $_GET['page_no'];
			}
			else
			{
				$page_no = 1;
			}
			$total_records_per_page = 5;
			$offset = ($page_no-1) * $total_records_per_page;
			$previous_page = $page_no - 1;
			$next_page = $page_no + 1;
			$adjacents = "2";
			$sql1 = "SELECT COUNT(*) FROM user_images";
			$stmt1 = $conn->query($sql1);
			$result1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);
			$total_records = $result1[0]['COUNT(*)'];
			$total_no_of_pages = ceil($total_records / $total_records_per_page);
			try
			{
				$conn = connect();
				$sql = "SELECT img_path, img_name, img_user FROM user_images ORDER BY id DESC LIMIT $offset, $total_records_per_page";
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
		<div class="pagination">
			<a <?php if($page_no > 1){echo "href='?page_no=$previous_page'";} ?>>Previous</a>&nbsp&nbsp&nbsp&nbsp&nbsp
			<a <?php if($page_no < $total_no_of_pages) {echo "href='?page_no=$next_page'";} ?>>Next</a>
		</div>
		<hr id="hrNavbar">
		<hr>
		<div class="footer">
			<p>CAMAGRU<img src="../images/wow.png" width="20"></p>
		</div>
	</body>
</html>