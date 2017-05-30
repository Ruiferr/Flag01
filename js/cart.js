$(document).ready(function(){
	
	// BLOCK WRITING ON QUANTITY INPUT

	$("[type='number']").keypress(function (evt) {
    evt.preventDefault();
	});
	
	// LOADING PAGE CART FUNCTION

	total = [];
	$('.sub span').each(function(){
		value = parseFloat($(this).html()).toFixed(2);
		total.push(value);
		var sum = total.reduce(add, 0);
		function add(a, b) {
		    return parseFloat(a) + parseFloat(b);
		}
		$('.subtotalProceed span').empty();
		$('.subtotalProceed span').append(sum.toFixed(2));

		if (sum.toFixed(2) > 150) {
			   	$('.disclaimer').show();

		   	} else {
		   			$('.disclaimer').hide();
		   		}
	});


	// QUANTITY CART SELECTOR

	
	$('.qty input').change(function(){
		var quantity = $(this).val();
		var id = parseInt($(this).attr('id'));

		$('.price span').each(function() {
				if ($(this).attr('id') == id) {
					var price = parseFloat($(this).html()).toFixed(2);
					sub = parseFloat(quantity*price).toFixed(2);
				}
		});

		$('.sub span').each(function() {
				if ($(this).attr('id') == id) {
					$(this).empty();
					$(this).append(sub);
				}
			});


		total = [];
		$('.sub span').each(function(){
			value = parseFloat($(this).html()).toFixed(2);
			total.push(value);
			var sum = total.reduce(add, 0);
			function add(a, b) {
			    return parseFloat(a) + parseFloat(b);
			}
			$('.subtotalProceed span').empty();
			$('.subtotalProceed span').append(sum.toFixed(2));

			if (sum.toFixed(2) > 150 ){
			   	$('.disclaimer').fadeIn(500);
		   	} else {
		   		$('.disclaimer').fadeOut(500);
		   		}
		});

	});


	// CART SELECTION

	var cartNum = parseInt($('.cart span').html());
	$('tbody i').click(function(){
		var getId = '.' + $(this).attr('id');
		cartNum --
		$('.cart span').hide();
		$('.cart p').append("<span>"+ cartNum +"</span>");
		$('.cart p').css('color', 'yellow');
		$('.proceed span').hide();
		$(getId).hide();
		if ($('.gta').css('display') == 'none' && $('.xbox').css('display') == 'none') {
		   	$('.disclaimer').fadeOut(1000);
		 }

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

   	// PROCEED BUTTON 

   	$('.proceed button').click(function(){

   		switch($('.progress .active').html()){
   			case 'Basket' : { 
   				carregaZona('cart');
			}break;   			
			case 'Details' : { 
   				carregaZona('detail');
			}break;
			case 'Delivery' : { 
   				carregaZona('delivery');
			}break;
			case 'Payment' : { 
   				carregaZona('payment');
			}break;
			case 'Done!' : { 
   				window.location.href = "index.php";
			}break;
   		}

   	});
     

});


function carregaZona(zona){

	qty = [];
	$('.qty input').each(function(){ 
		value = $(this).val();
		qty.push(value);
	});

	var total = $('.subtotalProceed span').html();

	var qtyJson = JSON.stringify(qty);


	switch(zona){
		case 'cart' : { 
			$.post('cartDetails.php',{amount : qtyJson, cost: total }, function(data){
				$('.productContent').html(data);
				//active secion
				$('.progress li').removeClass('active');
				$('.fase').removeClass('active');
				$('.progress li:nth-child(2)').addClass('active');
				$('.progress div:nth-child(3)').addClass('active');
				//remove some info
				$('.promoCode').remove();
				$('.rewardPoints').remove();
			});

		} break;

		case 'detail' : { 
			$.post('cartDelivery.php',{cost: total },  function(data){
				$('.productContent').html(data);
				deliveryCheck();
				//active secion
				$('.progress li').removeClass('active');
				$('.fase').removeClass('active');
				$('.progress li:nth-child(3)').addClass('active');
				$('.progress div:nth-child(4)').addClass('active');				
			});

		}break;

		case 'delivery' : { 
			$.post('cartPayment.php',  function(data){
				$('.productContent').html(data);
				//active secion
				$('.progress li').removeClass('active');
				$('.fase').removeClass('active');
				$('.progress li:nth-child(4)').addClass('active');
				$('.progress div:nth-child(5)').addClass('active');	
			});

		}break;

		case 'payment' : { 
			$.post('cartDone.php',  function(data){
				$('.productContent').html(data);
				$('.proceed table').empty();
				$('.proceed button').empty();
				$('.proceed button').append('RETURN TO STORE');

				//active secion
				$('.progress li').removeClass('active');
				$('.fase').removeClass('active');
				$('.progress li:nth-child(5)').addClass('active');
				$('.progress div:nth-child(6)').addClass('active');
			});

		}break;
	} 

}



function deliveryCheck(){


	if ($('.subtotalProceed span').html() > 150) {
			$('.deliveryCheck').append('0 €');
		} else{
			$('.deliveryCheck').append('40 €');
			value = parseFloat($('.subtotalProceed span').html());
			$('.subtotalProceed span').empty();
			$('.subtotalProceed span').append((value + 40).toFixed(2));

	}
}













