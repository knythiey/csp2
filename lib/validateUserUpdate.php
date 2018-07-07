<?php
	session_start();
	require "connect.php";
	$user_id =  $_SESSION['user_id'];

	$select_query ="SELECT * FROM users WHERE id = '$user_id'";
	$select_result = mysqli_query($conn, $select_query);

	//checks validity if old password is correct then changes to new password
	foreach($select_result as $sel_id){
		$oldPassword = sha1($_POST['oldPassword']);
		$checkoldPass = $sel_id['password'];
		if($oldPassword == $checkoldPass) {
			if(isset($_POST['createPassword']) && isset($_POST['oldPassword'])){
				$user_id =  $_SESSION['user_id'];
				$newUsername = $_POST['createUsername'];
				$newPassword = sha1($_POST['createPassword']);
				$newEmail = $_POST['userEmail'];
				$newFirstname = $_POST['firstName'];
				$newLastname = $_POST['lastName'];
				$newGender = $_POST['gender'];
				$ship_add = $_POST['updateShipAdd'];
				$contact_num = $_POST['updateContactNum'];

				// echo $user_id . "<br>";
				// echo $newUsername . "<br>";
				// echo $newPassword . "<br>";
				// echo $newEmail . "<br>";
				// echo $newFirstname . "<br>";
				// echo $newLastname . "<br>";
				// echo $newGender . "<br>";
				// echo $ship_add . "<br>";
				// echo $contact_num . "<br>";
				// echo "good, with new pass";
				
				$_SESSION['current_user'] = $newUsername;
				$_SESSION['user_email'] = $newEmail;
				$_SESSION['user_firstName'] = $newFirstname;
				$_SESSION['user_lastName'] = $newLastname;
				$_SESSION['user_gender'] = $newGender;
				$_SESSION['user_address'] = $ship_add;
				$_SESSION['user_contact'] = $contact_num;

				$query = "UPDATE users SET 
				username = '$newUsername', 
				password = '$newPassword', 
				email = '$newEmail',
				first_name = '$newFirstname', 
				last_name = '$newLastname', 
				gender = '$newGender',
				contact_number = '$contact_num',
				shipping_address = '$ship_add' 
				WHERE 
				id = '$user_id'";
				$result = mysqli_query($conn, $query);
				$_SESSION['updateProfileMsg'] = "Congrats old pass worked!Profile Updated.";
				header("Location: ../updateProfile.php");
				} else {
					$_SESSION['updateProfileMsg'] = "Invalid Old Password. Profile fail to update";
					header("Location: ../updateProfile.php");
				}

		//if no new pass password
		if(isset($_POST['oldPassword'])){
				$user_id =  $_SESSION['user_id']; 
				$newUsername = $_POST['createUsername'];
				$oldPassword = sha1($_POST['oldPassword']);
				$newEmail = $_POST['userEmail'];
				$newFirstname = $_POST['firstName'];
				$newLastname = $_POST['lastName'];
				$newGender = $_POST['gender'];
				$ship_add = $_POST['updateShipAdd'];
				$contact_num = $_POST['updateContactNum'];

				// echo $user_id. "<br>";
				// echo $newUsername . "<br>";
				// echo $oldPassword . "<br>";
				// echo $newEmail . "<br>";
				// echo $newFirstname . "<br>";
				// echo $newLastname . "<br>";
				// echo $newGender . "<br>";
				// echo $ship_add . "<br>";
				// echo $contact_num . "<br>";
				// echo "good, old pass only";
				
				$_SESSION['current_user'] = $newUsername;
				$_SESSION['user_email'] = $newEmail;
				$_SESSION['user_firstName'] = $newFirstname;
				$_SESSION['user_lastName'] = $newLastname;
				$_SESSION['user_gender'] = $newGender;
				$_SESSION['user_address'] = $ship_add;
				$_SESSION['user_contact'] = $contact_num;
				

				$query = "UPDATE users SET 
				username = '$newUsername',  
				email = '$newEmail',
				first_name = '$newFirstname', 
				last_name = '$newLastname', 
				gender = '$newGender',
				contact_number = '$contact_num',
				shipping_address = '$ship_add' 
				WHERE 
				id = '$user_id'";
				$result = mysqli_query($conn, $query);
				$_SESSION['updateProfileMsg'] = "Congrats!Profile Updated.";
				// header("Location: ../updateProfile.php");
			} else {
				$_SESSION['updateProfileMsg'] = "Invalid New Password. Profile fail to update";
				// header("Location: ../updateProfile.php");
			}
		}//if old pass = pass in db
		else {
			$_SESSION['updateProfileMsg'] = "Password not matched with database. Profile fail to update";
			// header("Location: ../updateProfile.php");
			// echo "invalid password";
		}
	}//foreach $select_result
?>