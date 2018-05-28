<?php include "partials/header.php"; ?>
	
	<?php 
		session_start(); 
		function getTitle(){
			echo "Profile Page";
		}
		require "lib/connect.php";
	?>
		
</head>
<body>
	<?php include "partials/navbar.php"; ?>
	<div class="main-wrapper" style="text-align: center;">
		<?php if(isset($_SESSION['invalid_credentials_msg'])){
							echo $_SESSION['invalid_credentials_msg'];
						} 
		?>
		<h1> Profile Page</h1>
		<h2 style="text-align: center;">Welcome, <?php echo $_SESSION['current_user'] ?>!</h2>
		<div class="row">
			<div class="col-md-5">
				<div class="row">
					<div class="col-md-6">
						<label for="allUsersDropdown">Select User</label>
					</div>
					<div class="col-md-6">
						<select name="allUsers" id="allUsersDropdown" class="form-control">
							<?php  
								$query_users = "SELECT * FROM users";
								$query_result = mysqli_query($conn, $query_users);
								foreach ($query_result as $usersKey) {
							?>
								<option value="<?php echo $usersKey['id'] ?>"><?php echo $usersKey['username'] ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
			</div>
			<div class="col-md-7">
				<?php 
					if(isset($_SESSION['user_id']) && $_SESSION['user_status'] == 1){
					$user_id = $_SESSION['user_id'];
					$user_details = "SELECT DISTINCT * FROM users u JOIN user_status us JOIN user_type ut WHERE u.id = '$user_id' && u.user_type = ut.id && u.user_status = us.id;";
					$result = mysqli_query($conn, $user_details);
					foreach ($result as $key) { 
				?>
				<img src="assets/img/user_avatar/default_avatar_male.jpg" alt="User Avatar" style="width: 200px; height: 200px;border-radius: 10px;">

				<table style="margin: 0 auto; text-align: left;">
					<tbody>
							<tr>
								<td>Username : </td>
								<td><?php echo $key['username']  ?></td>
							</tr>
							<tr>
								<td>User ID : </td>
								<td><?php echo $key['id']  ?></td>
							</tr>
							<tr>
								<td>Password :</td>
								<td><?php echo $key['password']  ?></td>
							</tr>
							<tr>
								<td>Email : </td>
								<td><?php echo $key['email']  ?></td>
							</tr>
							<tr>
								<td>First Name : </td>
								<td><?php echo $key['first_name'] ?></td>
							</tr>
							<tr>
								<td>Last Name : </td>
								<td><?php echo $key['last_name'] ?></td>
							</tr>
							<tr>
								<td>Gender : </td>
								<td><?php echo $key['gender'] ?></td>
							</tr>
							<tr>
								<td>Date Created : </td>
								<td><?php echo $key['date_created'] ?></td>
							</tr>
							<tr>
								<td>User role : </td>
								<td><?php echo $key['role'] ?></td>
							</tr>
							<tr>
								<td>User status : </td>
								<td><?php echo $key['status'] ?></td>
							</tr>
							<tr>
								<td>User Avatar :</td>
								<td><?php echo $key['user_avatar_path'] ?></td>
							</tr>
					</tbody>
				</table>
					<a href="updateProfile.php"><button class="btn btn-info">Update User Profile</button></a>
					<div class="container" id="validateDeactivateUser" style="width: 50%; margin: 0 auto; text-align: left;">
						<button class="btn btn-danger" id="closeDeact">X</button>
						<form action="lib/validateDeactivateUser.php" method="POST">
							<div class="form-group">
								<label for="username">Username: </label>
								<input type="text" id="deactUsername" name="deactUsername" maxlength="32" class="form-control" required>
							</div>
							<div class="form-group">
								<label for="password">Password: </label>
								<input type="password" id="deactPassword" name="deactPassword" class="form-control" required>
							</div>
							<div class="form-group">
								<label for="email">Email: </label>
								<input type="email" id="deactEmail" name="deactEmail" class="form-control" required>
							</div>
							<button class="btn btn-danger" id="confirmDeactUser" type="submit">Confirm Deactivate</button>
						</form>
					</div>
					<a href="#validateDeactivateUser"><button class="btn btn-warning" id="deactBtn">Deactivate User</button></a>
			</div>
		</div>
			<?php 
				$_SESSION['invalid_credentials_msg'] = "";
				} //closing tag for each
				} //closing tag of if statment 
				else {
				$_SESSION['invalid_credentials_msg'] = "No user logged in. Please log in first.";
				header("Location: login.php");	
				}//closing tag else	
			?>		
	</div><!-- main wrapper -->
	<?php include "partials/footer.php"; ?>
<?php include "partials/foot.php"; ?>