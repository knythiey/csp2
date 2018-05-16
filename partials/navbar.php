<?php if(isset($_SESSION['current_user'])){
	echo $_SESSION['current_user'];
	echo $_SESSION['user_type'];
	echo $_SESSION['user_status'];
	} else {
		echo "No current user.";
	}
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand" href="index.php">Kynt</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
  	</button>
    <form class="form-inline my-2 my-lg-0">
      	<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      	<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>

	<div class="collapse navbar-collapse float-right" id="navbarSupportedContent">
	    <ul class="navbar-nav ml-auto">

	      	<li class="nav-item">
	        	<a class="nav-link" href="home.php">HOME</a>
	      	</li>

	     	<li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          CATEGORIES
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          	<a class="dropdown-item" href="#">PS4</a>
		          	<a class="dropdown-item" href="#">XBOXONE</a>
		          	<a class="dropdown-item" href="#">NINTENDO SWITCH</a>
		        	<div class="dropdown-divider"></div>
		          	<a class="dropdown-item" href="#">PS4 ACCESORIES</a>
		          	<a class="dropdown-item" href="#">XBOXONE ACCESORIES</a>
		          	<a class="dropdown-item" href="#">SWITCH ACCESORIES</a>
		        </div>
	      	</li>

	     	<?php if(isset($_SESSION['current_user']) && $_SESSION['user_status'] == 1){ ?>
		     	<li class="nav-item">
		        	<a class="nav-link" href="cart.php">MY CART</a>
		     	</li>
	     	<?php } ?>

	     	<li class="nav-item">
	        	<a class="nav-link" href="about.php">ABOUT</a>
	     	</li>
			
			<?php if(!isset($_SESSION['current_user'])){ ?>
	     	<li class="nav-item">
	        	<a class="nav-link" href="login.php">LOG IN</a>
	     	</li>
	     	<?php } ?>

	     	<?php if(isset($_SESSION['current_user']) && $_SESSION['user_status'] == 1){ ?>
		     	<li class="nav-item">
		        	<a class="nav-link" href="logout.php">LOG OUT</a>
		     	</li>
	     	<?php } ?>
			
			<?php if(!isset($_SESSION['current_user']) || $_SESSION['user_type'] == "admin"){ ?>
	     	<li class="nav-item">
	        	<a class="nav-link" href="register.php">REGISTER</a>
	     	</li>
	     	<?php } ?>

	     	<?php if(isset($_SESSION['current_user']) && $_SESSION['user_status'] == 1){ ?>
		     	<li class="nav-item">
		        	<a class="nav-link" href="profile.php">MY PROFILE</a>
		     	</li>
	     	<?php } ?>
	     	<?php if(isset($_SESSION['user_type']) && $_SESSION['user_type'] == "admin"){  ?>
	     		<li class="nav-item">
	     			<a class="nav-link" href="registerProduct.php">REGISTER PRODUCT</a>
	     		</li>
	     	<?php } ?>
	    </ul>
	</div>
</nav>