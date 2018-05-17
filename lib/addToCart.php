<?php  
	session_start();
	// if(isset($_POST['prod_id']) && $_POST['prod_quant']){
		$id = $_POST['prod_id'];
		$quantity = $_POST['prod_quant'];
		$_SESSION['cart'][$id] = $quantity;

		// update the total quantity of items to be purchased
		$_SESSION['itemCountCart'] = array_sum($_SESSION['cart']);
		echo $_SESSION['itemCountCart'];
	// }
?>