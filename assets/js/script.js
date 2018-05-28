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

	//for read more, and read less on descriptions
	// var descMaxLen = 70;
	// $(".show-read-more").each(function(){
	// 	var myStr = $(this).text();
	// 	if($.trim(myStr).length > descMaxLen){
	// 		var newStr = myStr.substring(0, descMaxLen);
	// 		var removedStr = myStr.substring(descMaxLen, $.trim(myStr).length);
	// 		$(this).empty().html(newStr);
	// 		// $(this).append('<a href = "javascript: void(0);" class="show-more"> show more . . .</a>');
	// 		$(this).append('<a href="#showMoreDesc" data-toggle="modal" class="show-more"> show more . . .</a>');
	// 		// $(this).append('<span class="more-text">'+ removedStr + '<a href="javascript:void(0)" class="show-less"> show less</a>' +'</span>');			
	// 	}
	// });

	// $(".show-more").on("click", function(){
	// 	$(this).siblings(".more-text").contents().unwrap();
	// 	$(".show-more").toggle();
	// });
	
	// $("#ps4SortBtn").on("click", function(){
	// 	$.ajax({
	// 		url: "lib/ps4Cat.php",
	// 		method: "POST",
	// 		data: {},
	// 		sucess:function(data){
	// 			$("#categoryName").html(data);
	// 		}
	// 	})
	// })

	// $("#noSortBtn").on("click", function(){
	// 	$.ajax({
	// 		url: "lib/noSort.php",
	// 		method: "POST",
	// 		data: {},
	// 		sucess:function(data){
	// 			$("categoryName").html(data);
	// 		}
	// 	})
	// })
	
	$("#searchBarInput").on("blur", function(){
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