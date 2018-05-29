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
	<div class="main-wrapper container" style="text-align: center;">
		<?php if(isset($_SESSION['invalid_credentials_msg'])){
							echo $_SESSION['invalid_credentials_msg'];
						} 
		?>
		<h1> Profile Page</h1>
		<h2 style="text-align: center;">Welcome, <?php echo ucfirst($_SESSION['current_user']) ?>!</h2>
		<div class="row">
			<div class="col-md-7 left-side-profile">
				<?php if($_SESSION['user_type'] == 'admin') {?>
				<h4><?php echo $_SESSION['current_user'] ?> Admin Panel</h4>
				<div class="row">
					<div class="col-md-3">
						<label for="allUsersDropdown">User Transaction History: </label>
						<label for="showDateCont" id="purchDateProfAdmin">Purchase Date</label>
						<label for="allProdDropdown">Select Product: </label>
					</div>
					<div class="col-md-8">
						<select name="allUsers" id="allUsersDropdown" class="form-control">
							<?php  
								$users_query = "SELECT * FROM users WHERE user_type=2";
								$users_result = mysqli_query($conn, $users_query);
								foreach ($users_result as $usersKey) {
							?>
								<option value="<?php echo $usersKey['id'] ?>"><?php echo $usersKey['username'] ?></option>
							<?php } ?>
						</select>
						<div id="showDateCont"></div>
						<select name="allProd" id="allProdDropdown" class="form-control">
							<?php 
								$prod_query = "SELECT * FROM products";
								$prod_result = mysqli_query($conn, $prod_query);
								foreach ($prod_result as $prodsKey) {
							?>
							<option value="<?php echo $prodsKey['id'] ?>"><?php echo $prodsKey['product_name'] ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				<?php } //if admin 
						if($_SESSION['user_type'] == 'user'){
				?>
				<h4><?php echo ucfirst($_SESSION['current_user']) ?>'s Panel</h4>
				<div class="row">
					<div class="col-md-6">
						<h3>Transaction History</h3>
					</div>
					<div class="col-md-6">
						<select name="datePurchHistUsers" id="datePurchHistUsers" class="form-control">
							<?php 
								$user_id = $_SESSION['user_id'];
								$date_purch_query = "SELECT * FROM orders WHERE user_id = '$user_id'";
								$date_purch_result =mysqli_query($conn, $date_purch_query);
								foreach ($date_purch_result as $ordKey) {
							?>
							<option value="<?php echo $ordKey['id'] ?>"><?php echo $ordKey['date_purchased'] ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				<?php }//if user_type == user ?>
				<div id="resultCont" class="container">
				</div>
			</div>
			<div class="col-md-5 right-side-profile">
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