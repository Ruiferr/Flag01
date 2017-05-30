<?php
	include('config.php');
	if(!isset($_SESSION)) {
	     session_start();
	}

	$sqlGames = "SELECT * FROM products INNER JOIN developer ON id_developer = fk_id_developer WHERE type = 'game' AND stock_product > 0";


	$result = mysqli_query($connection, $sqlGames);

?>

<script type="text/javascript" src="js/functions.js"></script>

<?php if (!isset($_SESSION['user_name']) ) { ?>
	<div class="LoginAlert"><center><h2> <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> To start buying your favorite games please login <a href="#login" onclick="loginAlert()">here</a></h2></center></div>
<?php } ?>

			<div class="gamesFrame">
				<aside>
					<button class="close"> < </button>
					<button class="open"> > </button>
					<nav>
						<ul>
							<li>Price</li>
							<div class="line2"></div>
								<input class="filterGroup1"  id="group-1" type="checkbox" name="filter" value="price"> up to 20 €<br>
								<input class="filterGroup2"  id="group-2"  type="checkbox" name="filter" value="price2"> 20 € - 45 €<br>
								<input class="filterGroup3"  id="group-3"  type="checkbox" name="filter" value="price3"> 45 € - 100 €<br>
							<li>Platform</li>
							<div class="line2"></div>
								<input class="filterGroup4"  id="group-4"  type="checkbox" name="filter" value="plataforma1"> Playstation 4<br>
								<input class="filterGroup5"  id="group-5"  type="checkbox" name="filter" value="plataforma2"> Xbox One<br>
								<input class="filterGroup6"  id="group-6"  type="checkbox" name="filter" value="plataforma3"> Nitendo<br>
								<input class="filterGroup7"  id="group-7"  type="checkbox" name="filter" value="plataforma4"> Pc<br>
							<li>Genre</li>
							<div class="line2"></div>
								<input class="filterGroup8"  id="group-8"  type="checkbox" name="filter" value="genre1"> RPG<br>
								<input class="filterGroup9"  id="group-9"  type="checkbox" name="filter" value="genre2"> Sports<br>
								<input class="filterGroup10"  id="group-10"  type="checkbox" name="filter" value="genre3"> Adventure<br>
								<input class="filterGroup11"  id="group-11"  type="checkbox" name="filter" value="genre4"> Fantasy<br>
								<input class="filterGroup12"  id="group-12"  type="checkbox" name="filter" value="genre5"> Action<br>
								<input class="filterGroup13"  id="group-13"  type="checkbox" name="filter" value="genre6"> FPS<br>
						</ul>
					</nav>
				</aside>

				<div class="gameLayout">
					
					<?php  
						while($row = mysqli_fetch_assoc($result)){
							$sqlImages = "SELECT * FROM images WHERE products_id_products =".$row['id_products']."";
							$resultImg = mysqli_query($connection, $sqlImages);
							$rowImg = mysqli_fetch_assoc($resultImg);
					?>
					
						<section class="game 

							<?php 
								//SELECT PRICE

								if ($row['price_product'] < 20) {
									echo "group-1 ";
								} else if ($row['price_product'] > 20 && $row['price_product'] < 45) {
									echo "group-2 ";
								} else {
									echo "group-3 ";
								}


								//SELECT GENRE AND PLATFORM

								$sqlGroupPlat = "SELECT * FROM platform INNER JOIN game_platform ON id_platform = fk_id_platform INNER JOIN products ON fk_id_products = ".$row['id_products']." WHERE id_products =".$row['id_products'];

								$resultGroupPlat = mysqli_query($connection, $sqlGroupPlat);

								while ($rowGroupPlat = mysqli_fetch_assoc($resultGroupPlat)) {
									echo "group-".$rowGroupPlat['group_id_platform']." ";
								}

								$sqlGroupGenre = "SELECT * FROM genre INNER JOIN product_genre ON id_genre = fk_id_genre INNER JOIN products ON fk_id_products = ".$row['id_products']." WHERE id_products =".$row['id_products'];

								$resultGroupGenre = mysqli_query($connection, $sqlGroupGenre);

								while ($rowGroupGenre = mysqli_fetch_assoc($resultGroupGenre)) {
									echo "group-".$rowGroupGenre['group_id_genre']." ";
								}

							?>" 

						id="1">
							<figure><a href="detail.php?id=<?php echo $row['id_products']?>"><img src="img/imgCover/<?php echo $rowImg['img_cover']; ?>"></a></figure>
								<figcaption>
									<a href="detail.php?id=<?php echo $row['id_products']?>"><?php echo utf8_encode($row['name_product']); ?></a>
								</figcaption>
									<p><?php 

											$sqlPlatform = "SELECT * FROM platform INNER JOIN game_platform ON id_platform = fk_id_platform INNER JOIN products ON fk_id_products = ".$row['id_products']." WHERE id_products = ".$row['id_products'];

											$resultPlatform = mysqli_query($connection, $sqlPlatform);

											while ($rowPlatform = mysqli_fetch_assoc($resultPlatform)) {
													echo $rowPlatform['name_platform'];
												}
										?>/<?php 
											
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

										?><br>
									<br><span><?php echo utf8_encode($row['price_product']);?> €</span></p>
									<?php if (isset($_SESSION['user_name']) ) { ?>
									<button class="cartButton" onclick="addCart(<?php echo($row['id_products']) ?>)">+Add Cart</button>
									<?php } ?>
						</section>
						

					<?php } ?>


				</div>
			</div>