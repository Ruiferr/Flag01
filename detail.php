<?php
	include('config.php');
	include('SqlFunction.php');

	session_start();

	$id_game = $_GET['id'];

	$row = callProduct($connection, $id_game);
	$rowDev = callDeveloper($connection, $id_game);
	$rowPlat = callPlatform($connection, $id_game);
	$rowImg = callImages($connection, $id_game);
	
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/reset.css">
		<link rel="stylesheet" type="text/css" href="css/fonts.css">
		<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
		<link rel="stylesheet" type="text/css" href="css/plugin/colorbox.css">
		<link rel="stylesheet" type="text/css" href="css/plugin/slick.css">
		<link rel="stylesheet" type="text/css" href="css/plugin/slick-theme.css">
		<link rel="stylesheet" type="text/css" href="css/plugin/rating.min.css">
		<link rel="stylesheet" type="text/css" href="css/game.css">
		<link rel="stylesheet" type="text/css" href="css/mediaQueries/desktop.css">
		<link rel="stylesheet" type="text/css" href="css/mediaQueries/tablet.css">
		<link rel="stylesheet" type="text/css" href="css/mediaQueries/mobile.css">
		<script type="text/javascript" src="js/library/jquery.js"></script>
		<script type="text/javascript" src="js/plugin/colorbox.js"></script>
		<script type="text/javascript" src="js/plugin/slick.js"></script>
		<script type="text/javascript" src="js/detail.js"></script>
		<script type="text/javascript" src="js/resize.js"></script>
		<title>GAMESTORE</title>
	</head>
	<body>
		<header>
				<div class="welcome">
					<p>Welcome to GAMESTORE</p>
				</div>
				<div class="contact">
					<a href="contacts.php"><i class="fa fa-phone" aria-hidden="true"></i></a>
					<p><a href="contacts.php">Contact us</a></p>
				</div>
				<div class="login">
					<i class="fa fa-sign-in" aria-hidden="true"></i>
					<p><?php 
						if (isset($_SESSION['user_name'])){
							echo $_SESSION['user_name'];
						} else{
							echo 'Login';
						}
					?></p>
				</div>
				<div class="cart">
					<a href="cart.php"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></a>
					<p><a href="cart.php">Cart</a> <span><?php if (isset($_SESSION['cart'])){ echo count($_SESSION['cart']); } else { echo '0';} ?><span></p>
				</div>
		</header>


		<!-- 			LOGIN/PROFILE WINDOW 			-->

		<?php include('loginWindow.php'); ?>
		
		<div class="frame">
				<div class="mobileSearch">
					<p><a href="#" onclick='searchZone()'><i class="fa fa-search" aria-hidden="true"></i></a></p>
					<input class="search-item2" type="text" name="SearchGame" placeholder="  search here">
				</div>
				<div class="gamestore">
					<a href="index.php"><p><span>GAME</span>STORE</p></a>
				</div>	
				<div class="search">
					<p><a href="#" onclick='searchZone()'><i class="fa fa-search" aria-hidden="true"></i></a></p>
					<input class="search-item" type="text" name="SearchGame" placeholder="  search here">
				</div>
				<div class="line"></div>
			<div class="destaqueLayout">
				<div class="destaque destaqueMobile">
					<img id="imgDestaque" src="img/imgLayout/<?php echo $rowImg['img_detail_layout']; ?>">
				</div>
			</div>
			<nav class="menu">
				<ul>
					<li class="nav navSpecial" id="nav1"><a href="index.php">< GAMES</a></li>
				</ul>
			</nav>
		</div>


		<!-- 				GAME OVERVIEW				-->


		<div class="frame2">
			<section class="gameOverview">
				<div class="gameName">
					<h2><?php echo utf8_encode($row['name_product']); ?></h2>
					<h3><?php echo utf8_encode($rowDev['name_developer']); ?> - <?php echo utf8_encode($rowPlat['name_platform']); ?></h3>
				</div>
				<div class="gameBuy">
					<table>
						<tr>
							<td id="rating">
								<span><?php echo utf8_encode($row['rating_product']); ?>/10</span><br> 
								<p></p>
							</td>
							<?php if (isset($_SESSION['user_name']) ) { ?>
							<td id="buyButton">
								<button onclick="addCart(<?php echo($row['id_products']) ?>)"><?php echo utf8_encode($row['price_product']); ?> €<br>
								Buy Now</button>
							</td>
							<?php } ?>
						</tr>
					</table>
				</div>
				<div class="images">
					<figure>
						<a href="img/imgDetail/<?php echo $rowImg['img_detail1']; ?>">
						<img src="img/imgDetail/<?php echo $rowImg['img_detail1']; ?>">
						</a>
					</figure>
					<figure><a href="img/imgDetail/<?php echo $rowImg['img_detail2']; ?>"><img src="img/imgDetail/<?php echo $rowImg['img_detail2']; ?>"></a></figure>
					<figure><a href="img/imgDetail/<?php echo $rowImg['img_detail3']; ?>"><img src="img/imgDetail/<?php echo $rowImg['img_detail3']; ?>"></a></figure>
					<figure><a href="img/imgDetail/<?php echo $rowImg['img_detail4']; ?>"><img src="img/imgDetail/<?php echo $rowImg['img_detail4']; ?>"></a></figure>
				</div>
				<article>
					<p><?php echo utf8_encode($row['summary_product']); ?></p>
				</article>						
			</section>
			<div class="shareArea">
			<p>Share your favorite game:</p>
				<div class="social"><a href="https://www.facebook.com/sharer/sharer.php?u=http%3A//localhost/Web/projects/flag01/detail.php"><img src="img/imgSocial/face.png"></a></div>
				<div class="social"><a href="https://twitter.com/home?status=http%3A//localhost/Web/projects/flag01/detail.php"><img src="img/imgSocial/twitter.png"></a></div>
				<div class="social"><a href="https://plus.google.com/share?url=http%3A//localhost/Web/projects/flag01/detal.php"><img src="img/imgSocial/gPlus.png"></a></div>
			</div>


			<div class="moreItems">
				<h2>Costumers also bought:</h2>
				<div class="slider">
					<?php 
						$sqlBestSellers = "SELECT id_products, name_product, sum(quantity) n_quantity , price_product FROM client INNER JOIN purchase ON id_client = fk_id_client INNER JOIN cart ON id_purchase = fk_id_purchase INNER JOIN products ON id_products = fk_id_products GROUP BY name_product ORDER BY n_quantity DESC LIMIT 8";

    					$resultBestSellers = mysqli_query($connection, $sqlBestSellers);



    					while ($rowSlider = mysqli_fetch_assoc($resultBestSellers)) {
    						
    						// call images
							$rowImg = callImages($connection, $rowSlider['id_products']);
    				
    				?>
 					<div class="item">
						<img src="img/imgCart/<?php echo $rowImg['img_cart'] ?>">
							<?php if (isset($_SESSION['user_name']) ) { ?>
							<center><button onclick="addCart(<?php echo($rowSlider['id_products']) ?>)">ADD TO CART</button></center>
							<?php } ?>
							<center><figcaption><?php echo $rowSlider['name_product'] ?><br><br><?php echo $rowSlider['price_product'] ?>€</figcaption></center>
					</div>
					<?php } ?>									
				</div>
			</div>

			<div class="extraInfo">
				<h2>More details:</h2>
			</div>
			<div class="extraContent">
				<div>
					<h3><span>Release Date: --/--/--</span></h3><br>
					<?php if ($id_game == 1) { ?>
					<p><span>LAST CHANCE TO TRANSFER FROM PS3 &amp; XBOX 360</span><br><br>Now is your last chance to transfer your existing GTA Online characters and progression from PlayStation 3 or Xbox 360 to PlayStation 4, Xbox One or PC. This will no longer be possible after March 6, 2017. <br><br>Experience the definitive version of GTAV, which features across-the-board graphical and technical improvements to deliver a stunning new level of detail, a video editor designed for advanced movie-making inside the game, and the massively upgraded GTA Online, with access to all the latest vehicles and gameplay from our continuing series of free updates including the recent Import/Export update.<br><br>For more information, visit <a href="www.rockstargames.com/gtaonline/charactertransfer">www.rockstargames.com/gtaonline/charactertransfer</a>.<br><br></p>
					<?php } ?>
				</div>
				<div class="extraFooter">
					<table>
						<tr>
							<td id="extraBorder">
								<?php 	$rowImg = callImages($connection, $id_game); ?>
								<figure><img src="img/imgDetail/<?php echo $rowImg['img_pegi']; ?>"></figure>
								<span>Pegi Rating:</span>
								<p>Suitable for people aged <?php if ($rowImg['img_pegi'] == 'pegi18.png') {
									 echo '18';
								} elseif ($rowImg['img_pegi'] == 'pegi16.png') {
									 echo '16';
								} elseif ($rowImg['img_pegi'] == 'pegi12.png') {
									 echo '12';
								} elseif ($rowImg['img_pegi'] == 'pegi7.png') {
									 echo '7';
								}	?> and over.</p>
							</td>
							<td id="extraBorder">
								<span>Genre:</span>
								<p>
									<?php
										
										$sqlGenre = "SELECT * FROM genre INNER JOIN product_genre ON id_genre = fk_id_genre INNER JOIN products ON fk_id_products = ".$row['id_products']." WHERE id_products =".$row['id_products'];

											$resultGenre = mysqli_query($connection, $sqlGenre);

											$i = 0;

											while ($rowGenre = mysqli_fetch_assoc($resultGenre)) {
													if ($i == 0) {
														echo $rowGenre['name_genre'];
														$i++;
													} else {
															echo '-'.$rowGenre['name_genre'];
														}
												}
									?>
								</p>
							</td>
							<td>
								<span>Customer Rating:</span>
								<ul class="c-rating" id="<?php echo $id_game; ?>"style="width: 100%;float: left; margin-left: 3%; margin-top: 2%;">		
								</ul>
								<p class="overallRating"></p>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	<script type="text/javascript" src="js/plugin/rating.min.js"></script>
	<script>
	// USER RATING SCRIPT

	// target element
	var el = document.querySelector('.c-rating');

	// initial rating
	var currentRating = 0;

	// max rating
	var maxRating= 5;

	// callback
	var callback = function(rating) { userRating(rating); };

	// rating instance
	var myRating = rating(el, currentRating, maxRating, callback);


	function userRating(value) {

		var id_product = $(".c-rating").attr('id');
		session = $('.login p').html();

		if (session == 'Login') {
			alert('To sucessfully register your review, please login');
		} else{
		    $.post('insertRating.php',{rating: value, id: id_product},function(data) {
		    	$('.overallRating').html(data);

		    });
		}
	 }

	</script>
	</body>
</html>










