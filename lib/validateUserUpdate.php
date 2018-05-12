<?php
	session_start();
	require "connect.php";

	$newUsername = $_POST['createUsername'];
	$newPassword = sha1($_POST['createPassword']);
	$newEmail = $_POST['userEmail'];
	$newFirstname = $_POST['firstName'];
	$newLastname = $_POST['lastName'];
	$newGender = $_POST['gender'];
	$user_id =  $_SESSION['user_id'];
	

	// echo $user_id. "<br>";
	// echo $newUsername . "<br>";
	// echo $newPassword . "<br>";
	// echo $newEmail . "<br>";
	// echo $newFirstname . "<br>";
	// echo $newLastname . "<br>";
	// echo $newGender . "<br>";
	
	$query = "UPDATE users SET 
			username = '$newUsername', 
			password = '$newPassword', 
			email = '$newEmail',
			first_name = '$newFirstname', 
			last_name = '$newLastname', 
			gender = '$newGender' 
			WHERE 
			id = '$user_id'";
	$result = mysqli_query($conn, $query);
	
	header("Location: ../profile.php")	
?>