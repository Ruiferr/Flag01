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
   


});