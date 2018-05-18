<?php 
	session_start();
	if(isset($_POST['prod_id'])){
		$id = $_POST['prod_id'];
		unset($_SESSION['cart'][$id]);
		unset($_SESSION['subtotal'][$id]);
		$_SESSION['itemCountCart'] = array_sum($_SESSION['cart']);
		$_SESSION['totalPrice'] = array_sum($_SESSION['subtotal']);
		
		echo $_SESSION['totalPrice'];
	} else {
		echo "Invalid request. Can't be removed.";
	}
?>