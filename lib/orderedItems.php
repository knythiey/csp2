<?php 
	session_start();
	require "connect.php";
	
	$user_id = $_SESSION['user_id'];
	$_SESSION['checkoutFname'] = $_POST['checkoutFirstName'];
	$_SESSION['checkoutLname'] = $_POST['checkoutLastName'];
	$_SESSION['checkoutContnum'] = $_POST['checkoutContNum'];
	$_SESSION['checkoutShipAdd'] = $_POST['checkoutShipAdd'];
	$payment_type = $_POST['orderPayment'];
	$_SESSION['checkoutPaymentType'] = $payment_type;
	$totalPrice = $_SESSION['totalPrice'];

	function refNum(){
			$refNum = "";
			$source1 = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'K', 'Y','N','T','L','T'];
			for($i=0; $i < 11;$i++){
				$index = rand(0, 15);
				$refNum = $refNum . $source1[$index];
			}

			$userCreated = '';
			$item = $_SESSION['date_created'];

			//for getting rid of the - and : from the data_created
			$source2 = ['0', '1', '2', '3' ,'5', '6', '8', '9', '11', '12', '14', '15', '17', '18'];
			for($i = 0;$i < 14; $i++){
				$index = $source2[$i];
				$userCreated = $userCreated . $item[$index]; 
			}
			$today = getdate();
			$kyntRefNum = $refNum . ' - ' . $userCreated .' - '. $today[0];
			return $kyntRefNum;
		}
	$refNum = refNum();
	$_SESSION['reference_number'] = $refNum;
	// Receipt for the order
	$rcpt_query = "INSERT INTO orders(reference_number, payment_id, user_id, total) VALUES('$refNum','$payment_type', '$user_id', '$totalPrice')";
	$rcpt_result = mysqli_query($conn, $rcpt_query);	

	$ord_id_query = "SELECT * FROM orders WHERE reference_number = '$refNum'";
	$ord_id_result = mysqli_query($conn, $ord_id_query);

	foreach ($ord_id_result as $order_items) { //foreach for order_id that was recently made
		$ord_id = $order_items['id'];
		$_SESSION['order_id'] = $ord_id;

		$cartItems = $_SESSION['cart'];
			foreach ($cartItems as $prod_id => $orderQuant) { //foreach for getting the prod_id
				$cartItem_prod_id = $prod_id; 
				$cartItem_quant = $orderQuant; 

				//for getting subtotal	
				$subtotal_query = "SELECT price_each FROM products WHERE id='$cartItem_prod_id'";
				$subtotal_result = mysqli_query($conn, $subtotal_query);
				$row = mysqli_fetch_assoc($subtotal_result);
				$price = $row['price_each'];
				$subtotal = $cartItem_quant * $price;
				
				$ins_orderedItems_query = "INSERT INTO 
				ordered_items(product_id, order_id, quantity, subtotal) 
				VALUES('$cartItem_prod_id', '$ord_id', '$cartItem_quant', '$subtotal')";
				$ins_orderedItems_result = mysqli_query($conn, $ins_orderedItems_query);

				//query to get date purchased
				$date_purch_query = "SELECT * FROM ordered_items WHERE order_id = '$ord_id'";
				$date_purch_result = mysqli_query($conn,$date_purch_query);
				$ordItem_row = mysqli_fetch_assoc($date_purch_result);
				$_SESSION['date_purchased'] = $ordItem_row['date_purchased'];
		 	} 
		}
	header("Location: email_sending.php");		
?>