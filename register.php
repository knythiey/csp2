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
	<div class="main-wrapper">
		
		<h1>Register Page</h1>
		<div class="container register-form">
			<form action="createUser.php" method="POST">

				<div class="form-group">
					<label for="username">Username:* </label><span id="usernameAvail"></span>
					<input type="text" class="form-control" name="createUsername" id="createUsername" placeholder="Enter Username" required>
				</div>

				<div class="form-group">
					<label for="password">Password:* </label><span id="passwordLength"></span>
					<input type="password" class="form-control" name="createPassword" id="createPassword" placeholder="Enter Password" required>
				</div>

				<div class="form-group">
					<label for="confirmPassword">Confirm Password:* </label><span id="passwordMatch"></span>
					<input type="password" class="form-control" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password" required>
				</div>

				<div class="form-group">
					<label for="email">Email:* </label><span id="emailAvail"></span>
					<input type="email" class="form-control" name="userEmail" id="userEmail" placeholder="Enter email" required>
				</div>

				<div class="form-group">
					<label for="firstName">First Name:* </label>
					<input type="text" class="form-control" name="firstName" id="firstName" placeholder="Enter your first name" required>
				</div>

				<div class="form-group">
					<label for="lastName">Last Name:* </label>
					<input type="text" class="form-control" name="lastName" id="lastName" placeholder="Enter your last name" required>
				</div>

				<div class="form-group">
					<label for="gender">Gender:* </label>
					<input type="radio" name="gender" value="male"> Male
					<input type="radio" name="gender" value="female"> Female
				</div>

				<?php if(isset($_SESSION['current_user']) && $_SESSION['user_type'] == "admin"){ ?>
						<div class="form-group">
							<label for="userType">User Type: (Admin Account Only)</label>
							<select name="userType" id="userType">
								<option value="admin">Admin</option>
								<option value="user">User</option>
							</select>
						</div>
				<?php } ?>
			</form>
		</div><!--container-->
	
	</div>
	<?php include "partials/footer.php"; ?>
<?php include "partials/foot.php"; ?>