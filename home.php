<?php include "partials/header.php"; ?>
	
	<?php 
		session_start();
		function getTitle(){
			echo "Index Page";
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

		<h6 id="adminMsg">
			<?php
				if(isset($_SESSION['admin_msg'])){
					echo $_SESSION['admin_msg'];
				} 
			?>
		</h6>
		
		<div class="container home-container">
			<?php 
				if(isset($_SESSION['deleteDbConfirm']) && isset($_SESSION['user_type'])){
					if($_SESSION['user_type'] == "admin"){ ?>
						<h5><?php echo $_SESSION['deleteDbConfirm']; ?></h5>
			<?php 	} } ?>
			<h2 class="category-title">Featured Items</h2>
			<hr>
			<div class="container owl-container">
				<div class="owl-featured owl-carousel owl-theme">
			    	<?php 
			    		$carousel_qry = "SELECT * FROM products WHERE price_each > 260";
			    		$carousel_result = mysqli_query($conn, $carousel_qry);
			    		foreach ($carousel_result as $car_item) {
			    	?>
				    <div class="item">
				    	<a href="product.php?id=<?php echo $car_item['id'] ?>"><img class="img-thumbnail" src="<?php echo $car_item['product_image'] ?>" alt="owl-carousel-image"></a>
				    	<div class="item-caption">
				    		<h3 class="animated fadeInLeft" id="owl-featured-prodName"><?php echo $car_item['product_name'] ?></h3>
				    		<h4 class="animated fadeInUp" id="owl-featured-prodPrice">USD $<?php echo $car_item['price_each'] ?></h4>
				    	</div>
				    </div>
					<?php } ?>
				</div>
			</div>
			
			<div class="row" id="catalog">
				<div class="col-md-2 col-sm-12">
					<div>
						<h2 class="category-title">Categories</h2>
					</div>
					<div class="card card-block">
						<div class="nav flex-column nav-pills p-2" id="v-pills-tab" role="tablist" aria-orientation="vertical">
							<a class="nav-link active p-2 m-0" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab">Home</a>
							<div class="dropdown-divider"></div>
						<?php 
							$cat_query_left = "SELECT * FROM categories";
							$cat_result_left = mysqli_query($conn, $cat_query_left);
							foreach ($cat_result_left as $catNameLeft) { ?>
							<a class="nav-link p-2" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-<?php echo $catNameLeft['id'] ?>" role="tab"><?php echo $catNameLeft['name'] ?>
							</a>
							<div class="dropdown-divider"></div>
						<?php } ?>
						</div>
					</div>	
				</div>
				<div class="col-md-10 col-sm-12">
					<div class="tab-content" id="v-pills-tabContent">
						<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel">
							<h2 class="category-title">Home</h2>
							<!-- <form class="my-2">
						      	<input class="form-control mr-sm-1" type="search" id="searchBarInput" placeholder="Search">
						    </form>	 -->		
							<?php include "lib/allProd.php" ?>
						</div>
						<?php 
						$cat_query_right = "SELECT * FROM categories";
						$cat_result_right = mysqli_query($conn, $cat_query_right);
						foreach ($cat_result_right as $catNameRight) { ?>
						<div class="tab-pane fade" id="v-pills-<?php echo $catNameRight['id'] ?>" role="tabpanel" >
							<h2 class="mb-1 p-1 category-title"><?php echo $catNameRight['name'] ?> Category</h2>
							<?php include "lib/cat".$catNameRight['id'].".php" ?>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
		<hr>
		</div><!--home-container-->
		<?php $_SESSION['deleteDbConfirm'] = "";
			  unset($_SESSION['category']);
			  unset($_SESSION['category_title']);
			  unset($_SESSION['admin_msg']);
		?>
	</div><!--main-wrapper-->
	<?php include "partials/footer.php"; ?>
<?php include "partials/foot.php"; ?>