<?php
	include 'config.php';
	session_start();

	$id = $_GET['del'];

	$newcart = [];

	
	for ($i=0; $i < count($_SESSION['cart']) ; $i++){

		if ($_SESSION['cart'][$i]!= $id) {

			array_push($newcart, $_SESSION['cart'][$i]);
			
		}

	}
	
	$_SESSION['cart'] = $newcart;


 	header('location:cart.php');

?>