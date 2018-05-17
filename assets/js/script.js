$(document).ready(function(){

	/////////////////
	//REGISTER PAGE//
	/////////////////

	// conditions need to be true to enable register button
	var checkUsername = false;
	var checkPassword = false;
	var checkEmail = false;
	var checkFirstname = false;
	var checkLastname = false;
	var checkGender = false;

	//checks username availablity AJAX with regEX
	$("#createUsername").on("keyup", function(){
		var createUsername = $(this).val();
		$.ajax({
			url:"lib/validateCreateUsername.php",
			method: "POST",
			data: {"createUsername" : createUsername},
			success: function(data){
				if(data == true){
					checkUsername = true;
					$("#usernameAvail").html(" Username Good!");
				} else {
					$("#usernameAvail").html(data);
					checkUsername = false;
					}
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
			checkPassword = true;
		} else {
			$("#passwordMatch").html("Password does not matched!");
			checkPassword = false;
		}
	});


	//checks email availablity AJAX with regEx
	$("#userEmail").on("keyup", function(){
		var userEmail = $(this).val();
		$.ajax({
			url:"lib/validateUserEmail.php",
			method: "POST",
			data: {"userEmail" : userEmail},
			success: function(data){
				if(data == true){
					checkEmail = true;
					$("#emailAvail").html(" Email is good!");
				} else {
					$("#emailAvail").html(data);
					checkEmail = false;
				}
			}
		})
	});

	//checks first name format
	$("#firstName").on("keyup", function(){
		var firstName = $(this).val();
		$.ajax({
			url: "lib/validateFirstname.php",
			method: "POST",
			data: {"firstName" : firstName},
			success: function(data){
				if(data == true){
					checkFirstname = true;
					$("#validFirstname").html("");
				} else {
					$("#validFirstname").html(data);
					checkFirstname = false;
				}
			}
		})
	})

	//checks last name format
	$("#lastName").on("keyup", function(){
		var lastName = $(this).val();
		$.ajax({
			url: "lib/validatelastname.php",
			method: "POST",
			data: {"lastName" : lastName},
			success: function(data){
				if(data == true){
					checkLastname = true;
					$("#validLastname").html("");
				} else {
					$("#validLastname").html(data);
					checkLastname = false;
				}
			}
		})
	})

	//checks if gender is checked
	$(".radioGender").on("change", function(){
		var gender = $(this).val();

		if(gender == "male" || gender == "female"){
			checkGender = true;
		} else {
			checkGender = false;
		}
	})

	// button is disabled until all fields are properly filled logic
	$("#createUsername, #confirmPassword, #userEmail, #firstName, #lastName, .radioGender").on("change", function(){
		if(checkUsername == true && checkPassword == true && checkEmail == true && checkFirstname == true && checkLastname == true && checkGender == true) {
			$("#registerbtn").attr("disabled", false);
		} else {
			$("#registerbtn").attr("disabled", true);
		}
	})
	/////////////////
	//REGISTER PAGE//
	/////////////////

	/////////////////
	//   PROFILE   //
	/////////////////
	$("#deactBtn").on("click", function(){
		$(this).toggle();
		$("#validateDeactivateUser").toggle();
	});

	$("#closeDeact").on("click", function(){
		$("#deactBtn").toggle();
		$("#validateDeactivateUser").toggle();
	});

	/////////////////
	//   PROFILE   //
	/////////////////

	/////////////////
	//	HOME PAGE  //
	/////////////////

	//for read more, and read less on descriptions
	var descMaxLen = 70;
	$(".show-read-more").each(function(){
		var myStr = $(this).text();
		if($.trim(myStr).length > descMaxLen){
			var newStr = myStr.substring(0, descMaxLen);
			var removedStr = myStr.substring(descMaxLen, $.trim(myStr).length);
			$(this).empty().html(newStr);
			// $(this).append('<a href = "javascript: void(0);" class="show-more"> show more . . .</a>');
			$(this).append('<a href ="#" class="show-more"> show more . . .</a>');
			$(this).append('<span class="more-text">'+ removedStr + '<a href="javascript:void(0)" class="show-less"> show less</a>' +'</span>');			
			// $(this).append('<span class="more-text">'+ removedStr + '<a href="#" class="show-less"> show less</a>' +'</span>');			
		}
	});

	$(".show-more").on("click", function(){
		$(this).siblings(".more-text").contents().unwrap();
		$(".show-more").toggle();
	});

	/////////////////
	//  HOME PAGE  //
	/////////////////

	/////////////////
	//PRODUCT PAGE //
	/////////////////

	$("#delProdBtn").on("click", function(){
		$("#confirmDelProd").toggle();
		$(this).toggle();
	})

	$("#closeDelProd").on("click", function(){
		$("#confirmDelProd").toggle();
		$("#delProdBtn").toggle()
	})

	/////////////////
	//PRODUCT PAGE //
	/////////////////

})//$document.ready
	
	//shows how much quantity to add to cart
	function showAddQuantity(pId) {
		var prod_id = pId;
		$("#showQuantity" + prod_id).toggle();
		// var prod_quantity = 
		
	}

	//logic for adding to cart
	function addToCart(pId){
		var prod_id = pId;
		var quantity = $("#productQuantity" + prod_id).val();

		$.ajax({
			url: "lib/addToCart.php",
			method: "POST",
			data: {"prod_id": prod_id, "prod_quant": quantity},
			success: function(data){
				$("#itemCount").html(data);
			}
		});
	}
