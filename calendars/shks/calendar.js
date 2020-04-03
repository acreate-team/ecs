$(function() {			
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
});		