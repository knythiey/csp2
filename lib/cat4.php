<div class="row catalog-items">
	<div class="card-group">
		<?php
			$product_query = "SELECT *, p.id as prod_id FROM products p JOIN categories c WHERE category_id = 4 group by p.category_id, p.product_name ORDER BY p.product_name ASC";
			$product_result = mysqli_query($conn, $product_query);  
			foreach ($product_result as $key) { ?>	
			<div class="col-md-4">
				<div class="card item-container"">
					<div class="card-header">
					    <h6 class="card-title my-0 py-1"><?php echo $key['product_name'] ?>
						<span class="badge badge-pill badge-danger py-2 mt-1 mb-0">
							<p class="card-text price_each">USD $<span id="price_eachCat<?php echo $key['prod_id'] ?>"><?php echo $key['price_each'] ?></span></p>
						</span>
					    	
					    </h6>
					</div>
						<a href="product.php?id=<?php echo $key['prod_id'] ?>">
						<img class="card-img-top img-thumbnail img-fluid" src="<?php echo $key['product_image'] ?>" alt="Card image cap" id="home-prod-img">
						</a>
					<div class="card-body">
						<div id="quantMsgCat<?php echo $key['prod_id'] ?>"></div>
						<div  id="showQuantityCat<?php echo $key['prod_id']  ?>" class="showQuantity p-2 my-1">
							<input type="number" name="productQuantity" id="productQuantityCat<?php echo $key['prod_id'] ?>"
							value="" class="form-control productQuantity" min="0">
							<button class="btn btn-primary addCart" onclick="addToCartCat(<?php echo $key['prod_id'] ?>)" id="addToCart">Add to Cart</button>
						</div>
						<a href="product.php?id=<?php echo $key['prod_id'] ?>" class="btn btn-info m-1" id="productInfoBtn"><i class="far fa-eye"></i> Product Info</a>
						<?php if(isset($_SESSION['current_user']) && $_SESSION['user_type'] == "user"){ ?>
						<button class="btn btn-success m-1" onclick="showAddQuantityCat(<?php echo $key['prod_id'] ?>)" id = "showQuantityBtn"><i class="fas fa-shopping-cart"></i> Buy</button>
						<?php } ?>
					</div>
				</div> <!--card -->
			</div>
		<?php 
			}//foreach $product_result
		 ?>
	</div><!--card-group -->
</div>