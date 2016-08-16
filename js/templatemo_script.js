/* Credit: http://www.templatemo.com */
    
$(document).ready( function() {        

	// sidebar menu click
	// $('.templatemo-sidebar-menu li.sub a').click(function(){
	// 	if($(this).parent().hasClass('open')) {
	// 		$(this).parent().removeClass('open');
	// 	} else {
	// 		$(this).parent().addClass('open');
	// 	}
	// });  // sidebar menu click

	$('.templatemo-sidebar-menu li.sub a').click(function() {
		$(this).parent('.sub').each(function() {
		 	$(this).parent().find('.sub').removeClass('open');
		});
		$(this).parent().addClass('open');
	});

}); // document.ready
