<?php 
	session_start();
	require "connect.php";
	$prod_id = $_POST['prod_id'];
	$prod_quant = $_POST['prod_quant'];

	$query = "SELECT * FROM products WHERE id = '$prod_id'";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($result);
	if(preg_match('/^[0-9\S]+$/',$prod_quant)){
	?>
	<div class="alert alert-success" role="alert">
		<?php echo $row['product_name'] . " " . $prod_quant . "/pc added to cart." ?>
	</div>
<?php
	} else { ?>
		<div class="alert alert-warning" role="alert">
			<?php echo "Error Input. Enter a number"; ?>
		</div>
	<?php } ?>
