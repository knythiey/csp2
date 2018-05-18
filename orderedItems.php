<?php 
	session_start();
	require "lib/connect.php";
	
	$user_id = $_SESSION['user_id'];
	$fname = $_POST['checkoutFirstName'];
	$lname = $_POST['checkoutLastName'];
	$contact = $_POST['checkoutContNum'];
	$ship_add = $_POST['checkoutShipAdd'];
	$payment_type = $_POST['orderPayment'];
	$totalPrice = $_SESSION['totalPrice'];
	$user_created = $_SESSION['date_created'];
	$today = getdate();


	function refNumGen(){
		$refNum = "";
		$source = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'Z', 'Y','X','W','V','U'];
		for($i=0; $i < 11;$i++){
			$index = rand(0, 15);
			$refNum = $refNum . $source[$index];
		}
		$user_created = $_SESSION['date_created'];
		$today = getdate();

		return $refNum . ' - ' . $user_created[2] .' - '. $today[0];
	}

	function userCreated(){
		$result = '';
		$item = $_SESSION['date_created'];

		$source = ['0', '1', '2', '3' ,'5', '6', '8', '9', '11', '12', '14', '15', '17', '18'];
		for($i = 0;$i < 14; $i++){
			$index = $item[$i];
			$result = $result . $source[$index]; 
		}
		return $result;
		// 0, 1, 2, 3, 5, 6, 8, 9, 11, 12, 14, 15, 17, 18 
		// 2018-05-15-10-15-36
	}

	echo $user_id ."<br>";
	echo $fname ."<br>";
	echo $lname ."<br>";
	echo $contact ."<br>";
	echo $ship_add ."<br>";
	echo $payment_type ."<br>";
	echo $totalPrice ."<br>";
	echo $user_created ."<br>";
	// echo $today[0];
	// echo $today[0] ."<br>";
	// echo refNumGen();
	echo userCreated();
?>