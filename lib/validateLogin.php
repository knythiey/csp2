<?php 
	
	require "connect.php";
	session_start();
	$loginUsername = $_POST['loginUsername'];
	$loginPassword = $_POST['loginPassword'];

	$login_query = "SELECT * FROM users u JOIN user_type ut WHERE username = '$loginUsername' && password = '$loginPassword' && u.user_type = ut.id ";
	$log_in_result = mysqli_query($conn, $login_query);

	if(mysqli_num_rows($log_in_result) == 0){
		$_SESSION['invalid_credentials_msg'] = "Invalid Credentials. Try Again!";
		header("Location: ../login.php");
	} else {
		foreach ($log_in_result as $key) {
			$_SESSION['current_user'] = $key['username'];
			// echo $_SESSION['current_user'] ."<br>";
			$_SESSION['user_type'] = $key['role'];
			// echo $_SESSION['user_type'] ."<br>";
		}
		$_SESSION['invalid_credentials_msg'] = "";
		header("Location: ../home.php");
	}

?>