<?php
	session_start();
	require "connect.php";

	if(isset($_FILES['updateProdImg']['name'])){
		$target_dir = "../assets/img/uploads/";
		$target_file = $target_dir . basename($_FILES['updateProdImg']['name']);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); 
		
		if(isset($_FILES['updateProdImg']['name'])){
			$check = getimagesize($_FILES['updateProdImg']['tmp_name']);	
			if($check !== false){
				$_SESSION['updatedDbConfirm'] = "File is an image - " . $check['mime'] . ".";
				$uploadOk = 1;
			} else {
				$_SESSION['updatedDbConfirm'] = "File is not an image.";
				echo "File is not an image.";
				$uploadOk = 0;
				header("Location: ../editProduct.php");
			}
		}
		
		if(file_exists($target_file)) {
		    $_SESSION['updatedDbConfirm'] = "Sorry, file already exists.";
		    echo "Sorry, file already exists.";
		    $uploadOk = 0;
		    header("Location: ../editProduct.php"); 
		}
		
		if($_FILES["updateProdImg"]["size"] > 2097152) {
		    $_SESSION['updatedDbConfirm'] = "Sorry, your file is too large.";
		    echo "Sorry, your file is too large.";
		    $uploadOk = 0;
		    header("Location: ../editProduct.php");
		}

		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    $_SESSION['updatedDbConfirm'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		   echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		    header("Location: ../editProduct.php");
		}

		if ($uploadOk == 0) {
		    $_SESSION['updatedDbConfirm'] = "Error in validation of image. Insertion to Database failed";
		   echo "Error in validation of image. Insertion to Database failed";
		} else {
		    if (move_uploaded_file($_FILES["updateProdImg"]["tmp_name"], $target_file)) {
		        // echo "The file ". basename( $_FILES["updateProdImg"]["name"]). " has been uploaded to " . $target_dir . ".";
		        $imgName = basename($_FILES['updateProdImg']['name']);
				$target_folder = "assets/img/uploads/";
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

					if($result == true) {
							$_SESSION['updatedDbConfirm'] = "Data successfully updated the products from the " . $dbname . " database.";
						} else {
							echo "Insertion to Database failed";
							$_SESSION['updatedDbConfirm'] = "with image. Insertion to Database failed";
						}
			} else {
				    $_SESSION['updatedDbConfirm'] = "Sorry, there was an error uploading your file.";
				    header("Location: ../editProduct.php?id='$prod_id'");
				}
			}
	} else if(isset($_POST['submit']) && empty($_FILES['updateProdImg']['name'])) {
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
		

			if($result == true) {
				$_SESSION['updatedDbConfirm'] = "Data successfully updated the products from the " . $dbname . " database.";
			} else {
					$_SESSION['updatedDbConfirm'] = "Insertion to Database failed";
					echo "no image. Insertion to Database failed";
			}
	}
	$prod_id = $_SESSION['prod_id'];
	header("Location: ../editProduct.php?id=$prod_id");
?>