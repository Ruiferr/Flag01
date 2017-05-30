<script type="text/javascript" src="js/functions.js"></script>
<?php 
	include 'config.php';
	include 'SqlFunction.php';
	if(!isset($_SESSION)) {
	     session_start();
	}

	$sqlConsole = "SELECT * FROM products WHERE type = 'console'";
	$sqlAccessories = "SELECT * FROM products WHERE type = 'accessory'";
	$sqlDesktop = "SELECT * FROM products WHERE type = 'desktop'";
	$sqlPortable = "SELECT * FROM products WHERE type = 'portable'";
	$sqlResult = mysqli_query($connection, $sqlConsole);
	$sqlResult2 = mysqli_query($connection, $sqlAccessories);
	$sqlResult3 = mysqli_query($connection, $sqlDesktop);
	$sqlResult4 = mysqli_query($connection, $sqlPortable);

?>
<?php if (!isset($_SESSION['user_name']) ) { ?>
	<div class="LoginAlert"><center><h2> <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> To start buying your favorite games please login <a href="#login" onclick="loginAlert()">here</a></h2></center></div>
<?php } ?>

		
			<div class="systemFrame">	
				<div class="title"><h2>Consoles:</h2></div>
				<aside>
					<select id="option2" onchange="select2()">
						<option value="all">All</option>
						<option value="ps4">PS4</option>
						<option value="xbox">Xbox</option>
						<option value="nitendo">Nitendo</option>
						<option value="accessories">Accessories</option>
					</select>
				</aside>
				<div class="product">
				<?php while ($rowConsole = mysqli_fetch_assoc($sqlResult)){

					// call images
					$rowImg = callImages($connection, $rowConsole['id_products']);

					?>
					<div class="productFrame <?php 								
						$sqlGroupPlat = "SELECT * FROM platform INNER JOIN game_platform ON id_platform = fk_id_platform INNER JOIN products ON fk_id_products = ".$rowConsole['id_products']." WHERE id_products =".$rowConsole['id_products'];

						$resultGroupPlat = mysqli_query($connection, $sqlGroupPlat);

						while ($rowGroupPlat = mysqli_fetch_assoc($resultGroupPlat)) {
								echo "group".$rowGroupPlat['group_id_platform']." ";
							} ?>">
						<figure class="prod2"><img src="img/imgCover/<?php echo $rowImg['img_cover']; ?>"></figure>
						<figcaption class="prod2">
							<h3><?php echo utf8_encode($rowConsole['name_product']); ?></h3><br>
							<p><span><?php echo utf8_encode($rowConsole['detail']); ?></span></p><br>
							<p></p><br>
							<p><?php echo $rowConsole['price_product']; ?> €</p>
							<button class="readButton" id="<?php echo $rowConsole['id_products']; ?>">Read More</button>
							<?php if (isset($_SESSION['user_name']) ) { ?>
							<button class="cartButton" onclick="addCart(<?php echo($rowConsole['id_products']) ?>)">+ Add Cart</button>
							<?php } ?>
						</figcaption>
						<article class="<?php echo $rowConsole['id_products']; ?>">
							<p>
							<?php echo utf8_encode($rowConsole['summary_product']); ?>
							</p>
						</article>
					</div>
				<?php } ?>

				<?php while ($rowAccessories = mysqli_fetch_assoc($sqlResult2)){

					// call images
					$rowImg = callImages($connection, $rowAccessories['id_products']);

					?>
					<div class="productFrame <?php 								
						$sqlGroupPlat = "SELECT * FROM platform INNER JOIN game_platform ON id_platform = fk_id_platform INNER JOIN products ON fk_id_products = ".$rowAccessories['id_products']." WHERE id_products =".$rowAccessories['id_products'];

						$resultGroupPlat = mysqli_query($connection, $sqlGroupPlat);

						while ($rowGroupPlat = mysqli_fetch_assoc($resultGroupPlat)) {
								echo "group".$rowGroupPlat['group_id_platform']." ";
							} ?>">
						<figure class="prod2"><img src="img/imgCover/<?php echo $rowImg['img_cover']; ?>"></figure>
						<figcaption class="prod2">
							<h3><?php echo utf8_encode($rowAccessories['name_product']); ?></h3><br>
							<p><span><?php echo utf8_encode($rowAccessories['detail']); ?></span></p><br>
							<p></p><br>
							<p><?php echo $rowAccessories['price_product']; ?> €</p>
							<button class="readButton" id="<?php echo $rowAccessories['id_products']; ?>">Read More</button>
							<?php if (isset($_SESSION['user_name']) ) { ?>
							<button class="cartButton" onclick="addCart(<?php echo($rowAccessories['id_products']) ?>)">+ Add Cart</button>
							<?php } ?>		
						</figcaption>
						<article class="<?php echo $rowAccessories['id_products']; ?>">
							<p>
							<?php echo utf8_encode($rowAccessories['summary_product']); ?>
							</p>
						</article>
					</div>
				<?php } ?>
				</div>


				<div class="title"><h2>Desktops / PC Portables:</h2></div>
				<aside>
					<select id="option3" onchange="select3()">
						<option value="all2">All</option>
						<option value="desk">Desktops</option>
						<option value="port">Pc Portables</option>
					</select>
				</aside>
				<div class="product">

				<?php while ($rowDesktop = mysqli_fetch_assoc($sqlResult3)){

					// call images
					$rowImg = callImages($connection, $rowDesktop['id_products']);

				?>
					<div class="productFrame group7">
						<figure class="prod14"><img src="img/imgCover/<?php echo $rowImg['img_cover']; ?>"></figure>
						<figcaption class="prod14">
							<h3><?php echo utf8_encode($rowDesktop['name_product']); ?></h3><br>
							<p><span><?php echo utf8_encode($rowDesktop['detail']); ?></span></p><br>
							<p></p><br>
							<p><?php echo $rowDesktop['price_product']; ?> €</p>
							<button class="readButton" id="<?php echo $rowDesktop['id_products']; ?>">Read More</button>
							<?php if (isset($_SESSION['user_name']) ) { ?>
							<button class="cartButton" onclick="addCart(<?php echo($rowDesktop['id_products']) ?>)">+ Add Cart</button>
							<?php } ?>		
						</figcaption>
						<article class="<?php echo $rowDesktop['id_products']; ?>">
							<p>
							<?php echo utf8_encode($rowDesktop['summary_product']); ?>
							</p>
						</article>
					</div>
					<?php } 
					
					while ($rowPortable = mysqli_fetch_assoc($sqlResult4)){

					// call images
					$rowImg = callImages($connection, $rowPortable['id_products']);

					?>
					<div class="productFrame group9">
						<figure class="prod16"><img src="img/imgCover/<?php echo $rowImg['img_cover']; ?>"></figure>
						<figcaption class="prod16">
							<h3><?php echo utf8_encode($rowPortable['name_product']); ?></h3><br>
							<p><span><?php echo utf8_encode($rowPortable['detail']); ?></span></p><br>
							<p></p><br>
							<p><?php echo $rowPortable['price_product']; ?>€</p>
							<button class="readButton" id="<?php echo $rowLaptop['id_products']; ?>">Read More</button>
							<?php if (isset($_SESSION['user_name']) ) { ?>
							<button class="cartButton" onclick="addCart(<?php echo($rowPortable['id_products']) ?>)">+ Add Cart</button>
							<?php } ?>		
						</figcaption>
						<article class="<?php echo $rowLaptop['id_products']; ?>">
							<p>
							<?php echo utf8_encode($rowPortable['summary_product']); ?>
							</p>
						</article>
					</div>
					<?php } ?>

				</div>
			</div>