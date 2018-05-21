<?php 
	session_start();
	require "connect.php";
	// echo $product_query = "SELECT *, p.id as prod_id FROM products p JOIN categories c WHERE category_id = 1 group by p.category_id, p.product_name ORDER BY p.product_name ASC";
	// $product_result = mysqli_query($conn, $product_query);
	$_SESSION['category'] = 4;
	$_SESSION['category_title'] = "PS4 Accessories Category";
	header("location: ../home.php");
?>
