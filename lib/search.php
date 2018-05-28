	<?php 
		session_start();
		$search = $_POST['key_word'];
		require "connect.php"; 
		$product_query = "SELECT * FROM products WHERE product_name LIKE '%".$search."%'";
		$product_result = mysqli_query($conn, $product_query); 
	?>
		<div class="card-group">
		<?php
			if(isset($search) && !empty($search)){
				foreach ($product_result as $key) { ?>	
				<div class="col-md-6">
					<div class="card item-container"">
						<a href="product.php?id=<?php echo $key['id'] ?>">
						<img class="card-img-top home-prod-img img-thumbnail img-fluid" src="<?php echo $key['product_image'] ?>" alt="Card image cap">
						</a>
						<div class="card-body">
							<h5 class="card-title"><?php echo $key['product_name'] ?></h5>
							<h6 class="card-text price_each">Price: $<span id="price_each<?php echo $key['id'] ?>"><?php echo $key['price_each'] ?></span></h6>
							<p class="card-text" id="indProdDesc">
								<?php 
									$desc = $key['description'];
								  	//checks to see if desc is more than 70 chracters, will cut the last sentence. then adds read more else, will just display the description normally.
								  // 	if(strlen($desc) > 70 ){
										// $parts = preg_split('/([\s\n\r]+)/', $desc, null, PREG_SPLIT_DELIM_CAPTURE);
									 //  	$parts_count = count($parts);

									 //  	$width = 100;
									 //  	$length = 0;
									 //  	$last_part = 0;
									 //  	$last_taken = 0;
									 //  	foreach($parts as $part){
									 //    	$length += strlen($part);
									 //   		if ( $length > $width ){
									 //        	break;
									 //    	}
									 //    	++$last_part;
									 //    	if ( $part[strlen($part)-1] == '.' ){
									 //        	$last_taken = $last_part;
									 //    	}
									 //  	}
									 //  	$result = implode(array_slice($parts, 0, $last_taken));
									 //  	echo $result. ".." . "<a href='#showMoreDesc" . $key["id"] ."' data-toggle='modal'> read more</a>";
								  // 	} else {
								  // 		echo $desc;
								  // 	}
								  echo $desc;
								?>
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
		<?php }//foreach $product_result ?>
		</div><!--card-group -->
	<?php } else if($search == "") { ?>
		<div class="card-group">
					<?php 
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
									<?php 
										$desc = $key['description'];
									  	//checks to see if desc is more than 70 chracters, will cut the last sentence. then adds read more else, will just display the description normally.
									  // 	if(strlen($desc) > 70 ){
											// $parts = preg_split('/([\s\n\r]+)/', $desc, null, PREG_SPLIT_DELIM_CAPTURE);
										 //  	$parts_count = count($parts);

										 //  	$width = 100;
										 //  	$length = 0;
										 //  	$last_part = 0;
										 //  	$last_taken = 0;
										 //  	foreach($parts as $part){
										 //    	$length += strlen($part);
										 //   		if ( $length > $width ){
										 //        	break;
										 //    	}
										 //    	++$last_part;
										 //    	if ( $part[strlen($part)-1] == '.' ){
										 //        	$last_taken = $last_part;
										 //    	}
										 //  	}
										 //  	$result = implode(array_slice($parts, 0, $last_taken));
										 //  	echo $result. ".." . "<a href='#showMoreDesc" . $key["id"] ."' data-toggle='modal'> read more</a>";
									  // 	} else {
									  // 		echo $desc;
									  // 	}
									  echo $desc;
									?>
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
		<?php }//foreach $product_result ?>
		</div><!--card-group -->
	<?php } ?>