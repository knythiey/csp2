<?php include "partials/header.php"; ?>
	
	<?php 
		session_start();
		function getTitle(){
			echo "Home Page";
		}
		require "lib/connect.php";
		$product_query = "SELECT * FROM products";
		$product_result = mysqli_query($conn, $product_query); 
	?>
</head>
<body>
	<?php include "partials/navbar.php"; ?>
	<div class="main-wrapper">
		
		<h1> Home Page</h1>
		
		<div class="container">
			<?php 
				if(isset($_SESSION['deleteDbConfirm']) && $_SESSION['user_type'] == "admin"){
					echo $_SESSION['deleteDbConfirm'];
				}
			?>
			<div class="row">
				<div class="card-group">
					<?php foreach ($product_result as $key) { ?>	
						<div class="col-md-4">
							<div class="card">
								<a href="product.php?id=<?php echo $key['id'] ?>">
								<img class="card-img-top home-prod-img img-thumbnail img-fluid" src="<?php echo $key['product_image'] ?>" alt="Card image cap">
								</a>
								<div class="card-body">
									<h5 class="card-title"><?php echo $key['product_name'] ?></h5>
									<p class="card-text show-read-more"><?php echo $key['description'] ?></p>
									<a href="product.php?id=<?php echo $key['id'] ?>" class="btn btn-info">Product Details</a>
									<button class="btn btn-success form" onclick="showAddQuantity(<?php echo $key['id'] ?>)" id = "showQuantityBtn">Buying this</button>
									<div  id="showQuantity<?php echo $key['id']  ?>" class="showQuantity">
									<input type="number" name="productQuantity" id="productQuantity<?php echo $key['id'] ?>"
									value="" 
									class="form-control productQuantity" min="0">
									<button class="btn btn-primary btn-sm" onclick="addToCart(<?php echo $key['id'] ?>)">Add to Cart</button>
									</div>

								</div>
							</div> <!--card -->
						</div>
					<?php } ?>
				</div><!--card-group -->
			</div>
		</div>
		<?php $_SESSION['deleteDbConfirm'] = ""; ?>
	</div>
	<?php include "partials/footer.php"; ?>
<?php include "partials/foot.php"; ?>