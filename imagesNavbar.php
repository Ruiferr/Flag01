<?php 
	include 'config.php';

?>
				<div class="mobileSearch">
					<p><a href="#" onclick='carregaZona("search")'><i class="fa fa-search" aria-hidden="true"></i></a></p>
					<input class="search-item2" type="text" name="SearchGame" placeholder="  search here">
				</div>
				<div class="gamestore">
					<a href="index.php"><p><span>GAME</span>STORE</p></a>
				</div>	
				<div class="search">
					<p><a href="#" onclick='carregaZona("search")'><i class="fa fa-search" aria-hidden="true"></i></a></p>
					<input class="search-item" type="text" name="SearchGame" placeholder="  search here">
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
					<li class="nav" id="nav1" onclick='carregaZona("games")'>GAMES</li>
					<li class="nav" id="nav2" onclick='carregaZona("latest")'>LATEST</li>
					<li class="nav" id="nav3" onclick='carregaZona("bestseller")'>BESTSELLERS</li>
					<li class="nav" id="nav4" onclick='carregaZona("systems")'>SYSTEMS</li>
				</ul>
			</nav>