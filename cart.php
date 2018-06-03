<?php include "partials/header.php"; ?>
	
	<?php 
		session_start(); 
		function getTitle(){
			echo "Cart Page";

		}
		require "lib/connect.php";
	?>
</head>
<body>
	<?php include "partials/navbar.php"; ?>
	<div class="main-wrapper">
		
		<h2> <?php
			if(isset($_SESSION['current_user'])){
		 		echo ucfirst($_SESSION['current_user']) . "'s";
			} else {
				echo "My ";
			}
		 ?> Cart</h2>
		<hr>
		<?php if(isset($_SESSION['cart'])){ 
			  $cartItems = $_SESSION['cart'];
			?>
		<p id="itemDelMsg">
		<?php if(isset($_SESSION['itemDelMsg'])){
			  	echo $_SESSION['itemDelMsg'] ;
			  } ?>
			  </p>
		<div class="container">
			<div class="row">
				<div class="card-group">
				<div class="col-md-12">
					<div class="container">
					<?php 
						foreach ($cartItems as $key => $orderQuant) {
						// echo "id => ". $key . " number of items ordered => " . $orderQuant . "<br>";
						$query = " SELECT DISTINCT * FROM products p JOIN categories c WHERE p.id = '$key' && p.category_id = c.id";
						$result = mysqli_query($conn, $query);

						if($orderQuant > 0) {
							foreach ($result as $prod) {  	
					?>		
						<div class="container cart-container" id="cart-item-container<?php echo $key ?>">
							<button class="btn btn-danger" id="delete-cart-item" onclick="deleteCartItem(<?php echo $key ?>)">Delete Item</button>	
							<ul class="list-unstyled">
								<li class="media">
							    	<img class="img-thumbnail img-fluid cart-display-image mr-3" src="<?php echo $prod['product_image'] ?>" alt="Product Image">
							    	<div class="media-body cart-item-details">
							      		<h3><?php echo $prod['product_name'] ?></h3>
							      		<h5><?php echo $prod['name'] ?></h5>
							      		<p><?php echo $prod['description'] ?></p>
							      		<span>Quantity Order: </span>
							      		<input type="number" name="productQuantity" id="productQuantity<?php echo $key?>" min="0" value="<?php echo $orderQuant ?>" class="form-control productQuantityCart">
							      		<button class="btn btn-primary " onclick="addToCart(<?php echo $key?>)" id="addToCart">Update Order</button>	
							      		<h6>Product Price: $<span id="price_each<?php echo $key ?>"><?php echo $prod['price_each'] ?></span></h6>
							      		<h6>Subtotal: $<span id="cart_prod_subtotal<?php echo $key ?>"><?php echo $orderQuant * $prod['price_each'] ?></span></h6>
							    	</div>
							  	</li>
							</ul>
						</div><!--//cart-container-->
							<hr>
					<?php 
								}//foreach $result
							}//if 0 orders, wont show in cart
						}//foreach $cartItems  
					?>
					<h5 class="totalPrice">TOTAL PRICE: $
						<span id="totalPriceCart">
							<?php 
								if(isset($_SESSION['totalPrice']))
								echo $_SESSION['totalPrice'];
								// var_dump($_SESSION['subtotal'])
						 	?> 
						</span> 
					</h5>
					<a href="checkout.php"><button class="btn btn-primary" id="checkoutBtn" disabled>Checkout</button></a>
					</div>
				</div>
				</div>
			</div>
		</div><!--container-->
		<!-- Displays if no cart items -->
		<?php } else { ?>
		<div class="container">
			<h4>Your Cart seems lonely. Checkout some of the products and add them to your cart.</h4>
		</div>
		<?php } ?>
	</div>
	<?php include "partials/footer.php"; ?>
<?php include "partials/foot.php"; ?>