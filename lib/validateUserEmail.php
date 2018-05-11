<?php 

	require "connect.php";

	if(isset($_POST['userEmail'])){
		$userEmail = $_POST['userEmail'];
		$query = "SELECT * FROM users WHERE email = '$userEmail'";
		$result = mysqli_query($conn, $query);

		if(mysqli_num_rows($result) > 0){
			echo "Email Already Exists";
		} else {
			echo "Email available";
		}
	}

?>