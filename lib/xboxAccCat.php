<?php 
	session_start();
	require "connect.php";
	$_SESSION['category'] = 5;
	$_SESSION['category_title'] = "XBOX Accessories Category";
	header("location: ../home.php");
?>
