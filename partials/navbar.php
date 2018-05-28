<nav class="navbar navbar-expand-lg navbar-light">
	<a class="navbar-brand" href="home.php">GameHub</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
  	</button>
    <form class="form-inline my-2 my-lg-0">
      	<input class="form-control mr-sm-1" type="search" id="searchBarInput" placeholder="Search">
    </form>

	<div class="collapse navbar-collapse float-right" id="navbarSupportedContent">
	    <ul class="navbar-nav ml-auto">

	      	<li class="nav-item">
	        	<a class="nav-link" href="home.php">Home</a>
	      	</li>

	     	<li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          Categories
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          	<a class="dropdown-item" href="lib/ps4Cat.php">PS4</a>
		          	<a class="dropdown-item" href="lib/xboxCat.php">XBOXONE</a>
		          	<a class="dropdown-item" href="lib/switchCat.php">NINTENDO SWITCH</a>
		        	<div class="dropdown-divider"></div>
		          	<a class="dropdown-item" href="lib/ps4AccCat.php">PS4 ACCESORIES</a>
		          	<a class="dropdown-item" href="lib/xboxAccCat.php">XBOXONE ACCESORIES</a>
		          	<a class="dropdown-item" href="lib/switchAccCat.php">SWITCH ACCESORIES</a>
		        </div>
	      	</li>

	     	<?php if(isset($_SESSION['current_user']) && $_SESSION['user_status'] == 1){ ?>
		     	<li class="nav-item">
		        	<a class="nav-link" href="cart.php">
		        		<?php if(isset($_SESSION['current_user'])){
		        				echo ucfirst($_SESSION['current_user']) . "'s";
							} else {
								echo "My ";
							}
						?>  
		        		Cart ( 
		        		<span id="itemCount"><?php 
		        				if(isset($_SESSION['itemCountCart'])){
		        					echo $_SESSION['itemCountCart'];
		        				} else {
		        					echo " 0 ";
		        				}
		        			?></span> 
		        		)
		        	</a>
		     	</li>
	     	<?php } ?>

	     	<li class="nav-item">
	        	<a class="nav-link" href="about.php">About</a>
	     	</li>
			
			<?php if(!isset($_SESSION['current_user'])){ ?>
	     	<li class="nav-item">
	        	<a class="nav-link" href="login.php">Login</a>
	     	</li>
	     	<?php } ?>
			
			<?php if(!isset($_SESSION['current_user'])){ ?>
	     	<li class="nav-item">
	        	<a class="nav-link" href="register.php">Register</a>
	     	</li>
	     	<?php } ?>

	     	<?php if(isset($_SESSION['current_user']) && $_SESSION['user_status'] == 1){ ?>
		     	<li class="nav-item">
		        	<a class="nav-link" href="profile.php">
		        		<?php if(isset($_SESSION['current_user'])){
		        				echo ucfirst($_SESSION['current_user']) . "'s";
							}
						?> 
					Profile</a>
		     	</li>
	     	<?php } ?>
	     	<?php if(isset($_SESSION['user_type']) && $_SESSION['user_type'] == "admin"){  ?>
	     		<li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          Admin
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          	<a class="dropdown-item" href="register.php">REGISTER</a>
		          	<a class="dropdown-item" href="#">TRANSACTIONS</a>
		        	<div class="dropdown-divider"></div>
		          	<a class="dropdown-item" href="registerProduct.php">ADD ITEM</a>
		          	<a class="dropdown-item" href="#">VIEW ALL PRODUCTS</a>
		        </div>
	      	</li>
	     	<?php } ?>

	     	<?php if(isset($_SESSION['current_user']) && $_SESSION['user_status'] == 1){ ?>
		     	<li class="nav-item">
		        	<a class="nav-link" href="logout.php">Logout</a>
		     	</li>
	     	<?php } ?>
	    </ul>
	</div>
</nav>