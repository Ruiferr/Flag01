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
    	responsive: [
		    {
		      breakpoint: 1024,
		      settings: {
		        slidesToShow: 3,
		        slidesToScroll: 3
		      }
		    },
		    {
		      breakpoint: 620,
		      settings: {
		        slidesToShow: 2,
		        slidesToScroll: 2
		      }
		    }
		]
	});


	// LOGIN SECTION


   	$('.login').click(function(){

   		userName = $('.login p').html();

   		if ($('.loginWindow').css('display') == 'none' && userName == 'Login'){
 			$('.loginWindow').fadeIn(1000);
   		}else{
   			$('.loginWindow').hide();
   		}  

   		if ($('.profileWindow').css('display') == 'none' && userName !== 'Login'){
  			$('.profileWindow').fadeIn(1000);
   		}else{
   			$('.profileWindow').hide();
   		}    			

   	});
   
   	// NAV BAR
	
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

	// RATING

	var string = $('.gameBuy span').html();
	var rating = string.substr(0,3);

	if (rating < 10 && rating >= 9) {
		$('.gameBuy p').append("Superb");
	} else if (rating < 9 && rating >= 7.5) {
			$('.gameBuy p').append("Great");
		} else if (rating < 7.5 && rating >= 6.5) {
				$('.gameBuy p').append("Good");	
			} else if (rating < 6.5 && rating >= 5) {
					$('.gameBuy p').append("Fair");	
				} else if (rating < 5 && rating >= 4) {
						$('.gameBuy p').append("Mediocre");	
					} else if (rating < 4 && rating >= 0) {
							$('.gameBuy p').append("Poor");	
						}


});



function addCart(id) {
	alert('hey!');
	var productId = id;
    $.post({'cartFunction.php',{value: productId},function(data) {


	        	alert('hey!');

        }

    });
 }