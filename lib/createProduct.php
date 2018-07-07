<?php
	session_start();
	require "connect.php";

	//file upload
	$target_dir = "../assets/img/uploads/";
	$target_file = $target_dir . basename($_FILES['prodImg']['name']);
	$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); 
	// custom file name to allow same name images
	$img_basename = pathinfo($_FILES['prodImg']['name'], PATHINFO_FILENAME) . "_". time() . ".";
	$img_ext = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
	$upload_file = $target_dir . $img_basename . $img_ext;
	$uploadOk = 1;
	
	if(isset($_POST['submit'])){
	$check = getimagesize($_FILES['prodImg']['tmp_name']);	
		if($check !== false){
			// echo "File is an image - " . $check['mime'] . ".";
			$uploadOk = 1;
		} else {
			$_SESSION['uploadMsg'] = "File is not an image.";
			$uploadOk = 0;
			// echo "not ok file no img";
			header("Location: ../registerProduct.php");
		}
	}
	
	if(file_exists($upload_file)) {
	    $_SESSION['uploadMsg'] =  "Sorry, file already exists.";
	    $uploadOk = 0;
	    // echo "not ok file exist";
	    header("Location: ../registerProduct.php"); 
	}
	
	if($_FILES["prodImg"]["size"] > 2097152) {
	    $_SESSION['uploadMsg'] = "Sorry, your file is too large.";
	    $uploadOk = 0;
	    // echo "not ok file too big";
	    header("Location: ../registerProduct.php");
	}

	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
	    $_SESSION['uploadMsg'] =  "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	    $uploadOk = 0;
	    // echo "not ok file not mime";
	    header("Location: ../registerProduct.php");
	}

	if ($uploadOk == 0) {
	    $_SESSION['uploadMsg'] =  "Sorry, your file was not uploaded.";
	} else {
	    if (move_uploaded_file($_FILES["prodImg"]["tmp_name"], $upload_file)) {
	    	//inserting data into database;
			$prodName = $_POST['prodName'];
			$prodDesc = $_POST['prodDesc'];
			$prodPrice = $_POST['prodPrice'];
			$prodCat = $_POST['prodCat'];
			// $imgName = basename($_FILES['prodImg']['name']);
			$img_basename_db = pathinfo($_FILES['prodImg']['name'], PATHINFO_FILENAME) . "_". time() . ".";
			$img_ext_db = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
			$img_upload_db = $img_basename_db . $img_ext_db;
			$target_folder = "assets/img/uploads/";
			$imagePath = $target_folder . $img_upload_db;
			
			$query = "INSERT INTO products(product_name, product_image, description, price_each, category_id) VALUES ('$prodName', '$imagePath', '$prodDesc', '$prodPrice', '$prodCat')";
			$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
			if($result == true) {
				$_SESSION['insertDbConfirm'] = "Data successfully inserted into " . $dbname . " database.";
	       		$_SESSION['uploadMsg'] = "The file ". $img_basename_db . " has been uploaded to " . $target_folder . ".";
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