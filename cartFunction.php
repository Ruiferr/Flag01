<?php 

session_start();

$id = $_POST['value'];

if (!isset($_SESSION['cart'])) {
		$_SESSION['cart'] = [];
}


if (!in_array($id, $_SESSION['cart'])) {

	array_push($_SESSION['cart'], $id);

}

$cartAmount = count($_SESSION['cart']);

echo $cartAmount;

?>
