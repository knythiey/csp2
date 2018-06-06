<?php 
	session_start();
	$_SESSION['totalPrice'] = array_sum($_SESSION['subtotal']);
	echo $_SESSION['totalPrice'];
?>