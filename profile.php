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
	<div class="main-wrapper">
		<?php if(isset($_SESSION['invalid_credentials_msg'])){ ?>
			<div class="alert alert-warning">
				<p id="invalid-credentials-msg">
					<?php echo $_SESSION['invalid_credentials_msg']; ?>
				</p>
			</div>
		<?php } ?>
		<div class="container">
			<div class="media">
				<div class="media-body">
					<?php 
						if(isset($_SESSION['user_id']) && $_SESSION['user_status'] == 1){
						$user_id = $_SESSION['user_id'];
						$user_details = "SELECT DISTINCT * FROM users u JOIN user_status us JOIN user_type ut WHERE u.id = '$user_id' && u.user_type = ut.id && u.user_status = us.id;";
						$result = mysqli_query($conn, $user_details);
						foreach ($result as $key) { 
					?>
			    	<h2>Welcome, <?php echo ucfirst($_SESSION['current_user']) ?>!</h2>
			    	<p>Username: <?php echo $key['username']  ?></p>
			    	<p>User ID: <?php echo $key['id'] ?></p>
			    	<p>Email: <?php echo $key['email'] ?></p>
			    	<p>Full Name: <?php echo ucfirst($key['first_name']) ." " . ucfirst($key['last_name']) ?></p>
			    	<p>Gender: <?php echo $key['gender'] ?></p>
					<p>Account Status: <?php echo $key['status'] ?></p>
					
					<a href="updateProfile.php" class="btn btn-info">Update User Profile</a>
					<a href="#validateDeactivateUser" data-toggle="modal" data-target="#validateDeactivateUser" class="btn btn-warning" id="deactBtn">Deactivate User</a>

					<!-- Modal Deactivate User Confirmation -->
					<div class="modal fade" id="validateDeactivateUser" tabindex="-1" role="dialog">
					  <div class="modal-dialog modal-dialog-centered" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="validateDeactivateUserTitle">Confirm Deactivation of <?php echo ucfirst($key['username']) ?> </h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					        <form action="lib/validateDeactivateUser.php" method="POST">
								<div class="form-group">
									<label for="username">Username: </label>
									<input type="text" id="deactUsername" name="deactUsername" maxlength="32" class="form-control" placeholder="Enter username" required>
								</div>
								<div class="form-group">
									<label for="password">Password: </label>
									<input type="password" id="deactPassword" name="deactPassword" class="form-control" placeholder="Enter current password" required>
								</div>
								<div class="form-group">
									<label for="email">Email: </label>
									<input type="email" id="deactEmail" name="deactEmail" class="form-control" placeholder="Enter email" required>
								</div>
								<button class="btn btn-danger" id="confirmDeactUser" type="submit">Confirm Deactivate</button>
						        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							</form>
					      </div>
					      <div class="modal-footer">
					      </div>
					    </div>
					  </div>
					</div><!--//modal for confirm deactivate-->
					<?php } //closing tag $result foreach ?>
				</div><!--//media-body-->
				
				<img src="assets/img/user_avatar/default_avatar_male.jpg" alt="User Avatar" id="profile-user-img" class="img-fluid img-thumbnail m-2">
			</div> <!--/media-->
			
		</div>
		<div class="row">
			<div class="col-md-7 left-side-profile">
				<?php if($_SESSION['user_type'] == 'admin') {?>
				<h4><i class="fas fa-tachometer-alt"></i> <?php echo $_SESSION['current_user'] ?> Admin Panel</h4>
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
				<h4 class="m-2 p-2"><i class="fas fa-tachometer-alt"></i> <?php echo ucfirst($_SESSION['current_user']) ?>'s Panel</h4>
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
		</div>
			<?php 
				unset($_SESSION['invalid_credentials_msg']);
				
				} //closing tag of if statment 
				else {
				$_SESSION['invalid_credentials_msg'] = "No user logged in. Please log in first.";
				header("Location: login.php");	
				}//closing tag else	
			?>		
	</div><!-- main wrapper -->
	<?php include "partials/footer.php"; ?>
<?php include "partials/foot.php"; ?>