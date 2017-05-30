<?php 
	
	include ('config.php');
	session_start();

	$cardType = $_POST['cardType'];
	$cardNumber = $_POST['cardNumber'];
	$expire_date = $_POST['expirationDate'];
	$cvv = $_POST['cvv'];
	$cardName = $_POST['cardName'];
	$userName = $_POST['nameClient'];


	$sqlUser = "SELECT * FROM client WHERE login_client = '".$userName."'";

	$resultSqlUser = mysqli_query($connection, $sqlUser);

	$user = mysqli_fetch_assoc($resultSqlUser);
	
	$sqlPayment = "INSERT INTO `payment_method` (`payment_method`, `fk_id_client`, `card_number`, `expire_date`, `cvv`, `card_name`) VALUES ('".$cardType."', '".$user['id_client']."', '".$cardNumber."', '".$expire_date."', '".$cvv."', '".$cardName."')";

	mysqli_query($connection, $sqlPayment);


	header('Location:login.php?step=confirmation');
	
?>