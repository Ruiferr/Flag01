<?php 
	include('config.php');
	session_start();

	$userName = $_POST['userName'];
	$email = $_POST['email'];
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$country = $_POST['country'];
	$adress = $_POST['adress'];
	$postal = $_POST['postalCode'];
	$pass = $_POST['password'];
	$cardType = $_POST['cardType'];
	$cardNumber = $_POST['cardNumber'];
	$expire_date = $_POST['expirationDate'];
	$cvv = $_POST['cvv'];
	$cardName = $_POST['cardName'];
	$id_user = $_SESSION['user_id'];


	// UPDATE PROFILE

	$sqlUserUpdate = "UPDATE client SET login_client = '".$userName."', email_client = '".$email."', name1_client = '".$firstName."', country_client = '".$country."', adress_client = '".$adress."', postal_client = '".$postal."', password_client = MD5('".$pass."') WHERE client.id_client =".$id_user;

	mysqli_query($connection, $sqlUserUpdate);
	
	// UPDATE PAYMENT

	
	$sqlPaymentUpdate = "UPDATE payment_method SET payment_method = '".$cardType."', card_number = '".$cardNumber."', expire_date = '".$expire_date."', cvv = '".$cvv."', card_name = '".$cardName."' WHERE payment_method.fk_id_client =".$id_user;

	mysqli_query($connection, $sqlPaymentUpdate);

	header('Location:profile.php');


?>






