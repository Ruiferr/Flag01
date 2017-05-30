<?php
	include('config.php');
	include('SqlFunction.php');
	session_start();

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/reset.css">
		<link rel="stylesheet" type="text/css" href="css/fonts.css">
		<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
		<link rel="stylesheet" type="text/css" href="css/custom.css">
		<link rel="stylesheet" type="text/css" href="css/mediaQueries/desktop.css">
		<link rel="stylesheet" type="text/css" href="css/mediaQueries/tablet.css">
		<link rel="stylesheet" type="text/css" href="css/mediaQueries/mobile.css">
		<script type="text/javascript" src="js/library/jquery.js"></script>
		<script type="text/javascript" src="js/main.js"></script>
		<script type="text/javascript" src="js/resize.js"></script>
		<title>GAMESTORE</title>
	</head>
	<body>
		<header>
			
		<?php include('header.php'); ?>

		</header>


		<!-- 			LOGIN/PROFILE WINDOW 			-->


		<?php include('loginWindow.php'); ?>



		<!-- 			DISPLAYED IMAGES + NAV BAR 			-->


		<div class="frame">
				
			<?php include('imagesNavBar.php'); ?>
			
		</div>


		<!-- 			GAMES FRAMES + SELECTION CHECKBOXES 			-->


		<div class="frame2">

			<?php include('gameSection.php'); ?>

		</div>		




		<!-- 			LATEST SECTION			-->

				


		<!-- 			BESTSELLER SECTION			-->




			

		<!-- 			SYSTEMS SECTION			-->



				<!-- 				FOOTER					-->


		<footer>

			<?php include('footer.php'); ?>
	
		</footer>
	</body>
</html>