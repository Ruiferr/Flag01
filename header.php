<div class="welcome">
	<p>Welcome to GAMESTORE</p>
</div>
<div class="contact">
	<a href="contacts.php"><i class="fa fa-phone" aria-hidden="true"></i></a>
	<p><a href="contacts.php">Contact us</a></p>
</div>
<div class="login">
	<i class="fa fa-sign-in" aria-hidden="true"></i>
	<p><?php 
			if (isset($_SESSION['user_name'])){
				echo $_SESSION['user_name'];
			} else{
				echo 'Login';
			}
		?></p>
</div>

<div class="cart">
	<a href="cart.php"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></a>
	<p><a href="cart.php">Cart</a> <span><?php if (isset($_SESSION['cart'])){ echo count($_SESSION['cart']); } else { echo '0';} ?></span> </p>
</div>
