<?php include "partials/header.php"; ?>
	
	<?php 
		session_start();
		require "lib/connect.php"; 
		function getTitle(){
			echo "Receipt Page Page";
		}
		$refNum = $_SESSION['reference_number'];
		$user_id = $_SESSION['user_id'];
	?>
</head>
<body>
	<?php include "partials/navbar.php"; ?>
	<div class="main-wrapper">
		
		<h1> Receipt Page Page</h1>
		<hr>
		<div class="container receipt-cont">
			<p>Thank you <?php echo $_SESSION['checkoutFname'] . " " . $_SESSION['checkoutLname'] ?> for your purchase!</p> <p>Your order is being prepared for delivery. Keep a copy of the reference number to check the status of your items.</p>
			<h4>REFERENCE NUMBER: [ <span><?php echo $_SESSION['reference_number'] ?></span> ]</h4>
			<div class="row">
				<?php 
					$cust_det_query ="SELECT DISTINCT *, pay.payment_type AS pay_type 
							FROM orders ord 
							JOIN users u 
							JOIN payment_type pay 
							ON(u.id = ord.user_id 
							&& ord.payment_id = pay.id) 
							WHERE ord.reference_number = '$refNum'";
					$cust_det_result = mysqli_query($conn,$cust_det_query);
					foreach($cust_det_result as $key){
				?>
				<div class="col-md-6 col-sm-12">
					<h3>Customer Details</h3>
					<p>Username: <?php echo $key['username'] ?></p>
					<p>Email: <?php echo $key['email'] ?></p>
					<p>Shipping Address: <?php echo $_SESSION['checkoutShipAdd'] ?></p>
					<p>Contact Number: <?php echo $_SESSION['checkoutContnum'] ?></p>
					<p>Payment type: <?php echo $key['pay_type'] ?></p>
					<p>Total amount paid: $<span><?php echo $_SESSION['totalPrice'] ?></span></p>
				</div>
				<div class="col-md-6 col-sm-12">
					<h3>Ordered Items</h3>
					<p>Purchase Date: <?php echo $_SESSION['date_purchased'] ?></p>
					<?php  }//foreach ord_items
						$ord_items_query = "SELECT * 
						FROM products p 
						JOIN ordered_items ord_items
						JOIN orders ord
						JOIN order_status ord_stat
						JOIN categories cat
						ON(p.id = ord_items.product_id
						&& ord_items.order_id = ord.id
						&& ord.status_id = ord_stat.id
						&& p.category_id = cat.id)
						WHERE ord.reference_number = '$refNum'
						";
						$ord_items_result = mysqli_query($conn, $ord_items_query);
						foreach ($ord_items_result as $key) {
					?>
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<img src="<?php echo $key['product_image']?> " alt="product_image" class="img-fluid img-thumbnail">
						</div>
						<div class="col-md-6 col-sm-12">
							<p>Product name: <?php echo $key['product_name'] ?></p>
							<p>Quantity: <?php echo $key['quantity'] ?></p>
						</div>
					</div>
					<?php }//foreach $cust_det?>
					<h4>Order status: <?php echo $key['status'] ?></h4>
				</div>
			</div>
		</div>
		<?php 

		unset($_SESSION['cart']);
		unset($_SESSION['subtotal']);
		unset($_SESSION['itemCountCart']);
		unset($_SESSION['totalPrice']);

		?>
	
	</div>
	<?php include "partials/footer.php"; ?>
<?php include "partials/foot.php"; ?>