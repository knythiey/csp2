<?php include "partials/header.php"; ?>
	
	<?php 
		session_start();
		function getTitle(){
			echo "Home Page";
		}
		require "lib/connect.php";
	?>
</head>
<body>
	<?php include "partials/navbar.php"; ?>
	<div class="main-wrapper my-0 pt-1">
		<h2 id="categoryName">
			<?php 
				if(isset($_SESSION['category_title'])){
					echo $_SESSION['category_title'];
				}
			 ?>
		</h2>
		
		<div class="container home-container">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb py-1 mb-1">
			    	<li class="breadcrumb-item active">Home</li>
				</ol>
			</nav>
			<hr>
				<?php 
					if(isset($_SESSION['deleteDbConfirm']) && isset($_SESSION['user_type'])){
						if($_SESSION['user_type'] == "admin"){ ?>
							<div class="alert alert-primary" role="alert">
								<?php echo $_SESSION['deleteDbConfirm']; ?>
							</div>
				<?php } } ?>

			<div class="owl-carousel owl-theme">
			    <div class="item"><img class="img-thumbnail" src="assets/img/nswitchbundle.jpg" alt=""></div>
			    <div class="item"><img class="img-thumbnail" src="assets/img/nswitchmodysbundle.jpg" alt=""></div>
			    <div class="item"><img class="img-thumbnail" src="assets/img/ps4bundle.png" alt=""></div>
			    <div class="item"><img class="img-thumbnail" src="assets/img/ps4mhwbundle.jpg" alt=""></div>
			    <div class="item"><img class="img-thumbnail" src="assets/img/xboxoneaorigbundle.jpg" alt=""></div>
			    <div class="item"><img class="img-thumbnail" src="assets/img/xboxonebundle.jpg" alt=""></div>
			    <div class="item"><img class="img-thumbnail" src="assets/img/xboxonebundle.jpg" alt=""></div>
			    <div class="item"><img class="img-thumbnail" src="assets/img/xboxonebundle.jpg" alt=""></div>
			    <div class="item"><img class="img-thumbnail" src="assets/img/xboxonebundle.jpg" alt=""></div>
			    <div class="item"><img class="img-thumbnail" src="assets/img/xboxonebundle.jpg" alt=""></div>
			</div>

			<div class="row catalog-items">
				<div class="card-group">
					<?php
							$cat_query = "SELECT * FROM categories";
							$cat_result = mysqli_query($conn, $cat_query);
							foreach ($cat_result as $catKey) {
								$catId = $catKey['id'];
								if(!isset($_SESSION['category']) || empty($_SESSION['category'])){
									$product_query = "SELECT * FROM products";
								}
								else if (isset($_SESSION['category']) && $_SESSION['category'] == $catKey['id']) {
									$product_query = "SELECT *, p.id as prod_id FROM products p JOIN categories c WHERE category_id = '$catId' group by p.category_id, p.product_name ORDER BY p.product_name ASC";
								}
							}//foreach $cat_result
							$product_result = mysqli_query($conn, $product_query);  
							foreach ($product_result as $key) { ?>	
							<div class="col-md-4">
								<div class="card item-container"">
									<a href="product.php?id=<?php echo $key['id'] ?>">
									<img class="card-img-top home-prod-img img-thumbnail img-fluid" src="<?php echo $key['product_image'] ?>" alt="Card image cap">
									</a>
									<div class="card-body">
										<h5 class="card-title"><?php echo $key['product_name'] ?></h5>
										<h6 class="card-text price_each">Price: $<span id="price_each<?php echo $key['id'] ?>"><?php echo $key['price_each'] ?></span></h6>
										<p class="card-text" id="indProdDesc">
											<a href="#showMoreDesc<?php echo $key['id']  ?>" data-toggle='modal'> Read Description</a>
										</p>
										<div class="modal fade" id="showMoreDesc<?php echo $key['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="LongProductDesc" aria-hidden="true">
										  	<div class="modal-dialog" role="document">
											    <div class="modal-content">
											      	<div class="modal-header">
											        	<h5 class="modal-title" id="LongProductDesc"><?php echo $key['product_name'] ?></h5>
											        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												          <span aria-hidden="true">&times;</span>
												        </button>
										      		</div>
										        <div class="modal-body">
										        	<?php echo $key['description']; ?>
										        </div>
										        <div class="modal-footer">
										        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										      	</div>
										    	</div>
										  	</div>
										</div>

										<a href="product.php?id=<?php echo $key['id'] ?>" class="btn btn-info" id="productInfoBtn"><i class="far fa-eye"></i> Product Details</a>
										<button class="btn btn-success" onclick="showAddQuantity(<?php echo $key['id'] ?>)" id = "showQuantityBtn"><i class="fas fa-shopping-cart"></i> Buy</button>
										<div  id="showQuantity<?php echo $key['id']  ?>" class="showQuantity">
										<input type="number" name="productQuantity" id="productQuantity<?php echo $key['id'] ?>"
										value="" class="form-control productQuantity" min="0">
										<button class="btn btn-primary addCart" onclick="addToCart(<?php echo $key['id'] ?>)" id="addToCart">Add to Cart</button>
										</div>

									</div>
								</div> <!--card -->
							</div>
					<?php 
							}//foreach $product_result
					 ?>
				</div><!--card-group -->
			</div>
		</div>
		<?php $_SESSION['deleteDbConfirm'] = "";
			  unset($_SESSION['category']);
			  unset($_SESSION['category_title']);
		?>
	</div><!--main-wrapper-->
	<?php include "partials/footer.php"; ?>
<?php include "partials/foot.php"; ?>