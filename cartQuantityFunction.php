<?php
	include 'config.php';
	session_start();
	/*
	$id = $_POST['value'];
	$quantity = $_POST['amount'];

	$sqlGame = "SELECT * FROM products WHERE id_products = ".$id."";
	$result = mysqli_query($connection, $sqlGame);
	$row = mysqli_fetch_assoc($result);



	$sub = $quantity * $row['price_product'];
	*/
	
	$sub = $_POST['value'];

	echo $sub;
?>