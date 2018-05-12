<?php 

	require "connect.php";

	if(isset($_POST['createUsername']) && !empty($_POST['createUsername'])){
		$createUsername = $_POST['createUsername'];
		$query = "SELECT * FROM users WHERE username = '$createUsername'";
		$result = mysqli_query($conn, $query);

		if(preg_match('/^[a-zA-Z0-9\S][a-zA-Z0-9]{5,31}$/', $createUsername)){
			if(mysqli_num_rows($result) > 0){
				echo "Username Already Exists";
			} else {
				echo true;
			}		
		} else {
			echo " Use Alphanumeric characters only (No spaces, and special characters)";
		}
	} else {
			echo " (min.5 max.32 characters)";
		}		
?>