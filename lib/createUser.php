<?php 
	require "connect.php";
	session_start();

	if(isset($_POST['userType'])){
		$userType = $_POST['userType'];
		$username = $_POST['createUsername'];
		$password = sha1($_POST['createPassword']);
		$email = $_POST['userEmail'];
		$firstName = $_POST['firstName'];
		$lastName = $_POST['lastName'];
		$gender = $_POST['gender'];
		$ship_add = $_POST['createShipAdd'];
		$cont_num = $_POST['createContNumber'];
		$query = "INSERT INTO users(username, password, email, first_name, last_name, gender, contact_number, shipping_address, user_type) VALUES ('$username', '$password', '$email', '$firstName', '$lastName', '$gender','$cont_num','$ship_add', $userType)";
		$result = mysqli_query($conn, $query);

		$session_query = "SELECT * FROM users WHERE username = '$username' && password = '$password'";
		$session_result = mysqli_query($conn, $session_query);

		foreach ($session_result as $key) {
				$_SESSION['user_id'] = $key['id'];
				$_SESSION['user_status'] = $key['user_status'];
				$_SESSION['current_user'] = $key['username'];
				$_SESSION['user_firstName'] = $key['first_name'];
				$_SESSION['user_lastName'] = $key['last_name'];
				$_SESSION['user_avatar'] = $key['user_avatar_path'];
				$_SESSION['user_gender'] = $key['gender'];
				$_SESSION['user_email'] = $key['email'];
				$_SESSION['user_type'] = $key['role'];
				$_SESSION['user_address'] = $key['shipping_address'];
				$_SESSION['user_contact'] = $key['contact_number'];
				$_SESSION['date_created'] = $key['date_created'];
		}
		$_SESSION['welcome_msg'] = "Registration Successful! Welcome, " . $_SESSION['current_user'] . "!"; 
		header("Location: ../profile.php");	
	} else {
		$username = $_POST['createUsername'];
		$password = sha1($_POST['createPassword']);
		$email = $_POST['userEmail'];
		$firstName = $_POST['firstName'];
		$lastName = $_POST['lastName'];
		$gender = $_POST['gender'];
		$ship_add = $_POST['createShipAdd'];
		$cont_num = $_POST['createContNumber'];
		$query = "INSERT INTO users(username, password, email, first_name, last_name, gender,contact_number, shipping_address) VALUES ('$username', '$password', '$email', '$firstName', '$lastName', '$gender','$cont_num','$ship_add')";
		$result = mysqli_query($conn, $query);

		$session_query = "SELECT * FROM users WHERE username = '$username' && password = '$password'";
		$session_result = mysqli_query($conn, $session_query);

		foreach ($session_result as $key) {
				$_SESSION['user_id'] = $key['id'];
				$_SESSION['user_status'] = $key['user_status'];
				$_SESSION['current_user'] = $key['username'];
				$_SESSION['user_firstName'] = $key['first_name'];
				$_SESSION['user_lastName'] = $key['last_name'];
				$_SESSION['user_avatar'] = $key['user_avatar_path'];
				$_SESSION['user_gender'] = $key['gender'];
				$_SESSION['user_email'] = $key['email'];
				$_SESSION['user_address'] = $key['shipping_address'];
				$_SESSION['user_contact'] = $key['contact_number'];
				$_SESSION['date_created'] = $key['date_created'];
				$_SESSION['user_type'] = $key['role'];
		}
		$_SESSION['welcome_msg'] = "Registration Successful! Welcome, " . $_SESSION['current_user'] . "!";
		header("Location: ../profile.php");	
	}
	
?>