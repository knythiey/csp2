<?php
	session_start();
	require "connect.php";
	//inserting data into database;
	
	// echo $prod_id;
	// echo $prodName;
	// echo $prodCat;

	if(isset($_FILES['updateProdImg']['name'])){
		// file upload
		$target_dir = "../assets/img/product_imgs/";
		$target_file = $target_dir . basename($_FILES['updateProdImg']['name']);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); 
		
		if(isset($_POST['submit'])){
		$check = getimagesize($_FILES['updateProdImg']['tmp_name']);	
			if($check !== false){
				echo "File is an image - " . $check['mime'] . ".";
				$uploadOk = 1;
			} else {
				echo "File is not an image.";
				$uploadOk = 0;
				header("Location: ../editProduct.php");
			}
		}
		
		if(file_exists($target_file)) {
		    echo  "Sorry, file already exists.";
		    $uploadOk = 0;
		    header("Location: ../editProduct.php"); 
		}
		
		if($_FILES["updateProdImg"]["size"] > 1000000) {
		    echo "Sorry, your file is too large.";
		    $uploadOk = 0;
		    header("Location: ../editProduct.php");
		}

		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    echo  "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		    header("Location: ../editProduct.php");
		}

		if ($uploadOk == 0) {
		    echo  "Sorry, your file was not uploaded.";
		} else {
		    if (move_uploaded_file($_FILES["updateProdImg"]["tmp_name"], $target_file)) {
		        echo "The file ". basename( $_FILES["updateProdImg"]["name"]). " has been uploaded to " . $target_dir . ".";
		    } else {
		        echo "Sorry, there was an error uploading your file.";
		        header("Location: ../editProduct.php");
		    }
		}

		$imgName = basename($_FILES['updateProdImg']['name']);
		$target_folder = "assets/img/product_imgs/";
		$imagePath = $target_folder . $imgName;
		$prod_id = $_SESSION['prod_id'];
		$prodName = $_POST['updateProdName'];
		$prodDesc = $_POST['updateProdDesc'];
		$prodPrice = $_POST['updateProdPrice'];
		$prodCat = $_POST['updateProdCat'];

		$query = "UPDATE products SET 
		product_name = '$prodName', 
		product_image = '$imagePath',
		description = '$prodDesc',
		price_each = '$prodPrice',
		category_id = '$prodCat' 
		WHERE id = '$prod_id'";
		$result = mysqli_query($conn, $query);

	} else if(isset($_POST['submit'])) {
		$prod_id = $_SESSION['prod_id'];
		$prodName = $_POST['updateProdName'];
		$prodDesc = $_POST['updateProdDesc'];
		$prodPrice = $_POST['updateProdPrice'];
		$prodCat = $_POST['updateProdCat'];
		
		$query = "UPDATE products SET 
		product_name = '$prodName', 
		description = '$prodDesc',
		price_each = '$prodPrice',
		category_id = '$prodCat' 
		WHERE id = '$prod_id'";
		$result = mysqli_query($conn, $query);
	}

	if($result == true) {
		$_SESSION['updatedDbConfirm'] = "Data successfully updated the products from the " . $dbname . " database.";
	} else {
		$_SESSION['updatedDbConfirm'] = "Insertion to Database failed";
	}

	header("Location: ../editProduct.php?id=$prod_id");
?>