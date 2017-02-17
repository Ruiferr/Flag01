$(document).ready(function(){
	$('#nav1').addClass('active');

	//Imagens de destaque aleatórias


	var images = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21];
	
	function shuffle(n) {
    for(var j, x, i = n.length; i; j = parseInt(Math.random() * i), x = n[--i], n[i] = n[j], n[j] = x);
    return n;
	};

	var random = shuffle(images);
   	document.getElementById("imgDestaque").src = "img/Destaque"+random[0]+".jpg";
   	document.getElementById("imgDestaque2").src = "img/Destaque"+random[1]+".jpg";
   	document.getElementById("imgDestaque3").src = "img/Destaque"+random[2]+".jpg";

	//Seta chevron na área de destaque


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


   	$('.login').click(function(){
   		if ($('.loginWindow').css('display') == 'none' && $("p").length == '24'){
 			$('.loginWindow').fadeIn(1000);
   		}else{
   			$('.loginWindow').hide()
   		}  

   		if ($('.profileWindow').css('display') == 'none' && $("p").length == '25' ) {
  			$('.profileWindow').fadeIn(1000);
   		}else{
   			$('.profileWindow').hide()
   		}    			

   	});


   	$('#login').click(function(){
  		$('.login p').fadeOut(1000);
  		$('.login').append("<p>User001</p>");
		$('.loginWindow').hide()
   	});

   	$('#logout').click(function(){
   		$('.login p').fadeOut(1000);
		$('.login').append("<p>User Login</p>");
		$('.profileWindow').hide()
   	})

	
   	$('.nav').click(function(){
   		$('.nav').removeClass('active');
		$(this).addClass('active');
   	});



    //FILTER GAMES






});