<?php 	
	include 'config.php';
	include 'SqlFunction.php';
	if(!isset($_SESSION)) {
	     session_start();
	}
?>
<script type="text/javascript" src="js/functions.js"></script>

<?php if (!isset($_SESSION['user_name']) ) { ?>
	<div class="LoginAlert"><center><h2> <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> To start buying your favorite games please login <a href="#login" onclick="loginAlert()">here</a></h2></center></div>
<?php } ?>

<div class="latestFrame">	
	<center><h2>Check out the latest game releases:</h2></center>
<?php

	$sqlGames ="SELECT * FROM products WHERE type = 'game' ORDER BY id_products DESC LIMIT 4";
	$result = mysqli_query($connection, $sqlGames);

	$k = 0;
	while($row = mysqli_fetch_assoc($result)) {

		$k++;
		$id_game = $row['id_products'];

		//images

		$rowImg = callImages($connection, $id_game);

		//Developer

		$rowDev = callDeveloper($connection, $id_game);


		//Platform

		$rowPlat = callPlatform($connection, $id_game);

?>
			
				<div class="latestGame <?php if ($k == 4){ echo 'bottomGame';}?>">
					<img src="img/imgLayout/<?php echo $rowImg['img_detail_layout']; ?>">
					<aside>
						<figcaption><?php echo $row['name_product']?></figcaption>
						<p><?php echo $rowDev['name_developer']?><br>
						<p>
						<?php echo $rowPlat['name_platform']?> / <?php
											
						$sqlGenre = "SELECT * FROM genre INNER JOIN product_genre ON id_genre = fk_id_genre INNER JOIN products ON fk_id_products = ".$row['id_products']." WHERE id_products =".$row['id_products'];
						$resultGenre = mysqli_query($connection, $sqlGenre);

						$i = 0;

						while ($rowGenre = mysqli_fetch_assoc($resultGenre)) {
							if ($i == 0) {
								echo $rowGenre['name_genre'].'-';
								$i++;
							} else {
								echo $rowGenre['name_genre'];
								}
						}
						?>
						<br><br><span><?php echo($row['price_product']) ?>€</span></p>
						<?php if (isset($_SESSION['user_name']) ) { ?>
						<button class="cartButton" onclick="addCart(<?php echo($row['id_products']) ?>)">+ Add Cart</button>
						<?php } ?>
						<a href="detail.php?id=<?php echo $row['id_products']?>"><button class="readButton">Read More</button></a>
					</aside>
					<article>
						<p><?php echo utf8_encode($row['summary_product'])?></p>	
					</article>
				</div>
<?php } ?>			
</div>