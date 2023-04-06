<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>View</title>
	<link rel="stylesheet" type="text/css" href="webdesign.css">

	<style>
        ul {
			list-style-type: none;
			margin: 0;
			padding: 0;
			overflow: hidden;
			background-color: #333;
		}

		li {
			float: left;
		}

		li a {
			display: block;
			color: white;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
		}

		li a:hover {
			background-color: #111;
		}

		body {
			display: flex;
			flex-direction: column;
			align-items: center;
			min-height: 100vh;
		}

		.video-container {
			display: flex;
			flex-wrap: wrap;
			margin-top: 50px;
		}

		video {
			width: 640px;
			height: 360px;
			border: 2px solid #333;
			margin: 10px;
            background-color: black;
		}

		a {
			text-decoration: none;
			color: #006CFF;
			font-size: 1.5rem;
		}
	</style>
</head>
<body>
	<header>
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="index.php">Upload</a></li>
			<li><a href="#contact">Change password</a></li>
		</ul>
	</header>

	<div class="video-container">
		<?php 
			include "db_conn.php";
			$sql = "SELECT * FROM videos ORDER BY id DESC";
			$res = mysqli_query($conn, $sql);

			if (mysqli_num_rows($res) > 0) {
				while ($video = mysqli_fetch_assoc($res)) { 
		?>
			<video src="uploads/<?=$video['video_url']?>" 
				   controls>
			</video>
		<?php 
				}
			}else {
				echo "<h1>Empty</h1>";
			}
		?>
	</div>
</body>
</html>
