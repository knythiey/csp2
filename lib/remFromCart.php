<?php 
	session_start();
	if(isset($_POST['prod_id'])){
		$id = $_POST['prod_id'];
		unset($_SESSION['cart'][$id]);
		unset($_SESSION['subtotal'][$id]);
		$_SESSION['itemCount'] = array_sum($_SESSION['cart']);
		echo $_SESSION['itemCount'];
	} else {
		echo "Invalid request. Item can't be removed.";
	}
?>