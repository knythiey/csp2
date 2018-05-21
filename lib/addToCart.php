<?php  
	session_start();
	require "connect.php";
	// if(isset($_POST['prod_id']) && $_POST['prod_quant']){
		$id = $_POST['prod_id'];
		$quantity = $_POST['prod_quant'];
		// $price_each = $_POST['price_each'];
		$query = "SELECT price_each FROM PRODUCTS WHERE id = '$id'";
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_assoc($result);
		$subtotal = $quantity * $row['price_each'];
		$_SESSION['cart'][$id] = $quantity;

		// update the total quantity of items to be purchased
		$_SESSION['itemCountCart'] = array_sum($_SESSION['cart']);
		echo $_SESSION['itemCountCart'];
	// }
?>