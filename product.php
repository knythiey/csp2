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
	}
?>
</head>
<body>
	<?php include "partials/navbar.php"; ?>
	<div class="main-wrapper">
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
		<?php if(isset($_SESSION['user_type']) && $_SESSION['user_type'] == "admin"){ ?>
			<div id="admin_update_prod_cont">
				<a href="editProduct.php?id=<?php echo $prod_id ?>"><button class="btn btn-info">Update Item</button></a>
				<a href="#confirmDelProd"><button class="btn btn-danger" id="delProdBtn" data-toggle="modal" data-target="#confirmDelProd">Delete Product</button></a>
					<div class="modal fade" id="confirmDelProd" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
					 	<div class="modal-dialog modal-dialog-centered" role="document">
					    <div class="modal-content">
					      	<div class="modal-header">
					        <h5 class="modal-title">Confirm Deletion of <?php echo $key['product_name'] ?></h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      	</div>
					     	 <div class="modal-body">
					     	 	<form action="lib/deleteProduct.php" method="POST">
					     	 	<h5>Input admin password:</h5>
						        <input type="password" name="deleteProdPass" id="deleteProdPass" class="form-control" required>
						        <button class="delProdBtn btn btn-danger mt-3" type="submit" id="deleteProdBtn">Confirm Delete</button>
						        </form>
					      	</div>
					      	<div class="modal-footer">
					        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
					      	</div>
					    	</div>
					 	</div>
					</div>
				</div>
		<?php } ?>
			<hr>
			<div class="row">
				<div class="col-md-6 col-sm-12 prod-left-cont">
					<img src="<?php echo $key['product_image'] ?> " alt="product image" class="img-fluid prod-display-image">
				</div>
				<div class="col-md-6 col-sm-12 prod-right-cont">
					<h3>Category : <span  class="product-name"><?php echo $key['name'] ?></span></h3>
					<hr>
					<h4>Price: <span class="product-price">US$ <?php echo $key['price_each']  ?></span></h4>
					<?php foreach ($prod_result as $key) { ?>
					<p>"<?php echo $key['description'] ?>"</p>
					<h4>Reviews about <?php echo $key['product_name'] ?></h4>
					<?php } ?>
					<hr>
					<input type="number" name="productQuantity" id="productQuantity<?php echo $key['id']?>" min="0" value="<?php echo $orderQuant ?>" class="form-control productQuantityCart">
					<button class="btn btn-primary" onclick="addToCart(<?php echo $key['id']?>)" id="addToCart">Add to Cart</button>	
					<a href="checkout.php"><button class="btn btn-secondary" id="checkoutBtn" disabled>Checkout</button></a>
					<br>
				<?php } ?>
				</div>
			</div>
			<hr>
		</div>
		<?php  
			$_SESSION['insertDbConfirm'] = "";
			$_SESSION['deleteDbConfirm'] = "";
		?>
	</div>
	<?php include "partials/footer.php"; ?>
<?php include "partials/foot.php"; ?>