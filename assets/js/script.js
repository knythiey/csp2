$(document).ready(function(){

	/////////////////
	//REGISTER PAGE//
	/////////////////

	//checks username availablity
	$("#createUsername").on("keyup", function(){
		var createUsername = $(this).val();
		$.ajax({
			url:"lib/validateCreateUsername.php",
			method: "POST",
			data: {"createUsername" : createUsername},
			success: function(data){
				$("#usernameAvail").html(data);
			}
		})
	});

	//checks password is < 8 characters
	$("#createPassword").on("keyup", function(){
		var pass = $(this).val();
		if(pass.length < 8 && pass.length > 0){
			$("#passwordLength").html("Password too short.");
		} else if (pass.length < 200 && pass.length > 8) {
			$("#passwordLength").html("Password is Good.");
		}
	});

	//confirms password credibility
	$("#confirmPassword").on("keyup", function(){
		var pword = $("#createPassword").val();
		var confirmpw = $(this).val();

		if(pword === confirmpw) {
			$("#passwordMatch").html("Password matched!");
		} else {
			$("#passwordMatch").html("Password does not matched!");
		}
	});


	//checks email availablity
	$("#userEmail").on("keyup", function(){
		var userEmail = $(this).val();
		$.ajax({
			url:"lib/validateUserEmail.php",
			method: "POST",
			data: {"userEmail" : userEmail},
			success: function(data){
				$("#emailAvail").html(data);
			}
		})
	});

	/////////////////
	//REGISTER PAGE//
	/////////////////


})//$document.ready