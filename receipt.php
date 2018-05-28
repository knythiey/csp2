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
	<div class="main-wrapper receipt-main-cont">
		
		<h1> Receipt Page Page</h1>
		<hr>
		<div class="container receipt-cont">
			<p>Thank you <?php echo $_SESSION['checkoutFname'] . " " . $_SESSION['checkoutLname'] ?> for your purchase!</p> <p>Your order is being prepared for delivery. Keep a copy of the reference number to check the status of your items.</p>
			<p class="referenceNum-receipt">REFERENCE NUMBER: [ <span><?php echo $_SESSION['reference_number'] ?></span> ]</p>
			<p>An Email containing the Order Details was sent to <?php echo $_SESSION['user_email'] ?>.</p>
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
				<div class="col-md-6 col-sm-12 cust-details-cont">
					<h3>Customer Details</h3>
					<div class="cust-details-rct">
						<h5>Username: </h5>
						<h6><?php echo $key['username'] ?></h6>
						<h5>Email: </h5>
						<h6><?php echo $key['email'] ?></h6>
						<h5>Shipping Address: </h5>
						<h6><?php echo $_SESSION['checkoutShipAdd'] ?></h6>
						<h5>Contact Number: </h5>
						<h6><?php echo $_SESSION['checkoutContnum'] ?></h6>
						<h5>Payment type: </h5>
						<h6> <?php echo $key['pay_type'] ?></h6>
						<h5>Total amount paid: $<span><?php echo $_SESSION['totalPrice'] ?></span></h5>
					</div>
				</div>
				<div class="col-md-6 col-sm-12">
					<h3>Ordered Items</h3>
					<p>Purchase Date: <?php echo $_SESSION['date_purchased'] ?></p>
					<div class="row">
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
						<div class="col-md-6 col-sm-6 rct-order-items">
							<img src="<?php echo $key['product_image']?> " alt="product_image" class="img-fluid img-thumbnail rct-img">
						</div>
						<div class="col-md-6 col-sm-6 rct-order-items">
							<p>Product name: <?php echo $key['product_name'] ?></p>
							<p>Quantity: <?php echo $key['quantity'] ?></p>
						</div>
					<?php }//foreach $cust_det?>
					</div>
					<h6 class="order-status-rct">Order status: <?php echo $key['status'] ?></h6>
				</div>
			</div>
			<a href="home.php"><button class="btn btn-primary">Back to Home</button></a>
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