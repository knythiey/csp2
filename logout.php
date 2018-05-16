<?php include "partials/header.php"; ?>
	<?php 
		function getTitle(){
			echo "Logout Page";
		}
		session_start();
		session_unset();
		session_destroy();
		session_start();
		$_SESSION['logoutMsg'] =  "You just logged out. Login to process any activity."; 
		header("Location: index.php");
	?>