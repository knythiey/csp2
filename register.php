<?php include "partials/header.php"; ?>
	
	<?php 
		session_start();
	?>
	<?php 
	function getTitle(){
		echo "Register Page";
	} 
?>
</head>
<body>
	<?php include "partials/navbar.php"; ?>
	<div class="main-wrapper login-bg">
		
		<div class="container register-form">
			<form action="lib/createUser.php" method="POST">
				<div class="login-header">
					<h2>Register</h2>
				</div>

				<div class="form-group">
					<label for="username">Username:* </label><small id="usernameAvail"> (min.5 max.32 characters)</small>
					<input type="text" class="form-control" name="createUsername" id="createUsername" placeholder="Enter Username" maxlength="32" required>
				</div>

				<div class="form-group">
					<label for="password">Password:* </label><small id="passwordLength"></small>
					<input type="password" class="form-control" name="createPassword" id="createPassword" placeholder="Enter Password" required>
				</div>

				<div class="form-group">
					<label for="confirmPassword">Confirm Password:* </label><small id="passwordMatch"></small>
					<input type="password" class="form-control" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password" required>
				</div>

				<div class="form-group">
					<label for="email">Email:* </label><small id="emailAvail">Enter a valid Email Address</small>
					<input type="email" class="form-control" name="userEmail" id="userEmail" placeholder="Enter email" required>
				</div>

				<div class="form-group">
					<label for="firstName">First Name:* </label><small id="validFirstname"></small>
					<input type="text" class="form-control" name="firstName" id="firstName" placeholder="Enter your first name" required>
				</div>

				<div class="form-group">
					<label for="lastName">Last Name:* </label><small id="validLastname"></small>
					<input type="text" class="form-control" name="lastName" id="lastName" placeholder="Enter your last name" required>
				</div>

				<div class="form-group">
					<label for="gender">Gender:* </label>
					Male <input type="radio" name="gender" value="male" class="radioGender" required>
					Female <input type="radio" name="gender" value="female" class="radioGender">
				</div>

				<div class="form-group">
						<label for="shipping Address">Shipping Address: </label>
						<input type="text" class="form-control" name="createShipAdd" id="createShipAdd" placeholder="Enter Shipping Address" required>
					</div>

				<div class="form-group">
					<label for="contact number">Contact Number: </label>
					<input type="number" class="form-control" name="createContNumber" id="createContNumber" placeholder="Enter Contact Number" required>
				</div>

				<?php if(isset($_SESSION['current_user']) && $_SESSION['user_type'] == "admin"){ ?>
						<div class="form-group">
							<label for="userType">User Type: (Admin Account Only)</label>
							<select name="userType" id="userType">
								<option value="1" required>admin</option>
								<option value="2">user</option>
							</select>
						</div>
				<?php } ?>

				<button class="btn btn-primary" type="submit" id="registerbtn">Register</button>
			</form>
		</div><!--container-->
	
	</div>
	<?php include "partials/footer.php"; ?>
<?php include "partials/foot.php"; ?>