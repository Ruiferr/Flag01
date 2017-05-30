<?php
	include('config.php');
	session_start();

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/reset.css">
		<link rel="stylesheet" type="text/css" href="css/fonts.css">
		<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
		<link rel="stylesheet" type="text/css" href="css/contacts.css">
		<link rel="stylesheet" type="text/css" href="css/mediaQueries/desktop.css">
		<link rel="stylesheet" type="text/css" href="css/mediaQueries/tablet.css">
		<link rel="stylesheet" type="text/css" href="css/mediaQueries/mobile.css">
		<script type="text/javascript" src="js/library/jquery.js"></script>
		<script type="text/javascript" src="js/contacts.js"></script>
		<title>GAMESTORE</title>
	</head>
	<body>
		<header>


			<?php include 'header.php'; ?>

		</header>


				<!-- 			LOGIN/PROFILE WINDOW 			-->


			<?php include 'loginWindow.php'; ?>


				<!-- 			GOOGLE MAPS & CONTACTS			-->


		<div class="frame">
				<div class="gamestore">
					<a href="index.php"><p><span>GAME</span>STORE</p></a>
				</div>	
				<div class="line"></div>
				<div class="mapFrame">
					<div  class="map1" style="width: 100%">
						<iframe width="100%" height="400" src="http://www.citymaps.ie/create-google-map/map.php?width=100%&amp;height=400&amp;hl=en&amp;q=Centro%20Comercial%20Atrium%20Saldanha%2C%20loja%2092%2C%20Pra%C3%A7a%20Duque%20de%20Saldanha%2C%20n%C2%BA1+(GameStore)&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=A&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="http://www.mapsdirections.info/medir-distancia-area.html">Cómo medir área en Google Maps</a> en <a href="http://www.mapsdirections.info/">www.mapsdirections.info</a>
						</iframe>
					</div>
					<div  class="map2" style="width: 100%">
						<iframe width="100%" height="400" src="http://www.citymaps.ie/create-google-map/map.php?width=100%&amp;height=400&amp;hl=en&amp;q=Centro%20Comercial%20Colombo%20Loja%20A%20Avenida%20Lus%C3%ADada+(GameStore)&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=A&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="http://www.mapsdirections.info/medir-distancia-area.html">Medir Distancia en Google Maps</a> en <a href="http://www.mapsdirections.info/">www.mapsdirections.info</a></iframe>
					</div>
					<div class="map3" style="width: 100%">
						<iframe width="100%" height="400" src="http://www.citymaps.ie/create-google-map/map.php?width=100%&amp;height=400&amp;hl=en&amp;q=Via%20Catarina%20Shopping+(GameStore)&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=A&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="http://www.mapsdirections.info/medir-distancia-area.html">Medir Distancia en Google Maps</a> en <a href="http://www.mapsdirections.info/">www.mapsdirections.info</a>
						</iframe>
					</div>
				</div>
			<aside class="contactsMobile">
				<table>
					<thead>
						<tr>
							<th colspan="2">
								<h2>Contact Us</h2>
								<p>Mon-Sat: 8am - 8pm<br>
								Sun: 10am - 5pm</p>
							</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><i class="fa fa-comments" aria-hidden="true"></i></td>
						<td class="special">Online chat</td>
						</tr>
						<tr>
							<td><i class="fa fa-envelope" aria-hidden="true"></i></td>
							<td class="special">Email</td>
						</tr>
						<tr>
							<td><i class="fa fa-twitter" aria-hidden="true"></i></td>
							<td class="special">Twitter</td>
						</tr>
						<tr>
						<td><i class="fa fa-phone" aria-hidden="true"></i></td>
							<td class="special">Phone: 0208 827 0095</td>
						</tr>
						<tr>
							<td><i class="fa fa-map-marker" aria-hidden="true"></i></td>
							<td class="special">Stores</td>
						</tr>
					</tbody>												
				</table>
			</aside>



		<!-- 		       GOOGLE MAPS - MOBILE VERSION 				-->



			<div class="mapFrame2">
					<div  class="map1" style="width: 100%">
						<iframe width="100%" height="300" src="http://www.citymaps.ie/create-google-map/map.php?width=100%&amp;height=300&amp;hl=en&amp;q=Centro%20Comercial%20Atrium%20Saldanha%2C%20loja%2092%2C%20Pra%C3%A7a%20Duque%20de%20Saldanha%2C%20n%C2%BA1+(GameStore)&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=A&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="http://www.mapsdirections.info/medir-distancia-area.html">Cómo medir área en Google Maps</a> en <a href="http://www.mapsdirections.info/">www.mapsdirections.info</a>
						</iframe>
					</div>
					<div  class="map2" style="width: 100%">
						<iframe width="100%" height="300" src="http://www.citymaps.ie/create-google-map/map.php?width=100%&amp;height=300&amp;hl=en&amp;q=Centro%20Comercial%20Colombo%20Loja%20A%20Avenida%20Lus%C3%ADada+(GameStore)&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=A&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="http://www.mapsdirections.info/medir-distancia-area.html">Medir Distancia en Google Maps</a> en <a href="http://www.mapsdirections.info/">www.mapsdirections.info</a></iframe>
					</div>
					<div class="map3" style="width: 100%">
						<iframe width="100%" height="300" src="http://www.citymaps.ie/create-google-map/map.php?width=100%&amp;height=300&amp;hl=en&amp;q=Via%20Catarina%20Shopping+(GameStore)&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=A&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="http://www.mapsdirections.info/medir-distancia-area.html">Medir Distancia en Google Maps</a> en <a href="http://www.mapsdirections.info/">www.mapsdirections.info</a>
						</iframe>
					</div>
				</div>



				<!-- 			SHOP LOCATIONS		-->



			<footer>
				<div class="shop" id="shop1">
					<table>
						<thead>
							<tr>
								<th class="nomeLoja"><i class="fa fa-map-marker" aria-hidden="true"></i><h2>GameStore: Saldanha</h2></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<p>
										Centro Comercial Atrium Saldanha<br>
										loja 92<br>
										Praça Duque de Saldanha<br>
										nº1
									</p>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="shop" id="shop2">
					<table>
						<thead>
							<tr>
								<th class="nomeLoja"><i class="fa fa-map-marker" aria-hidden="true"></i><h2>GameStore: Colombo</h2></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<p>Centro Comercial Colombo<br> 
										Loja A<br>
										Avenida Lusíada<br>
										nº103
									</p>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="shop" id="shop3">
					<table>
						<thead>
							<tr>
								<th class="nomeLoja"><i class="fa fa-map-marker" aria-hidden="true"></i><h2>GameStore: Via Catarina</h2></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<p>
										Via Catarina Shopping<br>
										Loja 30<br> 
										Rua de Santa Catarina<br>
										nº 312
									</p>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</footer>
			<div class="line2"></div>
		</div>
	</body>
</html>










