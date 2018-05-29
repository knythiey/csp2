<select name="datePurchHist" id="datePurchHistAdmin" class="form-control">
	<?php
		require "connect.php";	
		$user_id = $_POST['user_id'];
		$date_purch_query = "SELECT * FROM orders WHERE user_id = '$user_id'";
		$date_purch_result =mysqli_query($conn, $date_purch_query);
		foreach ($date_purch_result as $ordKey) {
	?>
	<option value="<?php echo $ordKey['id'] ?>"><?php echo $ordKey['date_purchased'] ?></option>
	<?php } ?>
</select>
