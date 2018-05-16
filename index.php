<?php include "partials/header.php"; ?>
	
	<?php 
		session_start();
	function getTitle(){
		echo "Index Page";
	} 
	?>
</head>
<body>
	<?php include "partials/navbar.php"; ?>
	<div class="main-wrapper">
		
		<h1>Index Page</h1>
		<p>
			<?php 
				if(isset($_SESSION['logoutMsg'])){
					echo $_SESSION['logoutMsg'];
					session_unset();
					session_destroy();
				} else {
					echo "You seem lonely. Register and Login to enjoy my site!";
				}
			?>
		</p>
	
	</div>
	<?php include "partials/footer.php"; ?>
<?php include "partials/foot.php"; ?>