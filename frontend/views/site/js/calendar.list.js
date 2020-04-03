$('table tr.head td:eq(1), table tr.bottom td:eq(1)').width($('.list_scroll tr:eq(0) td:eq(1)').width());
$('table tr.head td:eq(2), table tr.bottom td:eq(2)').width($('.list_scroll tr:eq(0) td:eq(2)').width());
$('table tr.head td:eq(3), table tr.bottom td:eq(3)').width($('.list_scroll tr:eq(0) td:eq(3)').width());
$('table tr.head td:eq(4), table tr.bottom td:eq(4)').width($('.list_scroll tr:eq(0) td:eq(4)').width());

function listInit() {
	$('table tr.head td:eq(1), table tr.bottom td:eq(1)').removeAttr('style');
	$('table tr.head td:eq(2), table tr.bottom td:eq(2)').removeAttr('style');
	$('table tr.head td:eq(3), table tr.bottom td:eq(3)').removeAttr('style');
	$('table tr.head td:eq(4), table tr.bottom td:eq(4)').removeAttr('style');

	$('table tr.head td:eq(1), table tr.bottom td:eq(1)').width($('.list_scroll tr:eq(0) td:eq(1)').width());
	$('table tr.head td:eq(2), table tr.bottom td:eq(2)').width($('.list_scroll tr:eq(0) td:eq(2)').width());
	$('table tr.head td:eq(3), table tr.bottom td:eq(3)').width($('.list_scroll tr:eq(0) td:eq(3)').width());
	$('table tr.head td:eq(4), table tr.bottom td:eq(4)').width($('.list_scroll tr:eq(0) td:eq(4)').width());

	var h = $('.calendar_list .list_scroll table tr:eq(0)').innerHeight() + $('.calendar_list .list_scroll table tr:eq(1)').innerHeight() + $('.calendar_list .list_scroll table tr:eq(2)').innerHeight() + $('.calendar_list .list_scroll table tr:eq(3)').innerHeight() + $('.calendar_list .list_scroll table tr:eq(4)').innerHeight() - 2;

	$('.calendar_list .list_scroll').css('max-height', h+'px');	

	var maxH = [];

	$('.calendar_list .list_scroll tr').each(function() {
		var h = $(this).height();
		maxH.push(h);
	});

	maxH = Math.max.apply(null, maxH);

	$('.calendar_list .list_scroll tr').attr('style', 'height: '+maxH+'px');			
}

$(function() {
	$('.openAlphabet').click(function() {
		$.fancybox.open({
			src  : '#searchAlphabet',
			type : 'inline',
			touch: false,
			baseTpl:
			'<div class="fancybox-searchBox fancybox-container" role="dialog" tabindex="-1">' +
			'<div class="fancybox-bg"></div>' +
			'<div class="fancybox-inner">' +
			'<div class="fancybox-infobar"><span data-fancybox-index></span>&nbsp;/&nbsp;<span data-fancybox-count></span></div>' +
			'<div class="fancybox-toolbar">{{buttons}}</div>' +
			'<div class="fancybox-navigation">{{arrows}}</div>' +
			'<div class="fancybox-stage"></div>' +
			'<div class="fancybox-caption"><div class=""fancybox-caption__body"></div></div>' +
			'</div>' +
			'</div>',	
			afterShow: function() {
				setTimeout(function() {
					listInit();
				}, 1);
			},				
			afterClose: function() {
				setTimeout(function() {
					listInit();
				}, 1);
			}			
		});
		return false;
	});

	$('#headerCalendar .bottom a').click(function() {
		var h5 = 0;
		var h10 = 0;
		var h15 = 0;
		var h20 = 0;

		for (var i = 0; i <= 5-1; i++) {
			h5 = h5 + $('.calendar_list .list_scroll tr:eq('+i+')').height();
		}

		for (var i = 0; i <= 10-1; i++) {
			h10 = h10 + $('.calendar_list .list_scroll tr:eq('+i+')').height();
		}

		for (var i = 0; i <= 15-1; i++) {
			h15 = h15 + $('.calendar_list .list_scroll tr:eq('+i+')').height();
		}

		for (var i = 0; i <= 20-1; i++) {
			h20 = h20 + $('.calendar_list .list_scroll tr:eq('+i+')').height();
		}

		var current = $('.calendar_list .list_scroll').attr('data-current');

		if(!current || current == 1) {
			current = h5;
		} else {
			if(current == 5) current = h10;
			if(current == 10) current = h15;
			if(current == 15) current = h20;
			if(current == 20) current = 0;
		}

		$('.calendar_list .list_scroll').animate({scrollTop: current+2}, 1000);
		$('.calendar_list .list_scroll').scroll();

		return false;
	});

	$('.calendar_list .list_scroll').scroll(function() {
		var h5 = 0;
		var h10 = 0;
		var h15 = 0;
		var h20 = 0;

		for (var i = 0; i <= 5-1; i++) {
			h5 = h5 + $('.calendar_list .list_scroll tr:eq('+i+')').height();
		}

		for (var i = 0; i <= 10-1; i++) {
			h10 = h10 + $('.calendar_list .list_scroll tr:eq('+i+')').height();
		}

		for (var i = 0; i <= 15-1; i++) {
			h15 = h15 + $('.calendar_list .list_scroll tr:eq('+i+')').height();
		}

		for (var i = 0; i <= 20-1; i++) {
			h20 = h20 + $('.calendar_list .list_scroll tr:eq('+i+')').height();
		}

		if($(this).scrollTop() > h20) {
			$(this).attr('data-current', 20);
		} else if($(this).scrollTop() > h15) {
			$(this).attr('data-current', 15);
		} else if($(this).scrollTop() > h10) {
			$(this).attr('data-current', 10);
		} else if($(this).scrollTop() > h5) {
			$(this).attr('data-current', 5);
		} else {
			$(this).attr('data-current', 1);
		}
	});

	$('#footerCalendar .top a').click(function() {
		var h5 = 0;
		var h10 = 0;
		var h15 = 0;
		var h20 = 0;

		for (var i = 0; i <= 5-1; i++) {
			h5 = h5 + $('.calendar_list .list_scroll tr:eq('+i+')').height();
		}

		for (var i = 0; i <= 10-1; i++) {
			h10 = h10 + $('.calendar_list .list_scroll tr:eq('+i+')').height();
		}

		for (var i = 0; i <= 15-1; i++) {
			h15 = h15 + $('.calendar_list .list_scroll tr:eq('+i+')').height();
		}

		for (var i = 0; i <= 20-1; i++) {
			h20 = h20 + $('.calendar_list .list_scroll tr:eq('+i+')').height();
		}

		var current = $('.calendar_list .list_scroll').attr('data-current');

		if(!current || current == 1) {
			current = h20;
		} else {
			if(current == 5) current = 0;
			if(current == 10) current = h5;
			if(current == 15) current = h10;
			if(current == 20) current = h15;
		}

		$('.calendar_list .list_scroll').animate({scrollTop: current+2}, 1000);
		$('.calendar_list .list_scroll').scroll();

		return false;
	});	

	$(window).resize(function() {
		listInit();		
	});

	$('.calendar_list .list_scroll img').load(function() {
		listInit();
	});

	$(window).load(function() {
		listInit();

		var pageOld = $('#content').data('page-old');
		if(pageOld) {

			var href = $('.calendar_list .row td a[data-id="'+pageOld+'"]');
			var index = href.closest('tr').index()+1;
			var current_kit = Math.ceil(index/5);
			var select = current_kit*5-6;
			var position = 0;

			for (var i = 0; i <= select; i++) {
				position = position + $('.calendar_list .list_scroll tr:eq('+i+')').height();
			}

			$('.calendar_list .list_scroll').animate({scrollTop: position}, 1000);
		}
	});

	$('.calendar_list').tooltip({
		position: { my: "left+15 center", at: "right center" }
	});
});