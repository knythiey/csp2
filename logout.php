<?php include "partials/header.php"; ?>
	<?php 
		function getTitle(){
			echo "Logout Page";
		}

		if(isset($_SESSION['current_user']) && !empty($_SESSION['current_user'])){
			session_unset();
			session_destroy(); 
		}
	?>
</head>
<body>
	<?php include "partials/navbar.php"; ?>
	<div class="main-wrapper">
		
		<h1> Logout Page</h1>

		<?php
		if(!isset($_SESSION['current_user']))
			echo "There is no current user.";
		else {
			echo $_SESSION['current_user']; 
			}
		?> 
	
	</div>
	<?php include "partials/footer.php"; ?>
<?php include "partials/foot.php"; ?>