<?php include "partials/header.php"; ?>
	
	<?php 
		session_start();
		// if(isset($_SESSION['current_user'])){
		// 	session_unset();
		// 	session_destroy();
		// }
		// $_SESSION['current_user'] = "admin";
	?>
	<?php 
	function getTitle(){
		echo "Index Page";
	} 
?>
</head>
<body>
	<?php include "partials/navbar.php"; ?>
	<div class="main-wrapper">
		
		<h1> Index Page</h1>
	
	</div>
	<?php include "partials/footer.php"; ?>
<?php include "partials/foot.php"; ?>