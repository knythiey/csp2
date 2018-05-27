<?php 
	session_start();
	$search = $_POST['key_word'];
	require "connect.php";

	if(isset($search)){
		$product_query = "SELECT * FROM products WHERE product_name LIKE '%".$search."%'";
		$product_result = mysqli_query($conn, $product_query); 
	}
?>
