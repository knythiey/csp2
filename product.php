<?php include "partials/header.php"; ?>
	
	<?php 
		session_start();	
		function getTitle(){
			echo "Product Details Page";
		};
		require "lib/connect.php"; 
		if(isset($_GET['id'])){
		$prod_id = $_GET['id'];

		$prod_query = "SELECT * FROM products p JOIN categories cat JOIN product_feedback pf JOIN users u WHERE p.id = '$prod_id' && p.category_id = cat.id && p.product_feedback = pf.id && pf.user_id = u.id";
		$prod_result = mysqli_query($conn, $prod_query);

		$rating_avg = "SELECT AVG(product_rating) apr FROM product_feedback pf JOIN products p  WHERE p.id = '$prod_id' && p.product_feedback = pf.id";
		$rating_avg_result = mysqli_query($conn, $rating_avg);
	}
?>
</head>
<body>
	<?php include "partials/navbar.php"; ?>
	<div class="main-wrapper">
		<h1> Product Details Page</h1>
		<?php foreach ($prod_result as $key) { ?>
		
		<div class="container product-container">
			<h2><?php echo $key['product_name'] ?></h2>
			<hr>
			<div class="row">
				<div class="col-md-6 col-sm-12 prod-left-cont">
					<img src="<?php echo $key['product_image'] ?> " alt="product image" class="image-fluid prod-display-image">
				</div>
				<div class="col-md-6 col-sm-12 prod-right-cont">
					<h3>Category : <?php echo $key['name'] ?></h3>
					<h4>Price: US$ <?php echo $key['price_each']  ?></h4>
					<h6>Product Rating: 
						<?php } foreach ($rating_avg_result as $key) {
							if($key['apr'] > 1){
								echo $key['apr'] . " - Stars"; 
								} else {
									echo $key['apr'] . " - Star"; 
								} 
							}
						?></h6>
					<?php foreach ($prod_result as $key) { ?>
					<p>"<?php echo $key['description'] ?>"</p>
					<h4>Reviews about <?php echo $key['product_name'] ?></h4>
					<hr>
					<!-- <h5><?php //echo //$key['username'] ?> 's review:</h5> -->
					<!-- <p><?php //echo //$key['product_feedback'] ?></p> -->
					<!-- <p><?php //echo //$key['username'] ?> 's personal rating about <?php //echo $key['product_name'] ?> is <?php //$key['product_rating'] ?> star</p> -->
					<button class="btn btn-primary">Add to cart</button>
					<button class="btn btn-light">Checkout</button>
					<button class="btn btn-info">Update Item</button>
				</div>
			</div>
		</div>
		<?php } ?>

	
	</div>
	<?php include "partials/footer.php"; ?>
<?php include "partials/foot.php"; ?>