<?php 

	require "connect.php";

	if(isset($_POST['userEmail']) && !empty($_POST['userEmail'])){
		$userEmail = $_POST['userEmail'];
		$query = "SELECT * FROM users WHERE email = '$userEmail'";
		$result = mysqli_query($conn, $query);

		if (preg_match('/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]{3,}\.[a-zA-Z]{2,}$/', $userEmail)) {
			if(mysqli_num_rows($result) > 0){
			echo "Email Already Exists";
			} else {
				echo true;
			}
		} else{
			echo "Invalid Email Format. Try Again!";
		}	
	} else {
		echo "Enter a valid Email Address";
	}
?>