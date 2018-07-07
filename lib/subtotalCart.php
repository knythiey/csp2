<?php 
	session_start();
	require "connect.php";
	$id = $_POST['prod_id'];
	$quantity = $_POST['prod_quant'];
	$query = "SELECT price_each FROM products WHERE id = '$id'";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($result);
	$subtotal = $quantity * $row['price_each'];
	
	$_SESSION['subtotal'][$id] = $subtotal;

	echo $subtotal;
?>