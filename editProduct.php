<?php  
	session_start();
	if(isset($_SESSION['current_user']) && $_SESSION['user_type'] != 'admin'){
	$_SESSION['admin_msg'] = "Admin only. Access Denied";
	header("Location: home.php");
	}
?>
<?php include "partials/header.php"; ?>
	
	<?php 
		function getTitle(){
			echo "Update Product Page";
		}
		require "lib/connect.php";
		$prod_id = $_GET['id'];
		$_SESSION['prod_id'] = $prod_id;
		$query = "SELECT * FROM products p JOIN categories cat WHERE p.id = '$prod_id' && p.category_id = cat.id";
		$result = mysqli_query($conn, $query);
	?>
</head>
<body>
	<?php include "partials/navbar.php"; ?>
	<div class="main-wrapper login-bg">
		<?php foreach ($result as $key) { ?>
		<div class="container">
			<div class="login-header">
				<h2>Update Product <?php echo $key['product_name']?></h2>
			</div>
			<div class="registerProduct-form">
				<p class="updateDbMsg">
				<?php 
				if(isset($_SESSION['productUpdatedMsg'])){
					echo $_SESSION['productUpdatedMsg'];
					} 
				?>
				</p>
				<p class="updateDbMsg">
				<?php 
					if(isset($_SESSION['updatedDbConfirm'])){
						echo $_SESSION['updatedDbConfirm'];
					}
				 ?>
				</p>
				<form action="lib/updateProduct.php" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label for="productName">Product Name:* </label>
						<input type="text" class="form-control" name="updateProdName" id="updateProdName" value="<?php echo $key['product_name'] ?>" maxlength="255" required>
					</div>

					<div class="form-group">
						<label for="productDesc">Product Description:* </label>
						<textarea name="updateProdDesc" id="updateProdDesc" cols="30" rows="10" class="form-control" required><?php echo $key['description'] ?></textarea>
					</div>

					<div class="form-group">
						<label for="prodPrice">Product Price:* </label>
						<span>US$</span><input type="number" class="form-control" name="updateProdPrice" id="updateProdPrice" value="<?php echo $key['price_each'] ?>" required>
					</div>
					
					<div class="form-group">
						<label for="prodCategory">Product Category:</label><small>currently <?php echo $key['name']  ?></small>
						<br>
						<select name="updateProdCat" id="updateProdCat" class="form-control">
							<option value="1" required>PS4</option>
							<option value="2">XBOX One</option>
							<option value="3">Nintendo Switch </option>
							<option value="4">PS4 Accessory</option>
							<option value="5">XBOX One Accessory</option>
							<option value="6">Nintendo Switch Accessory</option>
						</select>
					</div>	

					<button id="uploadNewImgBtn" type="button" class="btn btn-info my-3">Upload New image</button>
					<br>
					<div class="form-group" id="uploadNewImgForm">
						<button class="btn btn-warning"type="button" id="closeUploadNewImgForm">X</button>
						<label for="prodImg">Upload A New Product Image</label><small> current img - <?php echo $key['product_image'] ?></small><br>
						<input type="hidden" name="MAX_FILE_SIZE" value="3145728" id="updateProdImgSize" disabled> 
						<input type="file" name="updateProdImg" id="updateProdImg" class="form-control" disabled>
					</div>
			
					<button class="btn btn-primary" type="submit" name="submit">Update Product</button>
				</form>
			</div><!--registerproduct form-->
		</div><!---container-->
		<?php }  ?>
		<?php 
			$_SESSION['productUpdatedMsg'] = "";
			$_SESSION['updatedDbConfirm'] = "";
		?>
	</div>
	<?php include "partials/footer.php"; ?>
<?php include "partials/foot.php"; ?>