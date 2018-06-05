<?php include "partials/header.php"; ?>
	
	<?php 
		session_start();
		function getTitle(){
			echo "Login Page";
		} 
	?>
</head>
<body>
	<?php include "partials/navbar.php"; ?>
	<div class="main-wrapper login-bg">
		<!-- <div class="container login-bg"> -->
			<p>
				<?php 
					if(isset($_SESSION['invalid_credentials_msg'])){
						echo $_SESSION['invalid_credentials_msg'];
					}
				?>
			</p>
			<div class="container login-form-container">
				<div class="login-header">
					<h2>Login</h2>
				</div>
				<form action="lib/validateLogin.php" method="POST">
					<div class="form-username">
						<label for="username" class="form-login-label">Username</label>
						<span><i class="fas fa-user"></i></span> <input type="text" name="loginUsername" id="loginUsername" placeholder="Enter Username" class="form-login-input" required>
					</div>
					<hr>
					<div class="form-password">
						<label for="password" class="form-login-label">Password</label>
						<span><i class="fas fa-lock"></i></span> <input type="password" name="loginPassword" id="loginPassword" placeholder="Enter Password" class="form-login-input" required>
					</div>
					<hr>
					<div class="forgotPassword clearfix">
						<a href="index.php" class="float-left"> Back to Home</a>
						<a href="#" class="float-right">Forgot Password?</a>
					</div>
						
					<button type="submit" class="btn btn-primary login-form-btn float-left">Log In</button>
					<a href="register.php"class="btn btn-primary login-signup-btn float-right" id="modalBtn">Register</a>
				</form>

				<p>No account yet? Register now!</p>
			</div>
		<!-- </div> -->

			<!-- <form action="lib/validateLogin.php" method="POST">
				<div class="form-group">
					<label for="username">Username: </label>
					<input type="text" name="loginUsername" id="loginUsername" placeholder="Enter Username" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="username">Password: </label>
					<input type="password" name="loginPassword" id="loginPassword" placeholder="Enter Password" class="form-control" required>
				</div>
				
			</form> -->
	<?php 
		$_SESSION['invalid_credentials_msg'] = "";	
	?>
	</div>
	<?php include "partials/footer.php"; ?>
<?php include "partials/foot.php"; ?>