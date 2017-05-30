<?php
	include 'config.php';
	include('SqlFunction.php');
	session_start();

	//id payment method
	
	$rowPay = callPayment($connection, $_SESSION['user_id']);

	$payment_method = utf8_encode($rowPay['id_payment_method']);


	// insert purchase

	$sqlPurchase = "INSERT INTO purchase(fk_id_payment_method, fk_id_client) VALUES(".$payment_method.",".$_SESSION['user_id'].")";
	
	mysqli_query($connection, $sqlPurchase);

	$id_purchase = mysqli_insert_id($connection);

	
	// insert cart

	for($i=0; $i<count($_SESSION['cart']); $i++){

		//Platform
		$rowPlat = callPlatform($connection, $_SESSION['cart'][$i]);

		$platform = $rowPlat['name_platform'];


		//Products

		$row = callProduct($connection, $_SESSION['cart'][$i]);

		$price = $_SESSION['qty'][$i] * $row['price_product'];

		//Insert Cart

		$sqlCart = "INSERT INTO cart(fk_id_products, fk_id_purchase, quantity, value, platform)
		 VALUES (".$_SESSION['cart'][$i].",".$id_purchase.",".$_SESSION['qty'][$i].",".$price.","."'".$platform."'".")";

		 mysqli_query($connection, $sqlCart);


		 //Update Stock
		 $stock = $row['stock_product'];
		 $update_stock = $stock -1;

		 $sqlUpdateStock="UPDATE products SET stock_product=".$update_stock." WHERE id_products=".$_SESSION['cart'][$i];

		 mysqli_query($connection, $sqlUpdateStock);

	}

	// reset

	$_SESSION['cart']=[];
	mysqli_close($connection);

?>

<div>
	<h2>Thank you for chosing GameStore!</h2>
	<p style="width: 90%;padding: 4%;font-size: 19px;">Your purchase will be delivered in 4-5 business days. You will receive an email with your carrier's package tracking system and a discount code for your next purchase. We hope to see you soon!</p>
</div>

