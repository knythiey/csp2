<?php
	session_start();
	require "connect.php";

	//file upload
	$target_dir = "../assets/img/product_imgs/";
	$target_file = $target_dir . basename($_FILES['prodImg']['name']);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); 
	
	if(isset($_POST['submit'])){
	$check = getimagesize($_FILES['prodImg']['tmp_name']);	
		if($check !== false){
			// echo "File is an image - " . $check['mime'] . ".";
			$uploadOk = 1;
		} else {
			$_SESSION['uploadMsg'] = "File is not an image.";
			$uploadOk = 0;
			header("Location: registerProduct.php");
		}
	}
	
	if(file_exists($target_file)) {
	    $_SESSION['uploadMsg'] =  "Sorry, file already exists.";
	    $uploadOk = 0;
	    header("Location: registerProduct.php"); 
	}
	
	if($_FILES["prodImg"]["size"] > 10000000) {
	    $_SESSION['uploadMsg'] = "Sorry, your file is too large.";
	    $uploadOk = 0;
	    header("Location: registerProduct.php");
	}

	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
	    $_SESSION['uploadMsg'] =  "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	    $uploadOk = 0;
	    header("Location: registerProduct.php");
	}

	if ($uploadOk == 0) {
	    $_SESSION['uploadMsg'] =  "Sorry, your file was not uploaded.";
	} else {
	    if (move_uploaded_file($_FILES["prodImg"]["tmp_name"], $target_file)) {
	    	//inserting data into database;
			$prodName = $_POST['prodName'];
			$prodDesc = $_POST['prodDesc'];
			$prodPrice = $_POST['prodPrice'];
			$prodCat = $_POST['prodCat'];
			$imgName = basename($_FILES['prodImg']['name']);
			$target_folder = "assets/img/product_imgs/";
			$imagePath = $target_folder . $imgName;
			
			$query = "INSERT INTO products(product_name, product_image, description, price_each, category_id) VALUES ('$prodName', '$imagePath', '$prodDesc', '$prodPrice', '$prodCat')";
			$result = mysqli_query($conn, $query);
			if($result == true) {
				$_SESSION['insertDbConfirm'] = "Data successfully inserted into " . $dbname . " database.";
	       		$_SESSION['uploadMsg'] = "The file ". basename( $_FILES["prodImg"]["name"]). " has been uploaded to " . $target_dir . ".";
			} else {
				$_SESSION['insertDbConfirm'] = "Insertion to Database failed";
			}

	    } else {
	        $_SESSION['uploadMsg'] = "Sorry, there was an error uploading your file.";
	        header("Location: registerProduct.php");
	    }
	}
	header("Location: ../registerProduct.php");
?>