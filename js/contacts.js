$(document).ready(function(){

	// MAP SELECTION

	$('#shop1').click(function(){
		$('.map2').hide();
		$('.map3').hide();
		$('.map1').show();
	});
	$('#shop2').click(function(){
		$('.map1').hide();
		$('.map3').hide();
		$('.map2').show();
	});
	$('#shop3').click(function(){
		$('.map1').hide();
		$('.map2').hide();
		$('.map3').show();
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


});