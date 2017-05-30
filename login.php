<?php
	include('config.php');
	session_start();

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/reset.css">
		<link rel="stylesheet" type="text/css" href="css/fonts.css">
		<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
		<link rel="stylesheet" type="text/css" href="css/login.css">
		<link rel="stylesheet" type="text/css" href="css/mediaQueries/desktop.css">
		<link rel="stylesheet" type="text/css" href="css/mediaQueries/tablet.css">
		<link rel="stylesheet" type="text/css" href="css/mediaQueries/mobile.css">
		<script type="text/javascript" src="js/library/jquery.js"></script>
		<script type="text/javascript" src="js/login.js"></script>
		<script type="text/javascript" src="js/resize.js"></script>
		<title>GAMESTORE</title>
	</head>
	<body>
		<header>
	
			<?php include 'header.php'; ?>
		
		</header>



		<!-- 			DISPLAYED IMAGES + NAV BAR 			-->



		<div class="frame">
				<div class="mobileSearch">
					<p><i class="fa fa-search" aria-hidden="true"></i></p>
					<input type="text" name="SearchGame" placeholder="  search here">
				</div>
				<div class="gamestore">
					<a href="index.php"><p><span>GAME</span>STORE</p></a>
				</div>	
				<div class="search">
					<p><i class="fa fa-search" aria-hidden="true"></i></p>
					<input type="text" name="SearchGame" placeholder="  search here">
				</div>
				<div class="line"></div>
			<div class="destaqueLayout">

				<?php 	
					$sqlImgDestak = "SELECT img_destak, products_id_products FROM Images WHERE img_destak != ''ORDER BY rand() LIMIT 3";
					$sqlResult = mysqli_query($connection, $sqlImgDestak);
					
					$k = 0;
					while ($rowImg = mysqli_fetch_assoc($sqlResult)){
					$k++	
				?>
				<div class="destaque <?php if ($k == 2) { echo 'destaqueFade destaqueFade2'; } elseif ($k == 3) { echo 'destaqueFade'; } ?>">
					<a href="detail.php?id=<?php echo $rowImg['products_id_products'] ?>"><img id="imgDestaque<?php if ($k == 2) { echo '2'; } elseif ($k == 3) { echo '3'; } ?>" src="img/imgDestak/<?php echo $rowImg['img_destak'] ?>"></a>
				</div>
				<?php } ?>
				<div class="chevronRight" onclick="shuffle()">
					<p><i class="fa fa-chevron-right" aria-hidden="true"></i></p>
				</div>
			</div>
			<nav class="menu">
				<ul>
					<li class="nav navSpecial" id="nav1"><a href="index.php">< GAMES</a></li>
				</ul>
			</nav>
		</div>



		<!-- 			FORM SECTION			-->



		<div class="frame2">
			<div class="newAcc">
				<h2>Create new account</h2>
			</div>
			<div class="steps">
				<ul>
					<li class="step1 
					<?php if (isset($_GET['step']) == 'billing' || isset($_GET['step']) == 'confirmation') {
				          	echo '';
				    } else {
				    		echo 'active';
				    }?>" id="step">Basic Info</li>
					<li class="step2
					<?php 
					if (isset($_GET['step'])) {
					      
					    switch ($_GET['step']) {
					        case 'billing':
					          echo 'active';
					          break;
					    	}
					    } else {
					          echo '';
				    }?>" id="step">Payment Data</li>
					<li class="step3
					<?php 
					if (isset($_GET['step'])) {
					      
					    switch ($_GET['step']) {
					        case 'confirmation':
					          echo 'active';
					          break;
					    	}
					    } else {
					          echo '';
				    }?>" id="step">Confirmation</li>
				</ul>
			</div>
			<div class="createAcc">
				
				<?php
				   if (isset($_GET['step'])) {

				      switch ($_GET['step']) {
				        case 'billing':
				          include('registrationStep2.php');
				          break;
				        case 'confirmation':
				          include('registrationStep3.php');
				          break;
				      }
				    } else {
				          include('registrationStep1.php');
				    }
				?>

			</div>	
		</div>


				<!-- 				FOOTER					-->


		<footer>
			<table>
				<thead>
					<tr>
						<th>Games</th>
						<th>Customer Service</th>
						<th>Payment Methods</th>
						<th>Social</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><a href="#nav2">Latest</a></td>
						<td><a href="contacts.php">Stores Finder</a></td>
						<td class="special"><i class="fa fa-cc-visa" aria-hidden="true"></i></td>
						<td class="special"><i class="fa fa-facebook-official" aria-hidden="true"></i></td>
					</tr>
					<tr>
						<td><a href="#nav3">Bestsellers</a></td>
						<td><a href="contacts.php">Contact Us</a></td>
						<td class="special"><i class="fa fa-cc-paypal" aria-hidden="true"></i></td>
						<td class="special"><i class="fa fa-twitter-square" aria-hidden="true"></i></i></td>
					</tr>
					<tr>
						<td><a href="#nav4">Systems</a></td>
						<td>Repair Help</td>
						<td class="special"><i class="fa fa-cc-amex" aria-hidden="true"></i></td>
						<td class="special"><i class="fa fa-google-plus-square" aria-hidden="true"></i></i></td>
					</tr>
					<tr>
						<td>Coming Soon</td>
						<td>Privacy Policy</td>
						<td></td>
						<td class="special"><i class="fa fa-twitch" aria-hidden="true"></i></td>
					</tr>
					<tr>
						<td></td>
						<td>Terms &amp; Conditions</td>
						<td></td>
						<td class="special"><i class="fa fa-youtube-square" aria-hidden="true"></i></td>
					</tr>
				</tbody>
			</table>	
		</footer>
	</body>
</html>









