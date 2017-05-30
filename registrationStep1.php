				<form id="basicForm" action="clientRegistration.php" method="post">
					<fieldset>
						<p>Account Data</p>
						<ul>
							<li>
								<label for="userName">User Name *</label>
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

						</ul>
						<input class="next" id="next" type="submit" value="NEXT STEP"></input>
					</fieldset>
				</form>