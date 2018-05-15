<?php include "partials/header.php"; ?>
	
	<?php 
		session_start(); 
		function getTitle(){
			echo "Inactive User Page";
		}

		require "lib/connect.php";
	?>
		
</head>
<body>
	<?php include "partials/navbar.php" ?>
	<div class="main-wrapper" style="text-align: center;">
		
		<h1> Inactive User Page</h1>
		<p>
			<?php 
				if(isset($_SESSION['deactNotification'])){
					echo $_SESSION['deactNotification'];
				} else {
					echo "This account is inactive. Login to activate your account.";
				}
			?>
		</p>
		<?php 
			$_SESSION['deactNotification'] = ""; 
			session_unset();
			session_destroy();
		?>
		<a href="login.php"><button class="btn btn-primary">Log in</button></a>

	</div>
	<?php include "partials/footer.php"; ?>
<?php include "partials/foot.php"; ?>