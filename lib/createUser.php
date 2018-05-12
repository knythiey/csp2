<?php 
	require "connect.php";

	$username = $_POST['createUsername'];
	$password = sha1($_POST['createPassword']);
	$email = $_POST['userEmail'];
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$gender = $_POST['gender'];
	$userType = $_POST['userType'];
	
	$query = "INSERT INTO users(username, password, email, first_name, last_name, gender,user_type) VALUES ('$username', '$password', '$email', '$firstName', '$lastName', '$gender', $userType)";
	$result = mysqli_query($conn, $query);
	
	header("Location: ../profile.php")	
?>