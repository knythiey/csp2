<?php 

require "connect.php";
$prod_id = $_POST['prod_id'];

$prod_query = "SELECT * FROM products WHERE id = '$prod_id'";
$prod_result = mysqli_query($conn, $prod_query);

foreach ($prod_result as $key) {
?>

<h3><?php echo $key['product_name'] ?></h3>
<hr>
<div class="row">
	<div class="col-md-6 col-sm-12 prod-left-cont">
		<img src="<?php echo $key['product_image'] ?> " alt="product image" class="img-fluid img-thumbnail" id="adminShowProdImg">
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
	<div class="col-md-6 col-sm-12 prod-right-cont">
		<h4>Price: <span class="product-price">USD <?php echo $key['price_each']  ?></span></h4>
		<?php foreach ($prod_result as $key) { ?>
		<p>"<?php echo $key['description'] ?>"</p>
		<?php } ?>
		<br>
	</div>
</div>
<hr>


<?php  } ?>