<?php 
	session_start();
	require "connect.php";
	$_SESSION['category'] = 6;
	$_SESSION['category_title'] = "Nindtendo Switch Accessories Category";
	header("location: ../home.php");
?>