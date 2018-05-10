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
					<label for="username">Username:* </label>
					<input type="text" class="form-control" name="createUsername" id="createUsername" placeholder="Enter Username" required>
				</div>
				<div class="form-group">
					<label for="password">Password:* </label>
					<input type="password" class="form-control" name="createPassword" id="createPassword" placeholder="Enter Password" required>
				</div>
				<div class="form-group">
					<label for="email">Email:* </label>
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
				<!-- <div class="form-group"> -->
					<label for="birthdate">Enter Birthday:* </label>
					<select name="birthyear" id="birthyear">
						<option value=""></option>
					</select>
					<input type="number" name="birthmonth" min="1" max="12" value="1">Month
					<input type="number" name="birthday" min="1" max="31" value="1">Day
				<!-- </div> -->
			</form>
		</div><!--container-->
	
	</div>
	<?php include "partials/footer.php"; ?>
<?php include "partials/foot.php"; ?>