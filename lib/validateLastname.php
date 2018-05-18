<?php 

	require "connect.php";

	if(isset($_POST['lastName']) && !empty($_POST['lastName'])){
		$lastName = $_POST['lastName'];
		$query = "SELECT * FROM users WHERE username = '$lastName'";
		$result = mysqli_query($conn, $query);

		if(preg_match('/^[a-zA-Z\s]+$/', $lastName)){
			echo true;
		} else {
			echo " Use Alphabet characters only (No special characters)";
		}
	} else {
			echo "";
		}	
?>