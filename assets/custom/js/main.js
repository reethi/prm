$(document).ready(function() {	

		var id = '#dialog';
		var id1 = '#dialog1';
	
		//Get the screen height and width
		var maskHeight = $(document).height();
		var maskWidth = $(window).width();
	
		//Set heigth and width to mask to fill up the whole screen
		$('#mask').css({'width':maskWidth,'height':maskHeight});
		
		//transition effect		
		$('#mask').fadeIn(500);	
		$('#mask').fadeTo(1,0.5);	
	
		//Get the window height and width
		var winH = $(window).height();
		var winW = $(window).width();
              
		
		$(id1).css('top', 110);
		$(id1).css('left', 220);


		$(id).css('top',  (winH/2-$(id).height()/2)+50);
		$(id).css('left', winW/2-$(id).width()/2);
	
		//transition effect
		$(id).fadeIn(400); 	
		$(id1).fadeIn(400); 	
	
	//if close button is clicked
	$('.window .close').click(function (e) {
		//Cancel the link behavior
		e.preventDefault();
		
		$('#mask').hide();
		$('.window').hide();
	});		
	
	//if mask is clicked
	/*$('#mask').click(function () {
		$(this).hide();
		$('.window').hide();
	});*/		
	
});