<div id="topNavbar" class="clearfix">
	<ul class="topNavbar-left d-none d-sm-block">
		<li class="social-media-topnavbar"><a href="https://facebook.com/knythiey"><i class="fab fa-facebook-square"></i></a></li>
		<li class="social-media-topnavbar"><a href="https://instragram.com/knythiey"><i class="fab fa-instagram"></i></a></li>
		<li class="social-media-topnavbar"><a href="https://github.com/knythiey"><i class="fab fa-github-square"></i></a></li>
		<li class="social-media-topnavbar"><a href="mailto:kynt.sample@gmail.com"><i class="fas fa-at"></i></a></li>
	</ul>
	<ul class="topNavbar-right">
		<?php if(!isset($_SESSION['current_user'])){ ?>
			<li><a href="login.php">Log-in <i class="fas fa-sign-in-alt"></i></a></li>
			<li>|</li>
			<li><a href="register.php">Register <i class="fas fa-user-plus"></i></a></li>
			<li>|</li>
	    <?php } ?>

		<?php if(isset($_SESSION['current_user']) && $_SESSION['user_status'] == 1){ ?>
			<li>
				<a href="profile.php"> 
					<?php 
						if(isset($_SESSION['current_user'])){
							echo "Welcome, " . ucfirst($_SESSION['current_user']) . "! ";
						}
					?>
					<i class="fas fa-user-tie"></i>
				</a>
			</li>
			<li><a href="logout.php">Log-out <i class="fas fa-sign-out-alt"></i></a></li>
		<?php } ?>
	</ul>
</div>
<nav class="navbar navbar-expand-lg py-5">
	<a class="navbar-brand" href="index.php"><img src="assets/img/logocsp2.png" alt="brand logo" id="brandlogo"> <span class="brandname">Game<button class="btn btn-dark brandnamebtn"><span class="brandnamebtntext">HUB</span></button></span></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon">
			<div class="dropdown-divider"></div>
	    	<div class="dropdown-divider"></div>
	    	<div class="dropdown-divider"></div>
		</span>
  	</button>
    <!-- <form class="form-inline my-2 my-lg-0">
      	<input class="form-control mr-sm-1" type="search" id="searchBarInput" placeholder="Search">
    </form> -->

	<div class="collapse navbar-collapse float-right" id="navbarSupportedContent">
	    <ul class="navbar-nav ml-auto">

	      	<li class="nav-item">
	        	<a class="nav-link" href="home.php"><i class="fas fa-home"></i> Home </a>
	      	</li>
	      	<?php if(isset($_SESSION['user_type']) && $_SESSION['user_type'] == "admin"){  ?>
	     		<li class="nav-item dropdown">
			        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			        | <i class="fas fa-tachometer-alt"></i> Admin 
			        </a>
			        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
			          	<a class="dropdown-item" href="register.php">REGISTER</a>
			          	<a class="dropdown-item" href="registerProduct.php">ADD ITEM</a>
			        	<div class="dropdown-divider"></div>
			          	<a class="dropdown-item" href="profile.php">CONTROL PANEL</a>
			        </div>
	      		</li>
	     	 <?php } ?>
	     	<?php if(isset($_SESSION['current_user']) && $_SESSION['user_status'] == 1 && $_SESSION['user_type'] == "user"){ ?>
		     	<li class="nav-item">
		        	<a class="nav-link" href="cart.php">
		        		| <i class="fas fa-shopping-cart"></i> My Cart
		        			(
		        			<span id="itemCount">
		        			<?php 
		        				if(isset($_SESSION['itemCount'])){
		        					echo $_SESSION['itemCount'];
		        				} else {
		        					echo " 0 ";
		        				}
		        			?>
		        			</span>
		        			)
		        	</a>
		     	</li>
	     	<?php } ?>

	     	<li class="nav-item">
	        	<a class="nav-link" href="#">| About</a>
	     	</li>

	    </ul>
	</div>
</nav>