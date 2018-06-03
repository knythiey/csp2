<?php  
	session_start();
	require "connect.php";
		$id = $_POST['prod_id'];
		$quantity = $_POST['prod_quant'];
		if(preg_match('/^[0-9\S]+$/',$quantity)){
			$query = "SELECT price_each FROM PRODUCTS WHERE id = '$id'";
			$result = mysqli_query($conn, $query);
			$row = mysqli_fetch_assoc($result);
			$subtotal = $quantity * $row['price_each'];
			$_SESSION['cart'][$id] = $quantity;

			// update the total quantity of items to be purchased
			$itemCount = array_sum($_SESSION['cart']);
			$_SESSION['itemCount'] = $itemCount;
			echo $_SESSION['itemCount'];
		} else {
			echo $_SESSION['itemCount'];
		}
?>