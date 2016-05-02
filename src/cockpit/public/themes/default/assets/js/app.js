jQuery(function(){

	$('.liAside').click(function(e){
		// e.preventDefault();
		$(this + ' > .subAside').slideToggle();
	});

});