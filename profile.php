<?php
	include('config.php');
	session_start();

	$id_user = $_SESSION['user_id'];

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/reset.css">
		<link rel="stylesheet" type="text/css" href="css/fonts.css">
		<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
		<link rel="stylesheet" type="text/css" href="css/login.css">
		<link rel="stylesheet" type="text/css" href="css/profile.css">
		<link rel="stylesheet" type="text/css" href="css/mediaQueries/desktop.css">
		<link rel="stylesheet" type="text/css" href="css/mediaQueries/tablet.css">
		<link rel="stylesheet" type="text/css" href="css/mediaQueries/mobile.css">
		<script type="text/javascript" src="js/library/jquery.js"></script>
		<script type="text/javascript" src="js/login.js"></script>
		<script type="text/javascript" src="js/resize.js"></script>
		<title>GAMESTORE</title>
	</head>
	<body>
		<header>
	
			<?php include 'header.php'; ?>
		
		</header>



		<!-- 			DISPLAYED IMAGES + NAV BAR 			-->

		<div class="frame">
				<div class="line"></div>
			<div class="destaqueLayout">

				<?php 	
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
			</div>
			<nav class="menu">
				<ul>
					<li class="nav navSpecial" id="nav1"><a href="index.php">< HOME</a></li>
				</ul>
			</nav>
		</div>
		<div class="frame2">
		<?php 

		$sqlUser = "SELECT * FROM client WHERE id_client =".$id_user;
		$resultUser = mysqli_query($connection, $sqlUser);
		$row = mysqli_fetch_assoc($resultUser);

		$sqlUserPayment = "SELECT * FROM payment_method WHERE fk_id_client =".$id_user;
		$resultUserPay = mysqli_query($connection, $sqlUserPayment);
		$rowPay = mysqli_fetch_assoc($resultUserPay);


		?>
			<div class="newAcc">
				<h2>Profile Info:</h2>
			</div>
			<div class="Profileinfo">
				<ul>
					<li style="padding: 1%; font-size: 18px; color: darkred;">Name:</li>
					<li style="padding: 1%;"><?php echo utf8_encode($row['name1_client'].' '.$row['name2_client']); ?></li>
					<li style="padding: 1%;font-size: 18px; color: darkred;">Email:</li>
					<li style="padding: 1%;"><?php echo utf8_encode($row['email_client']); ?></li>
					<li style="padding: 1%;font-size: 18px; color: darkred;">Country:</li>
					<li style="padding: 1%;"><?php echo utf8_encode($row['country_client']); ?></li>
					<li style="padding: 1%;font-size: 18px; color: darkred;">Adress:</li>
					<li style="padding: 1%;"><?php echo utf8_encode($row['adress_client']); ?></li>
					<li style="padding: 1%;font-size: 18px; color: darkred;">Postal Code:</li>
					<li style="padding: 1%;"><?php echo utf8_encode($row['postal_client']); ?></li>
					<li style="padding: 1%;font-size: 18px; color: darkred;">Payment Method:</li>
					<li style="padding: 1%; margin-bottom: 2%;"><?php echo utf8_encode($rowPay['payment_method']); ?></li>
				</ul>
				<ul>
					<li><button style="padding: 1%; margin-bottom: 1%;" onclick="changeProfile()">Change Profile</button></li>
					<li><a href="logout.php"><button style="padding: 1%; margin-bottom: 1%;" onclick="changeProfile()">Logout</button></a></li>
				</ul>
			</div>
			<div class="newProfile">
					<form id="basicForm" action="clientUpdate.php" method="post">
					<fieldset>
						<p>Account Data</p>
						<ul>
							<li>
								<label for="userName">User Name </label>
								<input type="text" name="userName" id="name" required>				<?php
								   if (isset($_GET['alert']) == 'userName') {
								   			echo " <! User name already in use !>";

								    }
								?>
							</li>				
							<li>
								<label for="email">Email address</label>
								<input type="text" name="email" id="email" required>
								<?php
									if (isset($_GET['alert']) == 'email') {
								   			echo " <! Email already in use !>";

								    }
								?>
							</li>				
							<li>
								<label for="password">Password</label>
								<input type="password" name="password" id="password" required>
							</li>				
							<li>
								<label for="confirmPassword">Confirm password</label>
								<input type="password" name="passwordConfirm" id="passwordConfirm" required>
							</li>
						</ul>
					</fieldset>
					<fieldset>
						<p>Personal Data</p>
						<ul>
							<li>
								<label for="firstName">First name</label>
								<input type="text" name="firstName" id="firstName" required>
							</li>					    
							<li>
								<label for="lastName">Last name</label>
								<input type="text" name="lastName" id="lastName" required>
							</li>		
							<li>
								<label for="country">Country</label>
								<input type="text" name="country" id="country" required>
							</li>				
							<li>
								<label for="adress">Adress</label>
								<input type="text" name="adress" id="adress" required>
							</li>
							<li>
								<label for="postalCode">Postal Code</label>
								<input type="text" name="postalCode" id="postalCode" required>
							</li>
							<li>
								<label for="">Card type</label>
								<select id="cardTypeOption" name="cardType" onchange="selection()">
									<option value="Visa">Visa</option>
									<option value="Paypal">Paypal</option>
									<option value="American Express">American Express</option>
								</select>
							</li>				
							<li class="disable">
								<label for="email">Card number</label>
								<input type="text" name="cardNumber" id="cardNumber" required>
							</li>				
							<li class="disable">
								<label for="expirationDate">Expires on</label>
								<input type="date" name="expirationDate" id="expirationDate" required>
							</li>				
							<li class="disable">
								<label for="cvv">CVV</label>
								<input type="number" name="cvv" id="cvv" max="999" required>
							</li>
							<li class="disable">
								<label for="cardName">Name on card</label>
								<input type="text" name="cardName" id="cardName" required>
							</li>
							<li>
								<label>></label>
								<input class="save" type="submit" value="Save Changes"></input>
							</li>
						</ul>
					</fieldset>
				</form>
				
			</div>

		</div>











