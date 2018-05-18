<?php include "partials/header.php"; ?>
	
	<?php 
		session_start();	
		function getTitle(){
			echo "Product Details Page";
		};
		require "lib/connect.php"; 
		if(isset($_GET['id'])){
		$prod_id = $_GET['id'];
		$_SESSION['prod_id'] = $_GET['id'];
		$prod_query = "SELECT * FROM products p JOIN categories cat WHERE p.id = '$prod_id' && p.category_id = cat.id";
		$prod_result = mysqli_query($conn, $prod_query);

		// $rating_avg = "SELECT AVG(product_rating) apr FROM product_feedback pf JOIN products p  WHERE p.id = '$prod_id' && p.product_feedback = pf.id";
		//$rating_avg_result = mysqli_query($conn, $rating_avg);

	}
?>
</head>
<body>
	<?php include "partials/navbar.php"; ?>
	<div class="main-wrapper">
		<h1> Product Details Page</h1>
		<?php if(isset($_SESSION['insertDbConfirm']) && isset($_SESSION['user_type']) && $_SESSION['user_type'] == "admin"){
				echo $_SESSION['insertDbConfirm'];
				}
			if(isset($_SESSION['deleteDbConfirm']) && isset($_SESSION['user_type']) && $_SESSION['user_type'] == "admin"){
				echo $_SESSION['deleteDbConfirm'];
				} 
		?>
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
					<!-- <h6>Product Rating: --> 
						<?php } //foreach ($rating_avg_result as $key) {
							//if($key['apr'] > 1){
								//echo $key['apr'] . " - Stars"; 
								//} else {
								//	echo $key['apr'] . " - Star"; 
								//} 
							//}
						?><!-- </h6> -->
					<?php foreach ($prod_result as $key) { ?>
					<p>"<?php echo $key['description'] ?>"</p>
					<h4>Reviews about <?php echo $key['product_name'] ?></h4>
					<?php } ?>
					<hr>
					<a href="#"><button class="btn btn-primary">Add to cart</button></a>
					<a href="#"><button class="btn btn-light">Checkout</button></a>
					<?php if(isset($_SESSION['user_type']) && $_SESSION['user_type'] == "admin"){ ?>
						<a href="editProduct.php?id=<?php echo $prod_id ?>"><button class="btn btn-info">Update Item</button></a>
						<a href="#confirmDelProd"><button class="btn btn-danger" id="delProdBtn">Delete Product</button></a>

						<div id="confirmDelProd" class="container">
							<button class="btn btn-danger" id="closeDelProd">X</button>
							<form action="lib/deleteProduct.php" method="POST">
								<label for="confirmDelete">Confirm Deletion <small>input admin password</small></label>
								<br>
								<input type="password" name="deleteProdPass" id="deleteProdPass" required>
								<button class="delProdBtn btn btn-danger" type="submit">Confirm Delete</button>
							</form>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
		<?php  
			$_SESSION['insertDbConfirm'] = "";
			$_SESSION['deleteDbConfirm'] = "";
		?>
	</div>
	<?php include "partials/footer.php"; ?>
<?php include "partials/foot.php"; ?>