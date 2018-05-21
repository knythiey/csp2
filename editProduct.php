<?php include "partials/header.php"; ?>
	
	<?php 
		session_start();
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
	
		<div class="container registerProduct-form">
			<h2>Update Product <?php echo $key['product_name']?></h2>
			<form action="lib/updateProduct.php" method="POST" enctype="multipart/form-data">
				<p><?php 
					if(isset($_SESSION['productUpdatedMsg'])){
						echo $_SESSION['productUpdatedMsg'];
						} 
					?>
				</p>
				<p>
					<?php 
						if(isset($_SESSION['updatedDbConfirm'])){
							echo $_SESSION['updatedDbConfirm'];
						}
					 ?>
				</p>
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
					<select name="updateProdCat" id="updateProdCat">
						<option value="1" required>PS4</option>
						<option value="2">XBOX One</option>
						<option value="3">Nintendo Switch </option>
						<option value="4">PS4 Accessory</option>
						<option value="5">XBOX One Accessory</option>
						<option value="6">Nintendo Switch Accessory</option>
					</select>
				</div>	
				
				<div class="form-group">
					<label for="prodImg">Upload A New Product Image</label><small> current img - <?php echo $key['product_image'] ?></small><br> 
					<input type="file" name="updateProdImg" id="updateProdImg">
				</div>
		
				<button class="btn btn-primary" type="submit" name="submit">Update Product</button>
			</form>
		</div><!--container-->
		<?php }  ?>
		<?php 
			$_SESSION['productUpdatedMsg'] = "";
			$_SESSION['updatedDbConfirm'] = "";
		?>
	</div>
	<?php include "partials/footer.php"; ?>
<?php include "partials/foot.php"; ?>