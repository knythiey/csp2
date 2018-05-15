<?php 
	require "connect.php";
	session_start();

	if(isset($_POST['deactUsername']) && !empty($_POST['deactUsername'])){
		$deactUname = $_POST['deactUsername'];
		$deactPass= sha1($_POST['deactPassword']);
		$deactEmail= $_POST['deactEmail'];
		$id = $_SESSION['user_id'];

		// echo $deactUname;
		// echo $deactPass;
		// echo $deactEmail;
		// echo $_SESSION['user_status'];
		// echo "<br>";
		$query = "SELECT * FROM users WHERE id = '$id'";
		$result = mysqli_query($conn, $query);
		foreach ($result as $key) {
			if($deactUname == $key['username'] && $deactPass == $key['password'] && $deactEmail == $key['email']){
				$update_query = "UPDATE users SET user_status = 2 WHERE username = '$deactUname' && password = '$deactPass' && email = '$deactEmail'";
				$update_result = mysqli_query($conn, $update_query);

				$query2 = "SELECT * FROM users WHERE id = '$id'";
				$result2 = mysqli_query($conn, $query2);
				$_SESSION['deactNotification'] = "Account has deactivated. Login to activate your account again.";
				
				foreach ($result2 as $key) {
					$_SESSION['user_status'] = $key['user_status'];
				}
				$_SESSION['invalid_credentials_msg'] = "";
				header("Location: ../deactivatedUser.php");
			} else {
				$_SESSION['invalid_credentials_msg'] = "Invalid Credentials. Try Again!";
				header("Location: ../profile.php");
			}
		}
		
	};
?>

