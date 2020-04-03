$(function() {	
	$('.calendar_system .close').click(function() {
		parent.jQuery.fancybox.getInstance().close();
		return false;
	});

	$('.calendar_system .item .format .view').click(function() {
		var box = $('.calendar_system .select.format .box');
		if(!box.is(':visible')) box.slideDown();
		else box.slideUp();

		return false;
	});

	$('.calendar_system .item .sections .bttn').click(function() {
		var box = $('.calendar_system .select.sections .box');
		if(!box.is(':visible')) box.slideDown();
		else box.slideUp();

		return false;
	});	

	$('.calendar_system .item .wrap .row .closeBox').click(function() {
		var box = $(this).closest('.box');
		box.slideUp();

		return false;
	});

	$('.menu_kot').click(function() {
		if(!$(this).hasClass('active')) {
			$(this).addClass('active');
			$(this).closest('.sections_kot').find('.box').slideDown();
		} else {
			$(this).removeClass('active');
			$(this).closest('.sections_kot').find('.box').slideUp();			
		}
	});

	$('.sections_kot.select.sections .box .closeBox').click(function() {
		$('.menu_kot').click();
		return false;
	});	
});	