<?php
	include 'config.php';
	session_start();

	$id_game = $_POST['id'];
	$userRating = $_POST['rating'];
	$userId = $_SESSION['user_id'];

	// CHECK IF USER VOTED


	$sqlUser = "SELECT count(rating) FROM rating WHERE fk_id_client = '".$userId."' AND fk_id_products =".$id_game;
	$result = mysqli_query($connection, $sqlUser);
	$rowVotes = mysqli_fetch_assoc($result);

	$votes = $rowVotes['count(rating)'];

	if ($votes > 0) {
		echo "You already voted<br><br>";
	} else{
		// INSERT RATING

		$sqlRating = "INSERT INTO rating (fk_id_client, fk_id_products, rating) VALUES ('".$userId."','".$id_game."','".$userRating."')";

		mysqli_query($connection, $sqlRating);

	}

	// RETURN OVERALL RATING


	$sqlSum = "SELECT sum(rating) FROM rating WHERE fk_id_products =".$id_game;
	$sqlCount = "SELECT count(rating) FROM rating WHERE fk_id_products =".$id_game;

	$resultSum = mysqli_query($connection, $sqlSum);
	$resultCount = mysqli_query($connection, $sqlCount);

	$Sum = mysqli_fetch_assoc($resultSum);
	$row = mysqli_fetch_assoc($resultCount);

	$total = $Sum['sum(rating)'];
	$reviews = $row['count(rating)'];


	$overallRating = $total / $reviews;
	echo 'Overall Rating: '.number_format((float)$overallRating,1,'.','');

?>