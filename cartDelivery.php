<?php
	include 'config.php';
	include('SqlFunction.php');
	session_start();

	$totalCost = $_POST['cost'];

	// call games
	$rowClient = callClient($connection, $_SESSION['user_id']);


?>


<div class="productContent">
					<h2>Delivery</h2>
					<table cellpadding="2">
						<thead>
							<tr>
								<th colspan="2">Adress</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td colspan="2"><?php echo utf8_encode($rowClient['adress_client']); ?></td>
							</tr>
						</tbody>
						<thead>
							<tr>
								<th colspan="2">Country</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td colspan="2"><?php echo utf8_encode($rowClient['country_client']); ?></td>
							</tr>
						</tbody>
						<thead>
							<tr>
								<th colspan="2">Postal code</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td colspan="2"><?php echo utf8_encode($rowClient['postal_client']); ?></td>
							</tr>
						</tbody>
						<thead>
							<tr>
								<th colspan="2">Name</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td colspan="2"><?php echo utf8_encode($rowClient['name1_client']).' '.utf8_encode($rowClient['name2_client']); ?></td>
							</tr>
						</tbody>
						<thead>
							<tr>
								<th colspan="2">Delivery costs</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td colspan="2" class="deliveryCheck"></td>
							</tr>
						</tbody>
					</table>
					<div>
						<p style="padding: 4%;">If this information is not correct please click here to change on your profile section:</p>
						<button style="padding: 2%; margin-left: 40%;">Change Adress</button>
					</div>												
				</div>

