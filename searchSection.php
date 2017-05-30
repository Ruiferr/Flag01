<?php	

	include('config.php');
	$search_value = $_POST['valor'];

	$sqlSearch = "SELECT * FROM products where name_product like '%".$search_value."%'";
	
	$resultCheck = "SELECT COUNT(*) AS total FROM products where name_product like '%".$search_value."%'";

	$results = mysqli_query($connection, $resultCheck);
	$value = mysqli_fetch_assoc($results);
	$num_rows = $value['total'];


	$searchResult = mysqli_query($connection, $sqlSearch);

?>
<div class="searchFrame">
	
	<div class="searchResult">
		<h2 style="margin-bottom: 2%;font-size: 18px;">Search results:</h2>
		<?php
				if ($num_rows == 0) {
					echo 'No results found';
				}else{

					while($row = mysqli_fetch_assoc($searchResult)){
		?>
		<a href="detail.php?id=<?php echo $row['id_products']?>" style="float: left; width: 98%; padding: 1%; margin-bottom: 0.5%; background: rgba(0, 0, 0, 0.08); color: darkred;">- <?php echo $row['name_product']?></a>
		
		<?php 		}
			 }
		?>
	</div>

</div>