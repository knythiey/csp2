<?php 
	$host = "localhost";
	$serverUser = "root";
	$serverPw = "";
	$dbname = "csp2";

	$conn = mysqli_connect($host, $serverUser, $serverPw, $dbname);

	if(!$conn){
		die('connection failed' . mysqli_error($conn));
	}

?>