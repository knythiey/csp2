<?php include "partials/header.php"; ?>
	
	<?php session_start(); ?>
	<?php 
	function getTitle(){
		echo "Login Page";
	} 
?>
</head>
<body>
	<?php include "partials/navbar.php"; ?>
	<div class="main-wrapper">
		
		<h1> Login Page</h1>

		<div class="container">
			<form action="lib/validateLogin.php" method="POST">
				<div class="form-group">
					<label for="username">Username: </label>
					<input type="text" name="loginUsername" id="loginUsername" placeholder="Enter Username" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="username">Password: </label>
					<input type="password" name="loginPassword" id="loginPassword" placeholder="Enter Password" class="form-control" required>
				</div>
				<button type="submit" class="btn btn-primary">Log In</button>
			</form>
		</div>
	
	</div>
	<?php include "partials/footer.php"; ?>
<?php include "partials/foot.php"; ?>