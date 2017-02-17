$(document).ready(function(){
	$('.search').fadeIn(4000);
	$('.gamestore').fadeIn(4000);
	$('header').fadeIn(1500);
	$('.line').animate({width:'toggle'},2000, function(){
		$('.destaque').fadeIn(800);
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
   	document.getElementById("imgDestaque").src = "img/Destaque"+random[0]+".jpg";
   	document.getElementById("imgDestaque2").src = "img/Destaque"+random[1]+".jpg";
   	document.getElementById("imgDestaque3").src = "img/Destaque"+random[2]+".jpg";

	// CHEVRON ARROW RIGHT SIDE


   	$('.destaqueLayout').mouseenter(function() {
  		$('.chevronRight').fadeIn(500);
	});

	$('.destaqueLayout').mouseleave(function() {
  		$('.chevronRight').fadeOut(500);
	});

   	$('.chevronRight').click(function(){
   		var i = Math.floor(Math.random() * 7);
   		var j = Math.floor(Math.random() * 7) + 8;
   		var k = Math.floor(Math.random() * 6) + 15;
	
   		document.getElementById("imgDestaque2").src = "img/Destaque"+random[j]+".jpg";
	   	document.getElementById("imgDestaque3").src = "img/Destaque"+random[k]+".jpg";  			
	   	document.getElementById("imgDestaque").src = "img/Destaque"+random[i]+".jpg";	

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
	$('.game button').click(function(){
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

});


