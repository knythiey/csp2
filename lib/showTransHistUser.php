<?php 
	require "connect.php";
	$ord_id = $_POST['ord_id'];

	$query = "SELECT *, ord.id as ord_id FROM products prod JOIN ordered_items ord_itm JOIN orders ord ON(prod.id = ord_itm.product_id && ord_itm.order_id = ord.id) WHERE ord.id = '$ord_id'";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($result);
?>
	<hr class="m-2">
	<div class="container">
		<div class="row modalShowTransHeader">
			<div class="col-sm-6">
				<small>Order Id: [<?php echo $row['reference_number'] ?>]</small>
			</div>
			<div class="col-sm-6">
				<small>Total: USD $<?php echo $row['total'] ?></small>
			</div>
		</div>
	</div>
	<table class="table table-responsive table-striped">
		<tr>
			<th>Product Name</th>
			<th>Quantity</th>
			<th>Subtotal</th>
		</tr>
	<?php foreach ($result as $key) { ?>
		<tr>
			<td><small><?php echo $key['product_name'] ?></small></td>
			<td><small><?php echo $key['quantity'] ?></small></td>
			<td><small>USD $<?php echo $key['subtotal'] ?></small></td>
		</tr>
	<?php } ?>
	</table>
	<hr>
	