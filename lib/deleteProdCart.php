<?php 
	require "connect.php";
	session_start();
	if(isset($_POST['prod_id'])){
		$id = $_POST['prod_id'];
		unset($_SESSION['cart'][$id]);
		unset($_SESSION['subtotal'][$id]);
		$_SESSION['itemCountCart'] = array_sum($_SESSION['cart']);
		$_SESSION['totalPrice'] = array_sum($_SESSION['subtotal']);
		$query = "SELECT product_name FROM products WHERE id = '$id'";
		$result =  mysqli_query($conn, $query);
		foreach ($result as $key) {
	?>
		<div class="alert alert-success">
			<h5><?php echo $key['product_name'] ?> removed from cart.</h5>
		</div>
	<?php } } else { ?>
		<div class="alert alert-warning">
			<h4>Invalid request. No item to remove.</h4>
		</div>
	<?php } ?>