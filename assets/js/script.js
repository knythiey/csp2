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
	var checkOldPassword = false;

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

	// register button is disabled until all fields are properly filled logic
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

	$("#allUsersDropdown").on("change", function(){
		var user_id = $(this).find('option:selected').val();
		$.ajax({
			url: "lib/showTransHistAdmin.php",
			method: "POST",
			data: {"user_id" : user_id},
			success: function(data){
				$("#showDateCont").html(data);
				$("#purchDateProfAdmin").css("display", "block");
					//2nd ajax
					$("#datePurchHistAdmin").on("change", function(){
					var ord_id = $(this).find('option:selected').val();
					$.ajax({
						url: "lib/showTransHistUser.php",
						method: "POST",
						data: {"ord_id" : ord_id},
						success: function(data){
							$("#resultCont").html(data);
						}
					})
				});
			}
		})
	});

	$("#allProdDropdown").on("change", function(){
		var prod_id = $(this).find('option:selected').val();
		$.ajax({
			url: "lib/adminShowProd.php",
			method: "POST",
			data: {"prod_id" : prod_id},
			success: function(data){
				$("#resultCont").html(data);
			}
		})
	});

	$("#datePurchHistUsers").on("change", function(){
		var ord_id = $(this).find('option:selected').val();
		$.ajax({
			url: "lib/showTransHistUser.php",
			method: "POST",
			data: {"ord_id" : ord_id},
			success: function(data){
				$("#resultCont").html(data);
			}
		})
	});

	/////////////////
	//   PROFILE   //
	/////////////////
	
	/////////////////
	//UPDATEPROFILE//
	/////////////////

	$("#newPassBtn").on("click", function(){
		$("#newPassCont").toggle();
		$(this).toggle();
		$("#createPassword").attr("disabled", false);
		$("#confirmPassword").attr("disabled", false);
	});

	$("#closeNewPassCont").on("click", function(){
		$("#newPassCont").toggle();
		$("#newPassBtn").toggle();
	});

	$("#oldPassword").on("keyup", function(){
		var pass = $(this).val();
		if(pass.length < 8 && pass.length > 0){
			$("#oldPassLength").html("Password too short.");
			checkOldPassword = false;
		} else if (pass.length < 200 && pass.length > 8) {
			$("#oldPassLength").html("Password is Good.");
			checkOldPassword = true;
		}
	});

	// button is disabled until all fields are properly filled logic
	$("#createUsername, #oldPassword, #userEmail, #firstName, #lastName, .radioGender").on("change", function(){
		if(checkUsername == true && checkOldPassword == true && checkEmail == true && checkFirstname == true && checkLastname == true && checkGender == true) {
			$("#updateUserBtn").attr("disabled", false);
		} else {
			$("#updateUserBtn").attr("disabled", true);
		}
	});	

	/////////////////
	//UPDATEPROFILE//
	/////////////////
	

	/////////////////
	//	HOME PAGE  //
	/////////////////
	
	$("#searchBarInput").on("change", function(){
		var search = $(this).val();
		$.ajax({
			url: "lib/search.php",
			method: "POST",
			data: {"key_word" : search},
			success: function(data){
				$(".catalog-items").html(data);
			}
		});
	});

	/////////////////
	//  HOME PAGE  //
	/////////////////

	/////////////////
	//PRODUCT PAGE //
	/////////////////

	$("#closeDelProd").on("click", function(){
		$("#confirmDelProd").toggle();
		$("#delProdBtn").toggle()
	});

	/////////////////
	//PRODUCT PAGE //
	/////////////////

	//////////////////
	//EDITPROD PAGE //
	//////////////////
	$("#uploadNewImgBtn").on("click", function(){
		$("#uploadNewImgForm").toggle();
		$("#updateProdImgSize").prop("disabled", false);
		$("#updateProdImg").prop("disabled", false);
	})

	$("#closeUploadNewImgForm").on("click", function(){
		$("#uploadNewImgForm").toggle();
		$("#updateProdImgSize").prop("disabled", true);
		$("#updateProdImg").prop("disabled", true);
	})

	//////////////////
	//EDITPROD PAGE //
	//////////////////


	/////////////////
	//  CART PAGE  //
	/////////////////
	checkCart();

	/////////////////
	//  CART PAGE  //
	/////////////////
	
	/////////////////
	//     OWL     //
	/////////////////
	

	$('.owl-carousel').owlCarousel({
	    items: 1,
	    autoplay: true,
	    loop: true,
	    margin: 15,
	    autoplayTimeout: 4000,
    	autoplayHoverPause: true,
	    responsiveClass:true,
	    responsive:{
	        0:{
	            items:1,
	            nav:true
	        },
	        600:{
	            items:3,
	            nav:false
	        },
	        1000:{
	            items:3,
	            nav:true,
	            loop:false
	        }
	    }
	});
	/////////////////
	//     OWL     //
	/////////////////

});//$document.ready
	
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
		var price_each = $("#price_each" + prod_id).html();

		//updates navbar item count
		$.ajax({
			url: "lib/addToCart.php",
			method: "POST",
			data: {"prod_id": prod_id, "prod_quant": quantity, "price_each" : price_each},
			success: function(data){
				$("#itemCount").html(data);
				checkCart();
			}
		});

		//updates subtotal cart
		$.ajax({
			url: "lib/subtotalCart.php",
			method: "POST",
			data: {"prod_id" : pId, "prod_quant" : quantity, "price_each" : price_each},
			success: function(data){
				$("#cart_prod_subtotal" + prod_id).html(data);

			}
		});

		//updates totalprice
		$.ajax({
			url: "lib/totalPriceCart.php",
			method: "POST",
			data: {"prod_id" : prod_id, "prod_quant" : quantity, "price_each" : price_each},
			success: function(data){
				$("#totalPriceCart").html(data);
			}
		});
	};

	//Logic for deleting item from cart
	function deleteCartItem(pId){
		var prod_id = pId;
		var quantity = $("#productQuantity" + prod_id).val();
		var price_each = $("#price_each"+ prod_id).html();

		//removed item from view
		$.ajax({
			url: "lib/deleteProdCart.php",
			method: "POST",
			data: {"prod_id" : prod_id, "prod_quant" : quantity, "price_each" : price_each},
			success: function(data){
				$("#itemDelMsg").html(data);
				$("#productQuantity" + prod_id).val(0);
				$("#cart-item-container" + prod_id).toggle();
				checkCart();
			}
		})

		//update total price when deleting item
		$.ajax({
			url: "lib/delProdTotal.php",
			method: "POST",
			data: {"prod_id" : prod_id, "prod_quant" : quantity, "price_each" : price_each},
			success: function(data){
				$("#totalPriceCart").html(data);
				checkCart();
			}
		});

		//updates navbar cart items when deleting item from cart
		$.ajax({
			url: "lib/remFromCart.php",
			method: "POST",
			data: {"prod_id": prod_id, "prod_quant": quantity, "price_each" : price_each},
			success: function(data){
				$("#itemCount").html(data);
				checkCart();
			}
		});
	}

	//checks if cart has items or not
	function checkCart(){
		var itemCount = parseInt($("#itemCount").html());
		if(itemCount > 0){
			$("#checkoutBtn").prop("disabled", false);
		} else {
			$("#checkoutBtn").prop("disabled", true);
		}	
	};