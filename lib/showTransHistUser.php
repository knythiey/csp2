<?php 
	require "connect.php";
	$ord_id = $_POST['ord_id'];

	$query = "SELECT *, ord.id as ord_id FROM products prod JOIN ordered_items ord_itm JOIN orders ord ON(prod.id = ord_itm.product_id && ord_itm.order_id = ord.id) WHERE ord.id = '$ord_id'";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($result);
?>
	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<h3>Order Id: <?php echo $row['ord_id'] ?></h3>
			</div>
			<div class="col-sm-6">
				<h3>Total: USD <?php echo $row['total'] ?></h3>
			</div>
		</div>
	</div>
	<?php foreach ($result as $key) { ?>
		<table class="table table-responsive table-border">
			<tr>
				<th>Product Image</th>
				<th>Product Name</th>
				<th>Quantity</th>
				<th>Subtotal</th>
			</tr>
			<tr>
				<td><img src="<?php echo $key['product_image'] ?>" alt="product_image" id="showTransHistUserImg" class="img-fluid img-thumbnail"></td>
				<td><small><?php echo $key['product_name'] ?></small></td>
				<td><small><?php echo $key['quantity'] ?></small></td>
				<td><small>USD <?php echo $key['subtotal'] ?></small></td>
			</tr>
		</table>
	<?php } ?>
	<h4>Ref Num: <small>[<?php echo $row['reference_number'] ?>]</small></h4>
	