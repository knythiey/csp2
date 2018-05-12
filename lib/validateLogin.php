<?php 
	
	require "connect.php";
	session_start();
	$loginUsername = $_POST['loginUsername'];
	$loginPassword = sha1($_POST['loginPassword']);

	$id_query = "SELECT * FROM users WHERE username = '$loginUsername' && password = '$loginPassword'";
	$id_result = mysqli_query($conn, $id_query);
	
	$login_query = "SELECT * FROM users u JOIN user_type ut WHERE username = '$loginUsername' && password = '$loginPassword' && u.user_type = ut.id ";
	$log_in_result = mysqli_query($conn, $login_query);


	if(mysqli_num_rows($log_in_result) == 0){
		$_SESSION['invalid_credentials_msg'] = "Invalid Credentials. Try Again!";
		header("Location: ../login.php");
	} else {
		
		foreach ($id_result as $key) {
			$_SESSION['user_id'] = $key['id'];
		}

		foreach ($log_in_result as $key) {
			$_SESSION['current_user'] = $key['username'];
			$_SESSION['user_firstName'] = $key['first_name'];
			$_SESSION['user_lastName'] = $key['last_name'];
			$_SESSION['user_status'] = $key['user_status'];
			$_SESSION['user_avatar'] = $key['user_avatar_path'];
			$_SESSION['user_gender'] = $key['gender'];
			$_SESSION['user_email'] = $key['email'];
			$_SESSION['user_type'] = $key['role'];
		}
		$_SESSION['invalid_credentials_msg'] = "";
		header("Location: ../profile.php");
	}

?>