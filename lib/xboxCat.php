<?php 
	session_start();
	require "connect.php";
	$_SESSION['category'] = 2;
	$_SESSION['category_title'] = "Xbox Category";
	header("location: ../home.php");
?>