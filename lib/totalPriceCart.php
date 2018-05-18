<?php 
	session_start();
	$id = $_POST['prod_id'];
	$quantity = $_POST['prod_quant'];
	$price_each = $_POST['price_each'];
	$subtotal = $quantity * $price_each;

	$_SESSION['subtotal'][$id] = $subtotal;
	$_SESSION['totalPrice'] = array_sum($_SESSION['subtotal']);

	echo $_SESSION['totalPrice'];
?>