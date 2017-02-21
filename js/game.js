$(document).ready(function(){
	$('.images a').colorbox({rel:'gal', width:"70%",});

	$('.slider').slick({
  		slidesToShow: 5,
  		slidesToScroll: 1,
  		autoplay: true,
  		autoplaySpeed: 2000,
  		dots: false,
    	prevArrow: false,
    	nextArrow: false,
	});


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

	
   	$('.nav').click(function(){
   		$('.nav').removeClass('active');
		$(this).addClass('active');
   	});


	
	// CART SELECTION

	var contador = 0
	$('.item button').click(function(){
		if ($(this).css('background-color') == 'rgb(135, 206, 250)') {
			var subtrair = parseInt(contador) - 1;
			$(this).css('background', '#00d5bc');
			$(this).css('color', 'white');
			$('.cart span').hide();
			$('.cart p').append("<span>"+ subtrair +"</span>")
			$('.cart p').css('color', 'yellow');
			contador = subtrair
		}else{
				contador ++
				$('.cart span').hide();
				$('.cart p').append("<span>"+ contador +"</span>");
				$('.cart p').css('color', 'yellow');
				$(this).css('background', 'lightskyblue');
				$(this).css('color', 'white');
			}
	}); 

});