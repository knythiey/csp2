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
		<?php 
			if(isset($_SESSION['invalid_credentials_msg'])){ ?>
			<h5 class="invalid-credentials-msg"><?php echo $_SESSION['invalid_credentials_msg']; ?></h5>
		<?php } ?>
		<div class="container">
			<div class="login-form-container">
				<div class="login-header">
					<h2>Login</h2>
				</div>
				<form action="lib/validateLogin.php" method="POST" class="clearfix">
					<div class="form-username m-2">
						<label for="username" class="form-login-label label-control">Username</label>
						<span><i class="fas fa-user"></i></span> <input type="text" name="loginUsername" id="loginUsername" placeholder="Enter Username" class="form-login-input form-control" required>
					</div>
					<hr class="login-hr">
					<div class="form-password m-2">
						<label for="password" class="form-login-label label-control">Password</label>
						<span><i class="fas fa-lock"></i></span> <input type="password" name="loginPassword" id="loginPassword" placeholder="Enter Password" class="form-login-input form-control" required>
					</div>
					<hr class="login-hr">
					<div class="row">
						<div class="col-md-6 col-sm-12 forgotPassword">
							<a href="index.php"> Back to Home</a>
						</div>
						<div class="col-md-6 col-sm-12 forgotPassword">
							<a href="#">Forgot Password?</a>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-6 col-sm-6">
							<button type="submit" class="btn btn-primary login-form-btn float-left">Log In</button>
						</div>
						<div class="col-md-6 col-sm-6">
							<a href="register.php"class="btn btn-primary login-form-btn float-right" id="modalBtn">Register</a>
						</div>
					</div>
				</form>

				<p class="noAccountRegister">No account yet? <a href="register.php">Register now!</a></p>
			</div>
		</div>
	<?php 
		$_SESSION['invalid_credentials_msg'] = "";	
	?>
	</div>
	<?php include "partials/footer.php"; ?>
<?php include "partials/foot.php"; ?>