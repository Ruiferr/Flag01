$(document).ready(function(){
	$('.search').fadeIn(4000);
	$('.gamestore').fadeIn(4000);
	$('header').fadeIn(1500);
	$('.line').animate({width:'toggle'},2000, function(){
		$('.destaqueLayout').fadeIn(800);
		$('.frame2').fadeIn(800);
		$('.menu').fadeIn(800);
		$('footer').fadeIn(800);
		$('#nav1').addClass('active');
	});

	// CHEVRON ARROW RIGHT SIDE

   	$('.destaqueLayout').mouseenter(function() {
  		$('.chevronRight').stop().fadeIn(500);
	});

	$('.destaqueLayout').mouseleave(function() {
  		$('.chevronRight').stop().fadeOut(500);
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
  

	// GALERIA LATEST

	$('.bottomGame').mouseenter(function(){
		$('.bottomGame aside').stop().slideDown(1000);
		$('.bottomGame article').stop().slideDown(1000);
	});

	$('.bottomGame').mouseleave(function(){
		$('.bottomGame aside').stop().slideUp(1000);
		$('.bottomGame article').stop().slideUp(1000);
	});

	// SEARCH

	$('.search input').keyup(function(e){
 		if (e.keyCode == 13) {
 			carregaZona("search");
 		}
 	});

 	$('.mobileSearch input').keyup(function(e){
 		if (e.keyCode == 13) {
 			carregaZona("search");
 		}
 	});

});




// <------------- FUNCTIONS  ---------------->



// BESTSELLER SELECTION

function select(){		
	var selection = document.getElementById('option').value;

	switch(selection){
		case 'pc' : { 
			 $('.group2').fadeIn(1000); 
			 $('.group1').hide(); 
			 $('.group3').hide();
		} break;
		case 'ps4' : { 
			 $('.group1').fadeIn(1000); 
			 $('.group2').hide(); 
			 $('.group3').hide();
		} break;
		case 'xbox' : {
			 $('.group3').fadeIn(1000); 
			 $('.group1').hide(); 
			 $('.group2').hide();
		} break;
	}
}

// SYSTEM SELECTION

function select2(){		
	var selection = document.getElementById('option2').value;

	switch(selection){
		case 'all' : { 
			 $('.group4').fadeIn(1000); 
			 $('.group5').fadeIn(1000); 
			 $('.group6').fadeIn(1000); 
			 $('.group8').fadeIn(1000); 
		} break;		
		case 'ps4' : { 
			 $('.group4').fadeIn(1000); 
			 $('.group8').hide(); 
			 $('.group5').hide(); 
			 $('.group6').hide(); 
		} break;
		case 'xbox' : { 
			 $('.group5').fadeIn(1000); 
			 $('.group8').hide(); 
			 $('.group4').hide(); 
			 $('.group6').hide(); 
		} break;
		case 'nitendo' : { 
			 $('.group6').fadeIn(1000); 
			 $('.group4').hide(); 
			 $('.group5').hide();
			 $('.group8').hide();
		} break;
		case 'accessories' : {
			 $('.group8').fadeIn(1000); 
			 $('.group4').hide(); 
			 $('.group5').hide();
			 $('.group6').hide();
		} break;
	}
}


function select3(){
	var selection = document.getElementById('option3').value;

		switch(selection){
		case 'all2' : {
			 $('.group7').fadeIn(1000); 
			 $('.group9').fadeIn(1000); 
		} break;
		case 'desk' : {
			 $('.group7').fadeIn(1000); 
			 $('.group9').hide(); 
		} break;
		case 'port' : {
			 $('.group9').fadeIn(1000); 
			 $('.group7').hide(); 
		} break;
	}
}


// NAV BAR


function carregaZona(zona){

	switch(zona){
		case 'latest' : { 
			$.post('latestSection.php',  function(data){
				$('.frame2').html(data);
				$('.nav').removeClass('active');
				$('#nav2').addClass('active');
			});

		} break;

		case 'bestseller' : { 
			$.post('bestsellerSection.php',  function(data){
				$('.frame2').html(data);
				$('.nav').removeClass('active');
				$('#nav3').addClass('active');

			});

		}break;

		case 'systems' : { 
			$.post('systemSection.php',  function(data){
				$('.frame2').html(data);
				$('.nav').removeClass('active');
				$('#nav4').addClass('active');
			});

		}break;

		case 'games' : { 
			$.post('gameSection.php',  function(data){
				$('.frame2').html(data);
				$('.nav').removeClass('active');
				$('#nav1').addClass('active');

			});

		}break;
		case 'search' : { 
		 	if ($('.mobileSearch').is(":visible")) {
		 		 termo = $('.search-item2').val();
		 	} else{
		 		 termo = $('.search-item').val();
		 	}

			$.post('searchSection.php', {valor : termo }, function(data){
				$('.frame2').html(data);
				$('.nav').removeClass('active');
				$('#nav1').addClass('active');
			});	

		}break;
	} 

}


function addCart(id) {
	var productId = id;
    $.post('cartFunction.php',{value: productId},function(data) {
    	$('.cart span').html(data);

    });
 }


function loginAlert(){
 	$('.loginWindow').fadeIn(1000);
}

function shuffle() {

    $.post('shuffleImages.php',function(data) {
    	$('.destaqueLayout').html(data);

    });
 }






