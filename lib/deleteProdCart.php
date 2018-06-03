<?php 
	session_start();
	if(isset($_POST['prod_id'])){
		$id = $_POST['prod_id'];
		unset($_SESSION['cart'][$id]);
		unset($_SESSION['subtotal'][$id]);
		$_SESSION['itemCountCart'] = array_sum($_SESSION['cart']);
		$_SESSION['totalPrice'] = array_sum($_SESSION['subtotal']);
		echo "Item removed from cart.";
		// if($_SESSION['itemCountCart'] == 0 | empty($_SESSION['itemCountCart'])){
		// 	unset($_SESSION['cart']);
		// 	unset($_SESSION['subtotal']);
		// }
	} else {
		echo "Invalid request. No item to remove.";
	}

?>