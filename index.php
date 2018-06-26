<?php include "partials/header.php"; ?>
	
	<?php 
		session_start();
		require "lib/connect.php";
	function getTitle(){
		echo "Index Page";
	} 
	?>
</head>
<body>
	<?php include "partials/navbar.php"; ?>
	<div class="main-wrapper">
		<h5 id="nologgedin_msg">
			<?php 
				if(isset($_SESSION['logoutMsg'])){
					echo $_SESSION['logoutMsg'];
					session_unset();
					session_destroy();
				}
			?>
		</h5>
		<div class="container idx-cont">
			<div class="jumbotron">
				<h1>Welcome to Game<a class="navbar-brand" href="index.php"><button class="btn btn-dark brandnamebtn"><span class="brandnamebtntext">HUB</span></button></span></a></h1>
				<div class="row">
					<div class="col-md-6 col-sm-12">
						<h3><q>Your Partner In Gaming Technology</q></h3>
						<small class="float-right"><em>-GameHub</em></small>
					</div>
					<div class="col-md-6 col-sm-12">
						<h3>"One of the best in the industry"</h3>
						<small class="float-right"><em>-Kynt Company</em></small>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 col-sm-4">
						<img src="assets/img/delivery_img.png" alt="delivery_img">
						<br>
						<small><em>Reliable and On-time Deliveries</em></small>
					</div>
					<div class="col-md-4 col-sm-4 idx-marketing">
						<img src="assets/img/affordable_img.png" alt="afforadable_img">
						<br>
						<small><em>Cash-on-Delivery available</em></small>
					</div>
					<div class="col-md-4 col-sm-4">
						<img src="assets/img/cod_img.png" alt="cash_on_delivery_img">
						<br>
						<small><em>Latest Technologies at afforadable prices</em></small>
					</div>
				</div>
			</div>
			
			<h3 id="idx-bestseller">Best Sellers</h3>
			<hr class="idx-hr">
			<div class="container">
				<div class="owl-carousel owl-theme" id="owl-index">
					<?php 
						$owl_qry = "SELECT * FROM products GROUP BY category_id HAVING price_each < 60 ORDER BY price_each ASC LIMIT 8";
						$owl_res = mysqli_query($conn,$owl_qry) or die(mysqli_error($conn));
						// var_dump($owl_res);
						foreach($owl_res as $owl){
					?>
					<div class="item" id="owl_idx_prod_cont">
						<a href="product.php?id=<?php echo $owl['id']  ?>"><img src="<?php echo $owl['product_image'] ?>" alt="product_img" class="img-responsive"></a>
						<div class="item-caption">
							<small id="idx_prod_name"><a href="product.php?id=<?php echo $owl['id']  ?>"><em><?php echo $owl['product_name'] ?></em></a></small>
							<br>
							<span class="badge badge-pill badge-danger py-2 mt-1 mb-0">
								<p class="card-text price_each">USD $<span id="price_each<?php echo $owl['id'] ?>"><?php echo $owl['price_each'] ?></span></p>
							</span>	
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
			<hr class="idx-hr">
		</div>
	
	</div>
	<?php include "partials/footer.php"; ?>
<?php include "partials/foot.php"; ?>