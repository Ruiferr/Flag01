$(document).ready(function(){


	// CHEVRON ARROW RIGHT SIDE


   	$('.destaqueLayout').mouseenter(function() {
  		$('.chevronRight').fadeIn(500);
	});

	$('.destaqueLayout').mouseleave(function() {
  		$('.chevronRight').fadeOut(500);
	});

	// ACCOUNT CREATION REQUIRED FIELDS

	$('#next').click(function(){

		if($('#name').val()!='' || $('#email').val()!='' || $('#password').val()!='' || $('#firstName').val()!='' || $('#lastName').val()!='' || $('#country').val()!='' || $('#adress').val()!='' || $('#postalCode').val()!=''){

		} else {
			alert('Fill the required field');
		}
	});

	$('#next2').click(function(){

		if($('#cardNumber').val()!='' || $('#expirationDate').val()!='' || $('#cvv').val()!='' || $('#cardName').val()!=''){

		} else {
			alert('Fill the required field');
		}
	});

	


});

function selection(){

	var selected = $('#cardTypeOption').find(":selected").text();

	switch(selected){
		case 'Paypal' : {
			 $('.disable').remove(); 
		} break;
		case 'Visa' : {
			 $('.disable').fadeIn(1000); 
		} break;
		case 'American Express' : {
			 $('.disable').fadeIn(1000); 
		} break;
	}
}

function shuffle() {

    $.post('shuffleImages.php',function(data) {
    	$('.destaqueLayout').html(data);

    });
 }


 function changeProfile(){
 	$('.Profileinfo').fadeOut(1000);
 	$('.newProfile').fadeIn(1000);
 }








