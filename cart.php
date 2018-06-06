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
		<?php if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0){ 
			  $cartItems = $_SESSION['cart'];
			?>
		<div id="itemDelMsg">
		<?php if(isset($_SESSION['itemDelMsg'])){
			  	echo $_SESSION['itemDelMsg'] ;
			  } ?>
		</div>
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
							    	<img class="img-thumbnail img-fluid mr-3" id="cart-display-image" src="<?php echo $prod['product_image'] ?>" alt="Product Image">
							    	<div class="media-body cart-item-details">
							      		<h3 class="mb-3 cartProdTitle"><a href="product.php?id=<?php echo $key ?>"><?php echo $prod['product_name'] ?></a></h3>
							      		<h5 class="mb-3"><?php echo $prod['name'] ?></h5>
							      		<p class="mb-3"><?php echo $prod['description'] ?></p>
							      		<span class="mb-3">Quantity Order: </span>
							      		<input type="number" name="productQuantity" id="productQuantity<?php echo $key?>" min="0" value="<?php echo $orderQuant ?>" class="form-control productQuantityCart mb-3">
							      		<button class="btn btn-primary " onclick="addToCart(<?php echo $key?>)" id="addToCart">Update Order</button>	
							      		<h6 class="mb-3">Product Price: $<span id="price_each<?php echo $key ?>"><?php echo $prod['price_each'] ?></span></h6>
							      		<h6 class="mb-3">Subtotal: $<span id="cart_prod_subtotal<?php echo $key ?>"><?php echo $orderQuant * $prod['price_each'] ?></span></h6>
							    	</div>
							  	</li>
							</ul>
							<hr>
						</div><!--//cart-container-->
					<?php 
								}//foreach $result
							}//if 0 orders, wont show in cart
						}//foreach $cartItems  
					?>
					<div class="clearfix">
						<h5 class="totalPrice float-right">TOTAL PRICE: $
							<span id="totalPriceCart">
								<?php 
									if(isset($_SESSION['totalPrice']))
									echo $_SESSION['totalPrice'];
							 	?> 
							</span> 
						</h5>
					</div>
					<a href="checkout.php" class="btn btn-primary float-right" id="checkoutBtn" disabled>Checkout</a>
					</div>
				</div>
				</div>
			</div>
		</div><!--container-->
		<!-- Displays if no cart items -->
		<?php } else { 
				unset($_SESSION['cart']);
				unset($_SESSION['subtotal']);
				unset($_SESSION['totalPrice']);
			?>
		<div class="container cart-empty-msg">
			<h4>Your Cart seems lonely. Checkout some of the products and add them to your cart.</h4>
		</div>
		<?php } ?>
	</div>
	<?php include "partials/footer.php"; ?>
<?php include "partials/foot.php"; ?>