<?php
	session_start();
	require "connect.php";
	$user = $_SESSION['current_user'];
	$password = sha1($_POST['deleteProdPass']);

	$confirm_pass = "SELECT * FROM users WHERE username = '$user' && password = '$password'";
	$result = mysqli_query($conn, $confirm_pass);

	if(mysqli_num_rows($result) == 0) {
		$prod_id = $_SESSION['prod_id'];
		echo $prod_id . "<br>";
		$_SESSION['deleteDbConfirm'] = "Attempt to DELETE from Database failed";
		header("Location: ../product.php?id=$prod_id");
	} else {
		$prod_id = $_SESSION['prod_id'];	
		echo $prod_id . "<br>";
		$del_query = "DELETE FROM products WHERE id = '$prod_id'";
		$del_result = mysqli_query($conn, $del_query);
		$_SESSION['deleteDbConfirm'] = "Data successfully DELETED from " . $dbname . " database.";
		header("Location: ../home.php");
	}
?>