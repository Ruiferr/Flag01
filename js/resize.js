$(document).ready(function(){

	if (matchMedia){
		var mobile = window.matchMedia("(max-width: 620px)");
		mobile.addListener(WidthChange);
		WidthChange(mobile);
	}
	
	function WidthChange(mobile){
		if (mobile.matches) {
			$('.search').hide();
			$('.close').fadeIn(2000);
			$('.gamestore').css('width', '100%');
			$('.mobileSearch').fadeIn(2000);

		} else {
			$('.open').hide();
			$('.close').hide();
			$('.mobileSearch').fadeOut();
			$('.gamestore').css('width', '70%');
			$('.search').fadeIn(2000);
		}
	}
	

});