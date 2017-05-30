
<?php 
	include 'config.php';

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