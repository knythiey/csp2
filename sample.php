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
			<?php 	} } ?>

			<h2>Featured Items</h2>
			<div class="container owl-container">
				<div class="owl-featured owl-carousel owl-theme">
				    <div class="item">
				    	<img class="img-thumbnail" src="assets/img/nswitchbundle.jpg" alt="">
				    	<div class="item-caption">
				    		<h3 class="animated fadeInLeft" id="owl-featured-prodName">Nintendo Switch Bundle</h3>
				    		<h4 class="animated fadeInUp" id="owl-featured-prodPrice">USD 300</h4>
				    	</div>
				    </div>
				    <div class="item">
				    	<img class="img-thumbnail" src="assets/img/nswitchmodysbundle.jpg" alt="">
				    	<div class="item-caption">
				    		<h3 class="" id="owl-featured-prodName">Mario Odyssey Bundle</h3>
				    		<h4 class="" id="owl-featured-prodPrice">USD 350</h4>
				    	</div>
				    </div>
				    <div class="item">
				    	<img class="img-thumbnail" src="assets/img/ps4bundle.png" alt="">
				    	<div class="item-caption">
				    		<h3 class="" id="owl-featured-prodName">PS4 Bundle</h3>
				    		<h4 class="" id="owl-featured-prodPrice">USD 400</h4>
				    	</div>
				    </div>
				    <div class="item">
				    	<img class="img-thumbnail" src="assets/img/ps4mhwbundle.jpg" alt="">
				    	<div class="item-caption">
				    		<h3 class="" id="owl-featured-prodName">Monster Hunter:World Bundle</h3>
				    		<h4 class="" id="owl-featured-prodPrice">USD 399</h4>
				    	</div>
				    </div>
				    <div class="item">
				    	<img class="img-thumbnail" src="assets/img/xboxoneaorigbundle.jpg" alt="">
				    	<div class="item-caption">
				    		<h3 class="" id="owl-featured-prodName">Assassin's Creed Bundle</h3>
				    		<h4 class="" id="owl-featured-prodPrice">USD 370</h4>
				    	</div>
				    </div>
				    <div class="item">
				    	<img class="img-thumbnail" src="assets/img/xboxonebundle.jpg" alt="">
				    	<div class="item-caption">
				    		<h3 class="" id="owl-featured-prodName">Xbox One Bundle</h3>
				    		<h4 class="" id="owl-featured-prodPrice">USD 279</h4>
				    	</div>
				    </div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-2 col-sm-12">
					<div>
						<h2 class="category-title">Categories</h2>
					</div>
					<div class="card card-block">
						<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
							<a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab">HOME</a>
						<?php 
							$cat_query_left = "SELECT * FROM categories";
							$cat_result_left = mysqli_query($conn, $cat_query_left);
							foreach ($cat_result_left as $catNameLeft) { ?>
							<a class="nav-link mb-1 p-1" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-<?php echo $catNameLeft['id'] ?>" role="tab"><?php echo $catNameLeft['name'] ?>
							</a>
						<?php } ?>
						</div>
					</div>	
				</div>
				<div class="col-md-10 col-sm-12">
					<div class="tab-content" id="v-pills-tabContent">
						<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel">
							<h2 class="category-title">HOME</h2>
							<?php include "lib/sample.php" ?>
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
		</div><!--home-container-->
		<?php $_SESSION['deleteDbConfirm'] = "";
			  unset($_SESSION['category']);
			  unset($_SESSION['category_title']);
		?>
	</div><!--main-wrapper-->
	<?php include "partials/footer.php"; ?>
<?php include "partials/foot.php"; ?>