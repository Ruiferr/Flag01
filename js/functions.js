$(document).ready(function(){
    
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
			$(article).slideDown(1000);
		} else {
				$(article).slideUp(1000, function(){
					$(button).css('background-color', 'rgb(238, 238, 238)');
					$(button).css('color', 'rgb(55, 145, 202)');
					$(border).css('border-bottom', '1px solid rgba(139, 0, 0, 0.317647)');				
				});
			}
	});


	// NAV SIDE MENU MOBILE BUTTONS
	

	$('.close').click(function(){
		$('.gamesFrame nav').toggle("slide");
		$(this).hide();
		$('.game').css('width', '120%');
		$('.gamesFrame aside').css("width", "20%");
		$('.open').fadeIn(3000);
	});

	$('.open').click(function(){
		$('.gamesFrame nav').toggle("slide");
		$(this).hide();
		$('.game').css('width', '94%');
		$('.gamesFrame aside').css("width", "37%");
		$('.close').fadeIn(3000);
	});




});
