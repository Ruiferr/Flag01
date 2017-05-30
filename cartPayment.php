<?php
	include 'config.php';
	include 'SqlFunction.php';
	session_start();


	// call Payment
	$rowPay = callPayment($connection, $_SESSION['user_id']);
	

 	$check = utf8_encode($rowPay['payment_method']);

 	
 	if ($check == 'Paypal') {

?>
<div class="productContent">
					<h2>Payment Method</h2>	
					<table cellpadding="2">
						<thead>
							<tr>
								<th colspan="2">Payment Method</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td colspan="2"><?php echo $check ?></td>
							</tr>
							<tr>
								<td><button>change</button></td>
							</tr>
						</tbody>
					</table>										
</div>
<?php
	} else{
?>
<div class="productContent">
					<h2>Payment Method</h2>	
					<table cellpadding="2">
						<thead>
							<tr>
								<th colspan="2">Payment Method</th>
								<th colspan="2">Card Number</th>
								<th colspan="2">Card Name</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td colspan="2"><?php echo utf8_encode($rowPay['payment_method']); ?></td>
								<td colspan="2"><?php echo utf8_encode($rowPay['card_number']); ?></td>
								<td colspan="2"><?php echo utf8_encode($rowPay['card_name']); ?></td>
							</tr>
							<tr>
								<td colspan="6"><button>change</button></td>
							</tr>
						</tbody>
					</table>										
</div>
<?php
		}
?>