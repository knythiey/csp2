<?php 

	require "connect.php";

	if(isset($_POST['createUsername'])){
		$createUsername = $_POST['createUsername'];
		$query = "SELECT * FROM users WHERE username = '$createUsername'";
		$result = mysqli_query($conn, $query);

		if(mysqli_num_rows($result) > 0){
			echo "Username Already Exists";
		} else {
			echo "Username available";
		}
	}

?>