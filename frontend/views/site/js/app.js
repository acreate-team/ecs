$(function() {
	function bannerAnimation() {
		var color = [
			'#FFFFFF',
			'#CC0000',
			'#FFC600',
			'#FFFF00',
			'#00B552',
			'#00B5F7',
			'#0073C6',
			'#002163',
			'#000000'
		];

		var now = new Date();
		var minute = now.getMinutes();
		var second = now.getSeconds();

		var secondNow = (minute * 60) + second;
		var bonNow = secondNow / 5;
		var banNow = secondNow / 45;

		bonNowSplit = bonNow.toString().split('.');
		banNowSplit = banNow.toString().split('.');

		var colorNow = bonNowSplit[0] - (banNowSplit[0] * 9);

		var w = 0;

		if(!bonNowSplit[1]) {
			w = 0;
		} else {
			w = (bonNowSplit[1] / 2) * 20;
		}

		w = w + 20;

		$('.banner .bottom span').addClass('anim');

		if(w == 100) {
			setTimeout(function() {
				$('.banner .bottom span').removeClass('anim');
			}, 1000);
		}

		$('.banner .bottom span').width(w+'%');

		var colorNow = bonNowSplit[0] - (banNowSplit[0] * 9);
		
		$('.banner .top').css('background', color[colorNow])
		$('.banner .bottom span').css('background', color[colorNow]);		
	}

	bannerAnimation();

	setInterval(function() {
		bannerAnimation();
	}, 1000);

	$('#footer a.auth').click(function() {
		/*
		if(!$(this).hasClass('active')) {
			$(this).addClass('active');
		} else {
			$(this).removeClass('active');
		}
		return false;
		*/
	});

	$('#footerCalendar .fullSize a').click(function() {
		if(!$(this).hasClass('active')) {
			$(this).addClass('active');
			var docelem = document.documentElement;

		    if(docelem.requestFullscreen) {
		        docelem.requestFullscreen();
		    } else if(docelem.mozRequestFullScreen) {
		        docelem.mozRequestFullScreen();
		    } else if(docelem.webkitRequestFullscreen) {
		        docelem.webkitRequestFullscreen();
		    } else if(docelem.msRequestFullscreen) {
		        docelem.msRequestFullscreen();
		    }
		} else {
			$(this).removeClass('active');
			
	        if(document.exitFullscreen) {
	            document.exitFullscreen();
	        } else if(document.webkitExitFullscreen) {
	            document.webkitExitFullscreen();
	        } else if(document.mozCancelFullScreen) {
	            document.mozCancelFullScreen();
	        } else if(document.msExitFullscreen) {
	            document.msExitFullscreen();
	        }
		}
		return false;		
	});

	if($('.calendarWrap.shks').length) {
		function calcLine(id) {
			var startLineTop = $('.calendarWrap.shks .start-line-'+id).position().top;
			var startLineLeft = $('.calendarWrap.shks .start-line-'+id).position().left;
			var endLineBottom = $('.calendarWrap.shks .end-line-'+id).position().top + $('.calendarWrap.shks .end-line-'+id).height();
			var endLineRight = $('.calendarWrap.shks .end-line-'+id).position().left + $('.calendarWrap.shks .end-line-'+id).width();

			startLineTop = startLineTop - 2;

			if(id == '2_1' || id == '2_2') {
				startLineTop = startLineTop + 2;
			}

			if(id == '1_1' || id == '1_2' || id == '1_3' || id == '1_4' || id == '1_5' || id == '1_6' || id == '1_7' || id == '1_8') {
				startLineTop = startLineTop + 1;
			}

			if(id == '4_1' || id == '4_2') {
				startLineTop = startLineTop + 1;
			}

			var w = endLineRight - startLineLeft;
			var h = endLineBottom - startLineTop;			

			if(id == '3') {
				w = w + 2;
				h = h + 4;
			}

			if(id == '4_1' || id == '4_2') {
				w = w + 2;
				h = h + 3;				
			}

			if(id == '1_1' || id == '1_2' || id == '1_3') {
				w = w + 2;
				h = h + 2;
			}

			if(id == '1_4' || id == '1_5' || id == '1_6' || id == '1_7' || id == '1_8') {
				w = w + 2;
				h = h + 2;
			}



			$('.calendarWrap.shks .line'+id).css({'top':startLineTop+'px', 'left':startLineLeft+'px'});
			$('.calendarWrap.shks .line'+id).css({'width':w+'px', 'height':h+'px'});			
		}

		function calendarShksLine() {
			calcLine('1_1');
			calcLine('1_2');
			calcLine('1_3');
			calcLine('1_4');
			calcLine('1_5');
			calcLine('1_6');
			calcLine('1_7');
			calcLine('1_8');			
			calcLine('3');
			calcLine('4_1');
			calcLine('4_2');
		}

		calendarShksLine();

		$(window).resize(function() {
			calendarShksLine();
		});
	}

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

	$('.calendar_list_system .close').click(function() {
		parent.jQuery.fancybox.getInstance().close();
		return false;
	});

	$('.calendar_list_system .item .format .view').click(function() {
		var box = $('.calendar_list_system .select.format .box');
		if(!box.is(':visible')) box.slideDown();
		else box.slideUp();

		return false;
	});

	$('.calendar_list_system .item .sections .bttn').click(function() {
		var box = $('.calendar_list_system .select.sections .box');
		if(!box.is(':visible')) box.slideDown();
		else box.slideUp();

		return false;
	});	

	$('.calendar_list_system .item .wrap .row .closeBox').click(function() {
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