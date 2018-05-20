<?php include "partials/header.php"; ?>
	
	<?php 
		session_start(); 
		require "lib/connect.php";
		function getTitle(){
			echo "Checkout Page";
		}

	?>
</head>
<body>
	<?php include "partials/navbar.php"; ?>
	<div class="main-wrapper">
		
		<h1> Checkout Page</h1>
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-sm-12">
					<h3>Shipping Details</h3>
					<div class="container" id="shippingDetails">
						<form action="lib/orderedItems.php" method="POST">
					<?php  
						$user_id = $_SESSION['user_id'];

						$user_query = "SELECT * FROM users WHERE id = '$user_id'";
						$user_result = mysqli_query($conn, $user_query);
						foreach ($user_result as $key) { 
					?>
							<div class="form-group">
								<label for="firstName">First Name: </label>
								<input type="text" name="checkoutFirstName" id="checkoutFirstName" class="form-control" value="<?php echo $key['first_name']; ?>">
							</div>
							<div class="form-group">
								<label for="lastName">Last Name: </label>
								<input type="text" name="checkoutLastName" id="checkoutLastName" class="form-control" value="<?php echo $key['last_name']; ?>">
							</div>
							<div class="form-group">
								<label for="checkoutContact">Contact Number: </label>
								<input type="number" name="checkoutContNum" id="checkoutContNum" class="form-control" value="<?php echo $key['contact_number']; ?>">
							</div>
							<div class="form-group">
								<label for="shipAdd">Shipping Address: </label>
								<input type="text" name="checkoutShipAdd" id="checkoutShipAdd" class="form-control" value="<?php echo $key['shipping_address']; ?>">
							</div>
							<div class="form-group">
								<label for="payment">Payment Method: </label>
								<select name="orderPayment" id="orderPayment" class="form-control">
									<option value="1" required>Credit Card/Debit Card</option>
									<option value="2">Paypal</option>
								</select>
							</div>
							<div class="form-group">
								<label for="totalAmount">Total Amount: </label>
								<h5>$<span id=""><?php echo $_SESSION['totalPrice'] ?></span></h5>
							</div>
					<?php
						}//foreach $user_result
					?>
						<button class="btn btn-primary">Confirm Order</button>
						</form>
					</div>
				</div>
				<div class="col-md-6 col-sm-12">
					<h3>Order Summary</h3>
					<hr>
					<?php 
					if(isset($_SESSION['cart'])){
						$cartItems = $_SESSION['cart'];
						foreach($cartItems as $prod_id => $orderQuant){ 
						// echo $prod_id . "<br>";
						// echo $orderQuant;
						
						$query = "SELECT * FROM products p JOIN categories c WHERE p.id = '$prod_id' && p.category_id = c.id";
						$prod_result = mysqli_query($conn, $query);
							foreach ($prod_result as $key) {	
					?>
							<div class="row">
								<div class="col-md-6 col-sm-12">
									<p><?php echo $key['product_name'] ?></p>
									<p>Category: <?php echo $key['name'] ?></p>
									<p>Quantity Ordered: <span id="quant_order_checkout<?php echo $key['id']  ?>"><?php echo $orderQuant  ?></span></p>
									<p>Product Price: $<span id="prod_price_checkout<?php echo $key['id'] ?>"><?php echo $key['price_each'] ?></span></p>
								</div>
								<div class="col-md-6 col-sm-12">
									<div id="checkout-img-cont">
										<img src="<?php echo $key['product_image'] ?>" alt="product image" class="img-fluid img-thumbnail" id="checkout-prod-img">
									</div>
								</div>
							</div>
							<hr>
					<?php 
							}//foreach $prod_result
						}//foreach $cartItems 
					?>
					<p>Total Price: $<span><?php echo $_SESSION['totalPrice'] ?></span></p>
					<?php
					}//if isset
					?>	
				</div>
			</div>
		</div>
	</div>
	<?php include "partials/footer.php"; ?>
<?php include "partials/foot.php"; ?>