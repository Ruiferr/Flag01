<?php
	include 'config.php';
	include('SqlFunction.php');
	session_start();

	$_SESSION['qty'] = json_decode(stripslashes($_POST['amount']));
	$totalCost = $_POST['cost'];

?>


<div class="productContent">
	<h2>Details</h2>
	<table cellpadding="2">
		<thead>
			<tr>
				<th colspan="2">Items</th>
				<th colspan="2">Quantity</th>
			</tr>
		</thead>
		<tbody>
			<?php  
			for ($i=0; $i < count($_SESSION['cart']) ; $i++) { 
				// call games
				$row = callProduct($connection, $_SESSION['cart'][$i]);

			?>
			<tr>
				<td colspan="2"><?php echo utf8_encode($row['name_product']) ?></td>
				<td colspan="2"><?php echo $_SESSION['qty'][$i] ?></td>
			</tr>
			<?php
				}
			?>
			<tr>
				<td colspan="2"></td>
				<td colspan="2" style=" font-size: 14px; color: darkred; font-family: gothambold;">
					Total: <?php echo $totalCost.' '.'€' ?>
				</td>
			</tr>
		</tbody>											
	</table>												
</div>