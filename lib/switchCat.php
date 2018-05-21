<?php 
	session_start();
	require "connect.php";
	$_SESSION['category'] = 3;
	$_SESSION['category_title'] = "Nintendo Switch Category";
	header("location: ../home.php");
?>