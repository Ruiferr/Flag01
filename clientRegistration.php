<?php 

	include('config.php');

	$userName = $_POST['userName'];
	$email = $_POST['email'];
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$country = $_POST['country'];
	$adress = $_POST['adress'];
	$postal = $_POST['postalCode'];
	$pass = $_POST['password'];

	$sqlUserCheck = "SELECT * FROM client WHERE login_client = '".$userName."'";
	$sqlEmailCheck = "SELECT * FROM client WHERE email_client = '".$email."'";

	$resultUser = mysqli_query($connection, $sqlUserCheck);
	$resultEmail = mysqli_query($connection, $sqlEmailCheck);

	$findUser = $resultUser->num_rows;
	$findEmail = $resultEmail->num_rows;

		
	if ($findUser >= 1) {

		header('Location:login.php?alert=userName');

	} else if ($findEmail >= 1) {

		header('Location:login.php?alert=email');
		
		} else{
			$sqlRegistration = "INSERT INTO client(login_client, email_client, name1_client, name2_client, country_client, adress_client, postal_client, password_client) VALUES('".$userName."', '".$email."', '".$firstName."', '".$lastName."', '".$country."', '".$adress."', '".$postal."', MD5('".$pass."'))";

			mysqli_query($connection, $sqlRegistration);

			header("Location:login.php?step=billing&client=".$userName."");
	}


?>
