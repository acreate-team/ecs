$(function() {
	//view format
	$('#footerCalendar .center.format').mouseenter(function() {
		$(this).addClass('active');
	});

	$('#footerCalendar .center.format').mouseleave(function() {
		$(this).removeClass('active');
	});	
});