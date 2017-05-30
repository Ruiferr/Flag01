<?php

	include('config.php');
	session_start();

	$login = $_REQUEST['loginName'];
	$pass = $_REQUEST['pass'];

	$sqlLogin = "SELECT * FROM client WHERE login_client = '".$login."' and password_client = MD5('".$pass."')";

	$result = mysqli_query($connection, $sqlLogin);

	$find = $result->num_rows;

		
	if ($find == 1) {
		$row = mysqli_fetch_assoc($result);

		$_SESSION['user_name'] = $row['login_client'];
		$_SESSION['user_id'] = $row['id_client'];

		header('Location:index.php');

	}else{
		header('Location:login.php');
	}

?>