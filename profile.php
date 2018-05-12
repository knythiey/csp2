<?php include "partials/header.php"; ?>
	
	<?php 
		session_start(); 
		function getTitle(){
			echo "Profile Page";
		}

		require "lib/connect.php";
		$user_id = $_SESSION['user_id'];
		$user_details = "SELECT DISTINCT * FROM users u JOIN user_status us JOIN user_type ut WHERE u.id = '$user_id' && u.user_type = ut.id && u.user_status = us.id;";
		$result = mysqli_query($conn, $user_details);
		?>
		
</head>
<body>
	<?php include "partials/navbar.php"; ?>
	<div class="main-wrapper" style="text-align: center;">
		
		<h1> Profile Page</h1>
		<h2 style="text-align: center;">Welcome, <?php echo $_SESSION['current_user'] ?>!</h2>
		<?php foreach ($result as $key) { ?>
		<img src="assets/img/user_avatar/default_avatar_male.jpg" alt="User Avatar" style="width: 200px; height: 200px;border-radius: 10px;">

		<table style="margin: 0 auto; text-align: left;">
			<tbody>
					<tr>
						<td>Username</td>
						<td><?php echo $key['username']  ?></td>
					</tr>
					<tr>
						<td>Password</td>
						<td><?php echo $key['password']  ?></td>
					</tr>
					<tr>
						<td>Email</td>
						<td><?php echo $key['email']  ?></td>
					</tr>
					<tr>
						<td>First Name</td>
						<td><?php echo $key['first_name'] ?></td>
					</tr>
					<tr>
						<td>Last Name</td>
						<td><?php echo $key['last_name'] ?></td>
					</tr>
					<tr>
						<td>Gender</td>
						<td><?php echo $key['gender'] ?></td>
					</tr>
					<tr>
						<td>Date Created</td>
						<td><?php echo $key['date_created'] ?></td>
					</tr>
					<tr>
						<td>User role</td>
						<td><?php echo $key['role'] ?></td>
					</tr>
					<tr>
						<td>User status</td>
						<td><?php echo $key['status'] ?></td>
					</tr>
					<tr>
						<td>User Avatar</td>
						<td><?php echo $key['user_avatar_path'] ?></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
			<button class="btn btn-warning"><a href="updateProfile.php">Update User Profile</a></button>

	
	</div>
	<?php include "partials/footer.php"; ?>
<?php include "partials/foot.php"; ?>