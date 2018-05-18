<?php 
	session_start();
	if(isset($_POST['prod_id'])){
		$id = $_POST['prod_id'];
		unset($_SESSION['cart'][$id]);
		unset($_SESSION['subtotal'][$id]);
		$_SESSION['itemCountCart'] = array_sum($_SESSION['cart']);
		echo $_SESSION['itemCountCart'];
	} else {
		echo "Invalid request. Can't be removed.";
	}
?>