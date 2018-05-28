<?php include "partials/header.php"; ?>
	
	<?php 
		session_start();
		function getTitle(){
			echo "Register Product Page";
		} 
	?>
</head>
<body>
	<?php include "partials/navbar.php"; ?>
	<div class="main-wrapper login-bg">
		
		<div class="container registerProduct-form">
			<div class="login-header">
				<h2>Register Product</h2>
			</div>
			<form action="lib/createProduct.php" method="POST" enctype="multipart/form-data" class="registerProduct-cont">
				<p><?php 
					if(isset($_SESSION['uploadMsg'])){
						echo $_SESSION['uploadMsg'];
						} 
					?>
				</p>
				<p>
					<?php 
						if(isset($_SESSION['insertDbConfirm'])){
							echo $_SESSION['insertDbConfirm'];
						}
					 ?>
				</p>
				<div class="form-group">
					<label for="productName">Product Name:* </label>
					<input type="text" class="form-control" name="prodName" id="prodName" placeholder="Enter Product Name" maxlength="255" required>
				</div>

				<div class="form-group">
					<label for="productDesc">Product Description:* </label>
					<textarea name="prodDesc" id="prodDesc" cols="30" rows="10" class="form-control" required></textarea>
				</div>

				<div class="form-group">
					<label for="prodPrice">Product Price:* </label>
					<span>US$</span><input type="number" class="form-control" name="prodPrice" id="prodPrice" required>
				</div>
				
				<div class="form-group">
					<label for="prodCategory">Product Category:</label>
					<select name="prodCat" id="prodCat">
						<option value="1" required>PS4</option>
						<option value="2">XBOX One</option>
						<option value="3">Nintendo Switch </option>
						<option value="4">PS4 Accessory</option>
						<option value="5">XBOX One Accessory</option>
						<option value="6">Nintendo Switch Accessory</option>
					</select>
				</div>	
				
				<div class="form-group">
					<label for="prodImg">Upload Product Image</label>
					<input type="hidden" name="MAX_FILE_SIZE" value="3145728">
					<input type="file" name="prodImg" id="prodImg">
				</div>
		
				<button class="btn btn-primary" type="submit" name="submit">Register Product</button>
			</form>
		</div><!--container-->
		<?php 
			$_SESSION['uploadMsg'] = "";
			$_SESSION['insertDbConfirm'] = "";
		?>
	</div>
	<?php include "partials/footer.php"; ?>
<?php include "partials/foot.php"; ?>