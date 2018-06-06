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
			<h5>Thank you <?php echo ucfirst($_SESSION['checkoutFname']) . " " . ucfirst($_SESSION['checkoutLname']) ?> for your purchase from GameHub!</h5> 
			<h6 class="referenceNum-receipt">REFERENCE NUMBER: [ <span><?php echo $_SESSION['reference_number'] ?></span> ]
			</h6>
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
						foreach ($ord_items_result as $order) {
					?>
					<div class="media my-2 p-2">
						<img src="<?php echo $order['product_image']?>" alt="product_image" class="img-fluid img-thumbnail rct-img mr-3">
						<div class="media-body">
						    <h5 class="mt-0"><?php echo $order['product_name'] ?></h5>
						    <h6>Quantity: <?php echo $order['quantity'] ?> pc/pcs</h6>
						    <h6>Subtotal: USD $<?php echo $order['subtotal'] ?></h6>
						</div>
					</div>
					<?php }//foreach $cust_det?>
					</div>
					<h6 class="order-status-rct">Order status: <?php echo $order['status'] ?></h6>
					<small>Your order is being prepared for delivery. Keep a copy of the reference number to check the status of your items.</small>
					<small>An Email containing the Order Details was sent to <?php echo $_SESSION['user_email'] ?>.</small>
				</div>
			</div>
			<a href="home.php"><button class="btn btn-primary">Back to Home</button></a>
		</div>
		<?php 
			// unset($_SESSION['cart']);
			// unset($_SESSION['subtotal']);
			// unset($_SESSION['itemCount']);
			// unset($_SESSION['totalPrice']);
		?>
	</div>
	<?php include "partials/footer.php"; ?>
<?php include "partials/foot.php"; ?>