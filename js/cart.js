$(document).ready(function(){
	
	// BLOCK WRITING ON QUANTITY INPUT

	$("[type='number']").keypress(function (evt) {
    evt.preventDefault();
	});
	

	// QUANTITY CART SELECTOR

	var registaValor = 0
	$('.qty input').click(function(){
		if ($('.xbox').css('display') != 'none') {
			var value = parseInt($(".number").val());
			var valueSub = parseFloat($('.sub span').html()).toFixed(2)
			var valueSub2 = parseFloat($('.sub2 span').html()).toFixed(2)
			var subtotal = value * valueSub
			var subtotalProceed = parseFloat(subtotal) + parseFloat(valueSub2)
			$('.sub span').hide();
			$('.sub p').append("<span> "+ subtotal +" </span>");
			$('.proceed span').hide();
			$('.proceed .subtotalProceed').append("<span> "+ parseFloat(subtotalProceed).toFixed(2) +" </span>");
			if (parseFloat(subtotalProceed).toFixed(2) > 150) {
			   	$('.disclaimer').fadeIn(1000);

		   	} else {
		   			$('.disclaimer').fadeOut(1000);
		   		}

		} else {
				var value = parseInt($(".number").val());
				var valueSub = parseFloat($('.sub span').html()).toFixed(2);
				var subtotal = value * valueSub
				$('.sub span').hide();
				$('.sub p').append("<span> "+ subtotal +" </span>");
				$('.proceed span').hide();
				$('.proceed .subtotalProceed').append("<span> "+ subtotal +" </span>");
				if (subtotal > 150) {
			   		$('.disclaimer').fadeIn(1000);

			   	} else {
			   			$('.disclaimer').fadeOut(1000);
			   		}

			}

	})

	$('.qty2 input').click(function(){
		if ($('.gta').css('display') != 'none') {

			var value = parseInt($(".number2").val());
			var valueSub = parseFloat($('.sub2 span').html()).toFixed(2);
			var valueSub1 = parseFloat($('.sub span').html()).toFixed(2);
			var subtotal = value * valueSub
			var subtotalProceed = parseFloat(subtotal) + parseFloat(valueSub1)
			$('.sub2 span').hide();
			$('.sub2 p').append("<span> "+ subtotal +" </span>");
			$('.proceed span').hide();
			$('.proceed .subtotalProceed').append("<span> "+ parseFloat(subtotalProceed).toFixed(2) +" </span>");
			if (parseFloat(subtotalProceed).toFixed(2) > 150) {
			   	$('.disclaimer').fadeIn(1000);

		   	} else {
		   			$('.disclaimer').fadeOut(1000);
		   		}

		} else {
				var value = parseInt($(".number2").val());
				var valueSub = parseFloat($('.sub2 span').html()).toFixed(2);
				var subtotal = value * valueSub
				$('.sub2 span').hide();
				$('.sub2 p').append("<span> "+ subtotal +" </span>");
				$('.proceed span').hide();
				$('.proceed .subtotalProceed').append("<span> "+ subtotal +" </span>");
				if (subtotal > 150) {
			   		$('.disclaimer').fadeIn(1000);

			   	} else {
			   			$('.disclaimer').fadeOut(1000);
			   		}

			}
	})


	// CART SELECTION

	var cartNum = parseInt($('.cart span').html());
	$('tbody i').click(function(){
		var getId = '.' + $(this).attr('id');
		cartNum --
		$('.cart span').hide();
		$('.cart p').append("<span>"+ cartNum +"</span>")
		$('.cart p').css('color', 'yellow');
		$('.proceed span').hide();
		$(getId).hide();
		if ($('.gta').css('display') == 'none' && $('.xbox').css('display') == 'none') {
		   	$('.disclaimer').fadeOut(1000);
		 }

	})


	// LOGIN SECTION

   	var val = 0

   	$('.login').click(function(){
   		if ($('.loginWindow').css('display') == 'none' && val == 0){
 			$('.loginWindow').fadeIn(1000);
   		}else{
   			$('.loginWindow').hide()
   		}  

   		if ($('.profileWindow').css('display') == 'none' && val == 1) {
  			$('.profileWindow').fadeIn(1000);
   		}else{
   			$('.profileWindow').hide()
   		}    			

   	});


   	$('#login').click(function(){
  		$('.login p').fadeOut(1000);
  		$('.login').append("<p>User001</p>");
		$('.loginWindow').hide();
		val = 1;
   	});

   	$('#logout').click(function(){
   		$('.login p').fadeOut(1000);
		$('.login').append("<p>User Login</p>");
		$('.profileWindow').hide();
		val = 0
   	})

	

});







