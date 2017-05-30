<?php 
	$value = $_GET['client']; 
?>			
				<form id="paymentForm" action="billingRegistration.php" method="post">
					<fieldset>
						<p>Billing Information</p>
						<ul>
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
						</ul>
						<input style="display: none;" type="text" id="nameClient" name="nameClient" value="<?php echo $value; ?>">
						<input class="next" id="next2" type="submit" value="NEXT STEP"></input>
					</fieldset>	
				</form>