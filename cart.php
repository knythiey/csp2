<?php include "partials/header.php"; ?>
	
	<?php 
		session_start(); 
		function getTitle(){
			echo "Cart Page";

		}
		require "lib/connect.php";
		if(isset($_SESSION['cart'])){
			$cartItems = $_SESSION['cart']; 	
		}
	?>
</head>
<body>
	<?php include "partials/navbar.php"; ?>
	<div class="main-wrapper">
		
		<h1> Cart Page</h1>
		<hr>
		<?php if(isset($_SESSION['cart'])){ ?>
		<div class="container">
			<div class="row">
				<div class="card-group">
				<div class="col-md-12">
					<div class="container">
					<?php 
						foreach ($cartItems as $key => $orderQuant) {
						// echo "id => ". $key . " number of items ordered => " . $orderQuant . "<br>";
						$query = " SELECT * FROM products p JOIN categories c WHERE p.id = '$key' && p.category_id = c.id";
						$result = mysqli_query($conn, $query);

						if($orderQuant > 0) {
							foreach ($result as $prod) {  	
					?>
							<ul class="list-unstyled">
								<li class="media">
							    	<img class="img-thumbnail img-fluid cart-display-image mr-3" src="<?php echo $prod['product_image'] ?>" alt="Product Image">
							    	<div class="media-body cart-item-details">
							      		<h3><?php echo $prod['product_name'] ?></h3>
							      		<h5><?php echo $prod['name'] ?></h5>
							      		<p><?php echo $prod['description'] ?></p>
							      		<span>Quantity Order: </span>
							      		<input type="number" name="productQuantity" id="productQuantity<?php echo $key ?>" min="0" value="<?php echo $orderQuant ?>" class="form-control productQuantityCart">
							      		<button class="btn btn-primary btn-sm" onclick="addToCart(<?php echo $key ?>)" >Update Order</button>	
							      		<h6>Product Price: $<?php echo $prod['price_each'] ?></h6>
							      		<h6>Subtotal: $<?php echo $orderQuant * $prod['price_each'] ?> </h6>
							    	</div>
							  	</li>
							</ul>
							<hr>
					<?php 
						}//if 0 orders, wont show in cart
						}//foreach $result
						}//foreach $cartItems  
					?>
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