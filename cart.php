<?php
	include('config.php');
	include('SqlFunction.php');
	if(!isset($_SESSION)) {
	     session_start();
	}






?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/reset.css">
		<link rel="stylesheet" type="text/css" href="css/fonts.css">
		<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
		<link rel="stylesheet" type="text/css" href="css/cart.css">
		<link rel="stylesheet" type="text/css" href="css/mediaQueries/desktop.css">
		<link rel="stylesheet" type="text/css" href="css/mediaQueries/tablet.css">
		<link rel="stylesheet" type="text/css" href="css/mediaQueries/mobile.css">
		<script type="text/javascript" src="js/library/jquery.js"></script>
		<script type="text/javascript" src="js/cart.js"></script>
		<script type="text/javascript" src="js/resize.js"></script>
		<title>GAMESTORE</title>
	</head>
	<body>
		<header>

			<?php include 'header.php'; ?>
			
		</header>


				<!-- 			LOGIN/PROFILE WINDOW 			-->



			<?php include 'loginWindow.php'; ?>
			

						
						<!-- 			PRODUCT CONTENT 			-->

		<div class="frame">
				<div class="mobileSearch">
					<p><i class="fa fa-search" aria-hidden="true"></i></p>
					<input type="text" name="SearchGame" placeholder="  search here">
				</div>
				<div class="gamestore">
					<a href="index.php"><p><span>GAME</span>STORE</p></a>
				</div>	
				<div class="line"></div>
				<div class="progress">
					<ul>
						<li class="active">Basket</li>
						<li>Details</li>
						<li>Delivery</li>
						<li>Payment</li>
						<li>Done!</li>
					</ul>
					<div class="fase active"><i class="fa fa-check-circle" aria-hidden="true"></i></div>
					<div class="fase"><i class="fa fa-check-circle" aria-hidden="true"></i></div>
					<div class="fase"><i class="fa fa-check-circle" aria-hidden="true"></i></div>
					<div class="fase"><i class="fa fa-check-circle" aria-hidden="true"></i></div>
					<div class="fase"><i class="fa fa-check-circle" aria-hidden="true"></i></div>						
				</div>
				<div class="productContent">
					<h2>My Basket</h2>
					<table cellpadding="2">
						<thead>
							<tr>
								<th colspan="2">Items</th>
								<th>Price</th>
								<th>Qty</th>
								<th colspan="2">Subtotal</th>
							</tr>
						</thead>												
						<tbody class="cartSection">
							<?php 
								if(isset($_SESSION['cart'])) {

								for ($i=0; $i < count($_SESSION['cart']) ; $i++) { 

									// call games
									$row = callProduct($connection, $_SESSION['cart'][$i]);
									// call images
									$rowImg = callImages($connection, $_SESSION['cart'][$i]);
									// call developer
									$rowDev = callDeveloper($connection, $_SESSION['cart'][$i]);

							?>
							<tr class="gta">
								<td colspan="2" class="title">
									<img src="img/imgCart/<?php echo $rowImg['img_cart']; ?>"><br><br><br>
									<a href="detail.php?id=<?php echo $row['id_products']; ?>"><?php echo utf8_encode($row['name_product']); ?> - <?php echo utf8_encode($rowDev['name_developer']); ?></a>	
								</td>
								<td class="price">
									<p><span id="<?php echo $row['id_products']; ?>"><?php echo $row['price_product']; ?></span>€</p>
								</td>
								<td class="qty">
									<input class="number" id="<?php echo $row['id_products'] ?>" type="number" name="" min="1" value="1">
								</td>
								<td class="sub" id="<?php echo $row['id_products']; ?>">
									<p><span id="<?php echo $row['id_products']; ?>"><?php echo $row['price_product']; ?></span>€</p>
								</td>
								<td>
									<a href="deleteItem.php?del=<?php echo $row['id_products']; ?>"><i id="gta" class="fa fa-trash" aria-hidden="true" onclick="deleteItem(<?php echo $row['id_products']; ?>)"></i></a>
								</td>
							</tr>
							<?php  
							}
							?>
							<?php } ?>
						</tbody>
					</table>												
				</div>


				<!-- 			MOBILE DISPLAY LAYOUT WINDOW 			-->


				<aside class="cartMobile">
					<div class="proceed">
						<table>
							<tr>
								<td>Total</td>
								<td class="subtotalProceed">€<span></span></td>
							</tr>
							<tr>
								<td class="note" colspan="2"><p>Order total includes VAT</p></td>
							</tr>
						</table>
						
					<?php
					if(isset($_SESSION['cart'])) { 

						if (count($_SESSION['cart']) == 0) {
							
						} else{
							?><button>PROCEED TO CHECKOUT</button>
						<?php } }?>
					</div>
					<?php
					if(isset($_SESSION['cart'])) { 

						if (count($_SESSION['cart']) == 0) {

						} else{
					?>
					<div class="disclaimer">
						<figure><span><i class="fa fa-truck" aria-hidden="true"></i></span></figure>
						<div class="deliveryDisclaimer"><p>Your order is eligible for <span>FREE</span> delivery!</p></div>
					</div>
					<?php } }?>
					<div class="promoCode">
						<h2>Redeem a promo code</h2>
						<input type="text" name="" maxlength="6" placeholder="Enter your code">
						<p>Enter a promotional code here. Please note, items with promotion don't stack with your promotional code.</p>
						<button>Apply</button>
						
					</div>
					<div class="rewardPoints">
						<h2>Game Reward</h2>
						<p>Don't miss out you could earn <span>700 reward points (€ 3.99)</span> to spend next time, simply login or register on the order confirmation page to start earning.</p>
					</div>
				</aside>
			<div class="line2"></div>
		</div>



				<!-- 				FOOTER					-->


		<footer>
				
			<?php include('footer.php'); ?>

		</footer>
	</body>
</html>











