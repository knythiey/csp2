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
				<?php 
				if(isset($_SESSION['cart'])){
					$cartItems = $_SESSION['cart'];
					foreach($cartItems as $prod_id => $orderQuant){ 
					// echo $prod_id . "<br>";
					// echo $orderQuant;
					
					$query = "SELECT * FROM products p WHERE p.id = '$prod_id'";
					$prod_result = mysqli_query($conn, $query);
						foreach ($prod_result as $key) {	
				?>
						<h2><?php echo $key['product_name'] ?></h2>
						<p>Quantity Ordered: <span id="quant_order_checkout"><?php echo $orderQuant  ?></span></p>
						<p>Product Price: $<span id="prod_price_checkout"><?php echo $key['price_each'] ?></span></p>
				<?php 
						}//foreach $prod_result
					}//foreach $cartItems 
				?>
				<p>Total Price: <?php echo $_SESSION['totalPrice'] ?></p>
				<?php
				}//if isset
				?>	
		</div>
	
	</div>
	<?php include "partials/footer.php"; ?>
<?php include "partials/foot.php"; ?>