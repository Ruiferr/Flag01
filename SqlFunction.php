<?php 

function callProduct($connection, $id_product){
	
	$sqlGame = "SELECT * FROM products WHERE id_products = ".$id_product;
	$result = mysqli_query($connection, $sqlGame);
	$row = mysqli_fetch_assoc($result);

	return $row;
}

function callPlatform($connection, $id_product){
	
	$sqlPlatform = "SELECT * FROM platform INNER JOIN game_platform ON id_platform = fk_id_platform INNER JOIN products ON fk_id_products = id_products WHERE id_products = ".$id_product;
	$resultPlat = mysqli_query($connection, $sqlPlatform);
	$rowPlat = mysqli_fetch_assoc($resultPlat);

	return $rowPlat;
}

function callGenre($connection, $id_product){
	
	$sqlGenre = "SELECT * FROM genre INNER JOIN product_genre ON id_genre = fk_id_genre INNER JOIN products ON fk_id_products = ".$id_product." WHERE id_products =".$id_product;
	$resultGenre = mysqli_query($connection, $sqlGenre);
	$rowGenre = mysqli_fetch_assoc($resultGenre);

}

function callDeveloper($connection, $id_product){
	
	$sqlDeveloper = "SELECT * FROM developer INNER JOIN products ON id_developer = fk_id_developer WHERE id_products =".$id_product;
	$resultDev = mysqli_query($connection, $sqlDeveloper);
	$rowDev = mysqli_fetch_assoc($resultDev);

	return $rowDev;
}

function callImages($connection, $id_product){
	
	$sqlImages = "SELECT * FROM images WHERE products_id_products =".$id_product."";
	$resultImg = mysqli_query($connection, $sqlImages);
	$rowImg = mysqli_fetch_assoc($resultImg);

	return $rowImg;
}


function callPayment($connection, $id_client){
	
	$sqlPayment = "SELECT * FROM `payment_method` WHERE	fk_id_client = ".$id_client."";
	$result = mysqli_query($connection, $sqlPayment);
	$rowPay = mysqli_fetch_assoc($result);

	return $rowPay;
}

function callClient($connection, $id_client){
	
	$sqlClient = "SELECT * FROM client WHERE id_client = ".$id_client."";
	$result = mysqli_query($connection, $sqlClient);
	$rowClient = mysqli_fetch_assoc($result);

	return $rowClient;
}
?>