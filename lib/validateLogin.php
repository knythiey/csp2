<?php 
	
	require "connect.php";

	$loginUsername = $_POST['loginUsername'];
	$loginPassword = $_POST['loginPassword'];

	$query = "SELECT * FROM users WHERE username = '$loginUsername' && password = '$loginPassword'";
	$result = mysqli_query($conn, $query);

	if(mysqli_num_rows($result) == 0){
		echo "Invalid Credentials";
	} else {
		echo "Good";
	}

?>