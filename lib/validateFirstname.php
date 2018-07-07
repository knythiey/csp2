<?php 

	require "connect.php";

	if(isset($_POST['firstName']) && !empty($_POST['firstName'])){
		$firstName = $_POST['firstName'];
		$query = "SELECT * FROM users WHERE username = '$firstName'";
		$result = mysqli_query($conn, $query);

		if(preg_match('/^[a-zA-Z\s]+$/', $firstName)){
			echo true;
		} else {
			echo " Use Alphabet characters only (No special characters)";
		}
	} else {
			echo "";
		}	
?>