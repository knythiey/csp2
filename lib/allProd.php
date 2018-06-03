<?php	 
	$id_query = "SELECT id FROM products";
	$id_result = mysqli_query($conn, $id_query);
	if(false === $id_result) {
	   throw new Exception('Query failed with: ' . mysqli_error());
	} else {
	   $row_count = mysqli_num_rows($id_result);
	   // free the result set as you don't need it anymore
	   mysqli_free_result($id_result);
	}
	
	// determine page number from $_GET
	$page = 1;
	if(!empty($_GET['page'])) {
	    $page = filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT);
	    if(false === $page) {
	        $page = 1;
	    }
	}

	// set the number of items to display per page
	$items_per_page = 6;

	$page_count = 0;
	if (0 === $row_count) {  
	    // maybe show some error since there is nothing in your table
	    header("location: ../sample.php");
	} else {
	   // determine page_count
	   $page_count = (int)ceil($row_count / $items_per_page);
	   // double check that request page is in range
	   if($page > $page_count) {
	        // error to user, maybe set page to 1
	        $page = 1;
	   }
	}


	// build query
	$offset = ($page - 1) * $items_per_page;
?>

<div class="row catalog-items">
	<div class="card-group">
		<?php
			$product_query = "SELECT * FROM products LIMIT " . $offset . "," . $items_per_page;	
			$product_result = mysqli_query($conn, $product_query);  
			foreach ($product_result as $key) { ?>	
			<div class="col-md-4">
				<div class="card item-container"">
					<div class="card-header">
					    <h6 class="card-title my-0 py-1"><?php echo $key['product_name'] ?>
						<span class="badge badge-pill badge-danger py-2 mt-1 mb-0">
							<p class="card-text price_each">USD $<span id="price_each<?php echo $key['id'] ?>"><?php echo $key['price_each'] ?></span></p>
						</span>	
					    </h6>
					</div>
						<a href="product.php?id=<?php echo $key['id'] ?>">
						<img class="card-img-top img-thumbnail img-fluid" src="<?php echo $key['product_image'] ?>" alt="Card image cap" id="home-prod-img">
						</a>
					<div class="card-body">
						<div id="quantMsg<?php echo $key['id'] ?>"></div>
						<div  id="showQuantity<?php echo $key['id']  ?>" class="showQuantity p-2 my-1">
							<input type="number" name="productQuantity" id="productQuantity<?php echo $key['id'] ?>"
							value="" class="form-control productQuantity" min="0">
							<button class="btn btn-primary addCart" onclick="addToCart(<?php echo $key['id'] ?>)" id="addToCart">Add to Cart</button>
						</div>
						<a href="product.php?id=<?php echo $key['id'] ?>" class="btn btn-info m-1" id="productInfoBtn"><i class="far fa-eye"></i> Product Info</a>
						<button class="btn btn-success m-1" onclick="showAddQuantity(<?php echo $key['id'] ?>)" id = "showQuantityBtn"><i class="fas fa-shopping-cart"></i> Buy</button>
					</div>
				</div> <!--card -->
			</div>
		<?php 
			}//foreach $product_result
		 ?>
	</div><!--card-group -->
	<div class="container">
		<nav>
	  		<ul class="pagination justify-content-center">
				<?php 
					for ($i = 1; $i <= $page_count; $i++) {
					   if ($i === $page) { // this is current page ?>
					   	<li class="page-item active"><a class="page-link" href="home.php?page=<?php echo $i ?>"><?php echo $i ?></a></li>
					   <?php } else { // show link to other page ?>
					   <li class="page-item"><a class="page-link" href="home.php?page=<?php echo $i ?>#catalog"><?php echo $i ?></a></li>  
					<?php 
					   }
					}
				?>
	  		</ul>
		</nav>
	</div>

</div>