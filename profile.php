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
			<div class="container" id="invalid-credentials-msg">
				<?php echo $_SESSION['invalid_credentials_msg']; ?>
			</div>
		<?php } ?>
		<?php if(isset($_SESSION['welcome_msg'])){ ?>
			<div class="container" id="invalid-credentials-msg">
				<div class="alert alert-success">
					<?php echo $_SESSION['welcome_msg']; ?>
				</div>
			</div>
		<?php } ?>
		<?php if(isset($_SESSION['current_user'])) { ?>
		<div class="container profileCont">
			<div class="row">
				<div class="col-md-9 col-sm-12">
					<div class="media media-profile p-3">
						<?php 
							if(isset($_SESSION['user_id']) && $_SESSION['user_status'] == 1){
							$user_id = $_SESSION['user_id'];
							$user_details = "SELECT DISTINCT * FROM users u JOIN user_status us JOIN user_type ut WHERE u.id = '$user_id' && u.user_type = ut.id && u.user_status = us.id;";
							$result = mysqli_query($conn, $user_details);
							foreach ($result as $key) { 
						?>
						<img src="<?php echo $key['user_avatar_path'] ?>" alt="User Avatar" id="profile-user-img" class="img-fluid img-thumbnail m-2">
						<div class="media-body ml-2">
				    	<h2>Welcome, <?php echo ucfirst($_SESSION['current_user']) ?>!</h2>
				    	<p>Username: <?php echo $key['username']  ?></p>
				    	<p>User ID: <?php echo $key['id'] ?></p>
				    	<p>Email: <?php echo $key['email'] ?></p>
				    	<p>Gender: <?php echo ucfirst($key['gender']) ?></p>
						<p>Account Status: <?php echo ucfirst($key['status']) ?></p>
						<p>Full Name: <?php echo ucfirst($key['first_name']) ." " . ucfirst($key['last_name']) ?></p>	
					</div><!--//media-body-->
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
						     	</div>
						      	<div class="modal-footer">
								        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									</form>
						      	</div>
						    	</div>
							</div>
						</div><!--//modal for confirm deactivate-->
					<?php } //closing tag $result foreach ?>
					<?php } //closing tag if isset session current user foreach ?>
				</div> <!--/media-->
			</div>
				<div class="col-md-3 col-sm-12 p-2" id="profileControlPanel">
					<div class="container">
						<h5 id="controlPanelTitle"><i class="fas fa-tachometer-alt"></i> <?php echo ucfirst($_SESSION['current_user']) ?>'s Panel</h5>
						<div class="nav flex-column nav-pills my-2 p-2" id="v-pills-tab" role="tablist" aria-orientation="vertical">
							<a class="nav-link" href="home.php" role="tab">Home</a>
							<div class="dropdown-divider"></div>
							<a class="nav-link" id="v-pills-update-profile-tab" href="updateProfile.php" role="tab">Update Profile</a>
							<div class="dropdown-divider"></div>
							<?php if (isset($_SESSION['current_user']) && $_SESSION['user_type'] == 'user') { ?>
								<a class="nav-link" id="v-pills-settings-tab" data-toggle="modal" href="#transactionHistUserModal" role="tab">Transaction History</a>
							<?php } else { ?>
								<a class="nav-link" id="v-pills-settings-tab" data-toggle="modal" href="#allUserControlPanel" role="tab">All Users</a>
								<div class="dropdown-divider"></div>
								<a class="nav-link" id="v-pills-settings-tab" data-toggle="modal" href="#allProductsControlPanel" role="tab">All Products</a>
							<?php } ?>
							<div class="dropdown-divider"></div>
							<a class="nav-link" id="v-pills-messages-tab" data-toggle="modal" href="#validateDeactivateUser" role="tab">Deactivate Account</a>
						</div>
					</div>
				</div>
			</div><!--row-->
		</div><!--container-->

		<!-- Modal transactionHistUserModal-->
		<div class="modal fade" id="transactionHistUserModal" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
				  	<div class="modal-header">
					    <h5 class="modal-title" id="transactionHistUserModalTitle">Transaction History</h5>
					    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					      <span aria-hidden="true">&times;</span>
					    </button>
				  	</div>
				  	<div class="modal-body">
				  		<label for="datePurchHistUsers">Select Transaction Date:</label>
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
						<div id="resultCont" class="container m-2 p-2">
						</div>
				  	</div>
				  	<div class="modal-footer">
					    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				  	</div>
				</div>
			</div>
		</div><!-- //Modal transactionHistUserModal-->

		<!-- Modal allUserControlPanel-->
		<div class="modal fade" id="allUserControlPanel" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
				  	<div class="modal-header">
					    <h5 class="modal-title" id="adminControlPaneltitle"><?php echo ucfirst($_SESSION['current_user']) ?>'s Admin User Control Panel</h5>
					    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					      <span aria-hidden="true">&times;</span>
					    </button>
				  	</div>
				  	<div class="modal-body">
				  		<label for="allUsersDropdown">User Transaction History: </label>
					  		<select name="allUsers" id="allUsersDropdown" class="form-control">
								<?php  
									$users_query = "SELECT * FROM users WHERE user_type=2";
									$users_result = mysqli_query($conn, $users_query);
									foreach ($users_result as $usersKey) {
								?>
								<option value="<?php echo $usersKey['id'] ?>"><?php echo ucfirst($usersKey['username']) ?></option>
								<?php } ?>
							</select>
						<label for="showDateCont" id="purchDateProfAdmin" class="my-2">Purchase Date</label>
						<div id="showDateCont"></div>
						<div id="resultContAdmin" class="m-2 p-2">
						</div>
				  	</div>
				  	<div class="modal-footer">
					    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				  	</div>
				</div>
			</div>
		</div><!-- //Modal allUserControlPanel-->

		<!-- Modal allProductsControlPanel-->
		<div class="modal fade" id="allProductsControlPanel" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
				  	<div class="modal-header">
					    <h5 class="modal-title" id="adminControlPaneltitle"><?php echo ucfirst($_SESSION['current_user']) ?>'s Admin Product Control Panel</h5>
					    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					      <span aria-hidden="true">&times;</span>
					    </button>
				  	</div>
				  	<div class="modal-body">
				  		<label for="allProdDropdown">All Products</label>
							<select name="allProd" id="allProdDropdown" class="form-control">
								<?php 
									$prod_query = "SELECT * FROM products";
									$prod_result = mysqli_query($conn, $prod_query);
									foreach ($prod_result as $prodsKey) {
								?>
								<option value="<?php echo $prodsKey['id'] ?>"><?php echo $prodsKey['product_name'] ?></option>
								<?php } ?>
							</select>
						<div id="resultContProd" class="container m-2 p-2">
						</div>
				  	</div>
				  	<div class="modal-footer">
					    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				  	</div>
				</div>
			</div>
		</div><!-- //Modal allProductsControlPanel-->
		<?php 
			unset($_SESSION['invalid_credentials_msg']);
			unset($_SESSION['welcome_msg']);
		} else {
			unset($_SESSION['invalid_credentials_msg']);
			unset($_SESSION['welcome_msg']);
			$_SESSION['invalid_credentials_msg'] = "No user logged in. Please log in first.";
			header("Location: login.php");
		}	
		?>		
	</div><!-- main wrapper -->
	<?php include "partials/footer.php"; ?>
<?php include "partials/foot.php"; ?>