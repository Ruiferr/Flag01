<script type="text/javascript" src="js/functions.js"></script>
			
<?php 
	include 'config.php';
	include 'SqlFunction.php';
	if(!isset($_SESSION)) {
	     session_start();
	}


	$sqlTopPS4 = "SELECT platform, id_products, name_product, sum(quantity) n_quantity FROM client INNER JOIN purchase ON id_client = fk_id_client INNER JOIN cart ON id_purchase = fk_id_purchase INNER JOIN products ON id_products = fk_id_products WHERE platform = 'PS4' GROUP BY name_product ORDER BY n_quantity DESC LIMIT 3";

	$sqlTopXbox = "SELECT platform, id_products, name_product, sum(quantity) n_quantity FROM client INNER JOIN purchase ON id_client = fk_id_client INNER JOIN cart ON id_purchase = fk_id_purchase INNER JOIN products ON id_products = fk_id_products WHERE platform = 'Xbox' GROUP BY name_product ORDER BY n_quantity DESC LIMIT 3";

	$sqlTopPC = "SELECT platform, id_products, name_product, sum(quantity) n_quantity FROM client INNER JOIN purchase ON id_client = fk_id_client INNER JOIN cart ON id_purchase = fk_id_purchase INNER JOIN products ON id_products = fk_id_products WHERE platform = 'PC' GROUP BY name_product ORDER BY n_quantity DESC LIMIT 3";

    $resultPS4 = mysqli_query($connection, $sqlTopPS4);
    $resultXbox = mysqli_query($connection, $sqlTopXbox);
    $resultPC = mysqli_query($connection, $sqlTopPC);

?>

<?php if (!isset($_SESSION['user_name']) ) { ?>
	<div class="LoginAlert"><center><h2> <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> To start buying your favorite games please login <a href="#login" onclick="loginAlert()">here</a></h2></center></div>
<?php } ?>


			<div class="bestsellerFrame">	
				<div class="title"><h2>This year:</h2></div>
				<aside>
					<select id="option" onchange="select()">
						<option value="pc">PC</option>
						<option value="ps4">PS4</option>
						<option value="xbox">Xbox</option>
					</select>
				</aside>
				<div class="top">

					<!-- RESULTS PS4 -->

				    <?php while ($rowPS4 = mysqli_fetch_assoc($resultPS4)){

				    	//Call Product
						$row = callProduct($connection, $rowPS4['id_products']);
				    	//Call Platform
						$rowPlat = callPlatform($connection, $rowPS4['id_products']);
				    	//Call Developer
						$rowDev = callDeveloper($connection, $rowPS4['id_products']);
				    	//Call Images
						$rowImg = callImages($connection, $rowPS4['id_products']);

					?>
					<div class="topGame group1">
						<figure><a href="game.html"><img src="img/imgCover/<?php echo $rowImg['img_cover'] ?>"></figure></a>
						<div class="rating"><p>Rating: <span><?php echo $row['rating_product'] ?>/10</span></p></div>
						<figcaption>
							<a href="game.html"><h3><?php echo $rowPS4['name_product'] ?></h3></a><br>
							<p><span><?php echo $rowDev['name_developer'] ?></span></p><br>
							<p><?php echo $rowPlat['name_platform'] ?> / 
							<?php 
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
									}?></p><br>
							<p><?php echo $row['price_product'] ?> €</p>	
						</figcaption>
						<div class="buyRead">
							<?php if (isset($_SESSION['user_name']) ) { ?>
							<button class="cartButton" onclick="addCart(<?php echo($row['id_products']) ?>)">+ Add Cart</button>
							<?php } ?>
							<a href="detail.php?id=<?php echo $row['id_products']?>"><button class="readButton">Read More</button></a>
						</div>
					</div>
					<?php } ?>

					<!-- RESULTS PC -->

				    <?php while ($rowPC = mysqli_fetch_assoc($resultPC)){

				    	//Call Product
						$row = callProduct($connection, $rowPC['id_products']);
				    	//Call Platform
						$rowPlat = callPlatform($connection, $rowPC['id_products']);
				    	//Call Developer
						$rowDev = callDeveloper($connection, $rowPC['id_products']);
				    	//Call Images
						$rowImg = callImages($connection, $rowPC['id_products']);

					?>
					<div class="topGame group2">
						<figure><a href="game.html"><img src="img/imgCover/<?php echo $rowImg['img_cover'] ?>"></figure></a>
						<div class="rating"><p>Rating: <span><?php echo $row['rating_product'] ?>/10</span></p></div>
						<figcaption>
							<a href="game.html"><h3><?php echo $rowPC['name_product'] ?></h3></a><br>
							<p><span><?php echo $rowDev['name_developer'] ?></span></p><br>
							<p><?php echo $rowPlat['name_platform'] ?> / 
							<?php 
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
									}?></p><br>
							<p><?php echo $row['price_product'] ?> €</p>	
						</figcaption>
						<div class="buyRead">
							<?php if (isset($_SESSION['user_name']) ) { ?>
							<button class="cartButton" onclick="addCart(<?php echo($row['id_products']) ?>)">+ Add Cart</button>
							<?php } ?>
							<a href="detail.php?id=<?php echo $row['id_products']?>"><button class="readButton">Read More</button></a>
						</div>
					</div>
					<?php } ?>

					<!-- RESULTS XBOX -->

				    <?php while ($rowXbox = mysqli_fetch_assoc($resultXbox)){

				    	//Call Product
						$row = callProduct($connection, $rowXbox['id_products']);
				    	//Call Platform
						$rowPlat = callPlatform($connection, $rowXbox['id_products']);
				    	//Call Developer
						$rowDev = callDeveloper($connection, $rowXbox['id_products']);
				    	//Call Images
						$rowImg = callImages($connection, $rowXbox['id_products']);

					?>
					<div class="topGame group3">
						<figure><a href="game.html"><img src="img/imgCover/<?php echo $rowImg['img_cover'] ?>"></figure></a>
						<div class="rating"><p>Rating: <span><?php echo $row['rating_product'] ?>/10</span></p></div>
						<figcaption>
							<a href="game.html"><h3><?php echo $rowXbox['name_product'] ?></h3></a><br>
							<p><span><?php echo $rowDev['name_developer'] ?></span></p><br>
							<p><?php echo $rowPlat['name_platform'] ?> / 
							<?php 
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
									}?></p><br>
							<p><?php echo $row['price_product'] ?> €</p>	
						</figcaption>
						<div class="buyRead">
							<?php if (isset($_SESSION['user_name']) ) { ?>
							<button class="cartButton" onclick="addCart(<?php echo($row['id_products']) ?>)">+ Add Cart</button>
							<?php } ?>
							<a href="detail.php?id=<?php echo $row['id_products']?>"><button class="readButton">Read More</button></a>
						</div>
					</div>
					<?php } ?>

				</div>
			</div>	