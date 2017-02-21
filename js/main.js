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

	// RANDOM SLIDER IMAGES


	var images = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21];
	
	function shuffle(n) {
    for(var j, x, i = n.length; i; j = parseInt(Math.random() * i), x = n[--i], n[i] = n[j], n[j] = x);
    return n;
	};

	var random = shuffle(images);
   	document.getElementById("imgDestaque").src = "img/imgDestaque/Destaque"+random[0]+".jpg";
   	document.getElementById("imgDestaque2").src = "img/imgDestaque/Destaque"+random[1]+".jpg";
   	document.getElementById("imgDestaque3").src = "img/imgDestaque/Destaque"+random[2]+".jpg";

	// CHEVRON ARROW RIGHT SIDE


   	$('.destaqueLayout').mouseenter(function() {
  		$('.chevronRight').stop().fadeIn(500);
	});

	$('.destaqueLayout').mouseleave(function() {
  		$('.chevronRight').stop().fadeOut(500);
	});

   	$('.chevronRight').click(function(){
   		var i = Math.floor(Math.random() * 7);
   		var j = Math.floor(Math.random() * 7) + 8;
   		var k = Math.floor(Math.random() * 6) + 15;
	
   		document.getElementById("imgDestaque2").src = "img/imgDestaque/Destaque"+random[j]+".jpg";
	   	document.getElementById("imgDestaque3").src = "img/imgDestaque/Destaque"+random[k]+".jpg";  			
	   	document.getElementById("imgDestaque").src = "img/imgDestaque/Destaque"+random[i]+".jpg";	

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


	// NAV BAR

   	$('.nav').click(function(){
   		$('.nav').removeClass('active');
		$(this).addClass('active');
   	});

   	$('#nav4').click(function(){
   		$('.bestsellerFrame').hide();
   		$('.gamesFrame').hide();
   		$('.latestFrame').hide();
   		$('.systemFrame').fadeIn(500);
   	});

   	$('#nav3').click(function(){
   		$('.systemFrame').hide();
   		$('.gamesFrame').hide();
   		$('.latestFrame').hide();
   		$('.bestsellerFrame').fadeIn(500);
   	});

   	$('#nav2').click(function(){
   		$('.systemFrame').hide();
   		$('.gamesFrame').hide();
   		$('.bestsellerFrame').hide();
   		$('.latestFrame').fadeIn(500);

   	});

   	$('#nav1').click(function(){
   		$('.systemFrame').hide();
   		$('.bestsellerFrame').hide();
   		$('.latestFrame').hide();
   		$('.gamesFrame').fadeIn(500);
   	});


    // GAME FILTERS


	$('input:checkbox').click(function() {
	    var select = '.' + $(this).attr('id');


	    	if(this.checked){
	    		$('.game').hide();
	    		$(select).fadeIn(500);
	      	} else{
	    		$('.game').hide();		//o hide() seguido do fadeIn() é propositado
	    		$('.game').fadeIn(500); 
	      	}

			//Selecção de uma única checkbox por grupo 

			if (this.checked){
			    var group = "input:checkbox[name='" + $(this).attr("name") + "']";
			    $(group).prop("checked", false);
			    $(this).prop("checked", true);
			  } else {
			    $(this).prop("checked", false);
			  }

	});


	// CART SELECTION

	var contador = 0
	$('.cartButton').click(function(){
		if ($(this).css('background-color') == 'rgb(76, 175, 80)') {
			var subtrair = parseInt(contador) - 1;
			$(this).css('background', 'white');
			$(this).css('color', '#4CAF50');
			$('.cart span').hide();
			$('.cart p').append("<span>"+ subtrair +"</span>")
			$('.cart p').css('color', 'yellow');
			contador = subtrair
		}else{
				contador ++
				$('.cart span').hide();
				$('.cart p').append("<span>"+ contador +"</span>");
				$('.cart p').css('color', 'yellow');
				$(this).css('background', '#4CAF50');
				$(this).css('color', 'white');
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

	// READ ME BUTTON (SYSTEM SECTION)


	$('.productFrame .readButton').click(function(){
		var button = '#' + $(this).attr('id');
		var prodNumber = $(this).attr('id');
		var border = '.' + 'prod' + prodNumber;
		var article = '.' + $(this).attr('id');


		if ($(button).css('background-color') == 'rgb(238, 238, 238)'){
			$(button).css('background-color', 'rgb(55, 145, 202)');
			$(button).css('color', 'rgb(238, 238, 238)');
			$(border).css('border-bottom', 'none');
			$(border).css('border-bottom', 'none');
			$(article).slideDown(1000);
		} else {
				$(article).slideUp(1000, function(){
					$(button).css('background-color', 'rgb(238, 238, 238)');
					$(button).css('color', 'rgb(55, 145, 202)');
					$(border).css('border-bottom', '1px solid rgba(139, 0, 0, 0.317647)');
					$(border).css('border-bottom', '1px solid rgba(139, 0, 0, 0.317647)');					
				});
			}
	});
});


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
			 $('.group5').fadeIn(1000); 
			 $('.group6').fadeIn(1000); 
			 $('.group7').fadeIn(1000); 
			 $('.group8').fadeIn(1000); 
		} break;		
		case 'ps4' : { 
			 $('.group5').fadeIn(1000); 
			 $('.group8').hide(); 
			 $('.group85').fadeIn(1000);
			 $('.group6').hide(); 
			 $('.group7').hide(); 
		} break;
		case 'xbox' : { 
			 $('.group6').fadeIn(1000); 
			 $('.group8').hide(); 
			 $('.group86').fadeIn(1000);
			 $('.group5').hide(); 
			 $('.group7').hide(); 
		} break;
		case 'nitendo' : { 
			 $('.group7').fadeIn(1000); 
			 $('.group5').hide(); 
			 $('.group6').hide();
			 $('.group8').hide();
		} break;
		case 'accessories' : {
			 $('.group8').fadeIn(1000); 
			 $('.group5').hide(); 
			 $('.group6').hide();
			 $('.group7').hide();
		} break;
	}
}

function select3(){
	var selection = document.getElementById('option3').value;

		switch(selection){
		case 'all2' : {
			 $('.group9').fadeIn(1000); 
			 $('.group10').fadeIn(1000); 
		} break;
		case 'desk' : {
			 $('.group9').fadeIn(1000); 
			 $('.group10').hide(); 
		} break;
		case 'port' : {
			 $('.group10').fadeIn(1000); 
			 $('.group9').hide(); 
		} break;
	}
}

