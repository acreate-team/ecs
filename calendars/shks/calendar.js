$(function() {			
	function calcLine(id, reverse) {
		id = parseInt(id);
		var z = window.devicePixelRatio*100;

		if(id == 19 || id == 22 || id == 25 || id == 28 || id == 31 || id == 34 || id == 37 || id == 40) {
			var startLine = document.getElementsByClassName('startLine-'+id);
		} else {
			var startLine = document.getElementById('startLine-'+id);
		}

		var bottomLine = document.getElementById('bottomLine-'+id);
		var endLine = document.getElementById('endLine-'+id);

		$('.linePlace-'+id).remove();
		$('#startLine-'+id+', .startLine-'+id).append('<div class="linePlace linePlace-'+id+'" style="display: none"><svg class="line line-'+id+'" width="0" height="0" viewBox="0 0 0 0" fill="none"><path d="M0 0 L0 0" stroke="black" stroke-width="1"></path></svg></div>');

		if(id == 19 || id == 22 || id == 25 || id == 28 || id == 31 || id == 34 || id == 37 || id == 40) {
			var rect1 = startLine[0].getBoundingClientRect();
		} else {
			var rect1 = startLine.getBoundingClientRect();
		}
		var rect2 = bottomLine.getBoundingClientRect();		
		var rect3 = endLine.getBoundingClientRect();	

		h = rect2.y - rect1.y + rect2.height;
		w = rect3.x - rect2.x + rect3.width;

		var pt1 = $('#startLine-'+id).css('border-right-width');

		if(id == 9 || id == 17) {
			w = rect2.width - (parseFloat(pt1) / 2);
		}

		if(id == 18 || id == 21 || id == 24 || id == 27 || id == 30 || id == 33 || id == 36 || id == 39) {
			w = rect2.width - (parseFloat(pt1) / 2);	
		}

		if(id == 20 || id == 23 || id == 26 || id == 29 || id == 32 || id == 35 || id == 38 || id == 41) {
			w = rect2.width;
		}

		var line1 = document.getElementsByClassName('line-'+id)[0];

		$('.linePlace-'+id).css({'width': w, 'height': h});

		line1.setAttribute('height', h);
		line1.setAttribute('width', w);
		line1.setAttribute('viewBox', '0 0 '+w+' '+h);
		if(!reverse) {
			$('.line-'+id+' path').attr('d', 'M0 '+h+' L'+w+' 0');
		} else {
			$('.line-'+id+' path').attr('d', 'M'+w+' '+h+' L0 0');
		}

		if(parseFloat(pt1) > 1) {
			pt1 = 1;
			$('.line-'+id+' path').attr('stroke-width', parseFloat(pt1));		
		} else {
			$('.line-'+id+' path').attr('stroke-width', parseFloat(pt1));		
		}

		if((id == 3 || id == 5 || id == 7) || (id == 11 || id == 13 || id == 15)) {
			if(z >= 100 && z <= 110) {
				$('.linePlace-'+id).css({'left':'-0.25pt', 'top': '-0.5pt'});
			} else if((z >= 110 && z <= 150)) {
				$('.linePlace-'+id).css({'left':'0pt', 'top': '-0.5pt'});
			} else if((z > 150 && z < 175) || (z >= 250)) {
				$('.linePlace-'+id).css({'left':'-0.25pt', 'top': '-0.5pt'});
			} else {
				$('.linePlace-'+id).css({'left':'-0.5pt', 'top': '-0.5pt'});
			}
		} else if(id == 18 || id == 21 || id == 24 || id == 27 || id == 30 || id == 33 || id == 36 || id == 39) {
			if(z >= 200 && z < 250) {
				$('.linePlace-'+id).css({'left':'-0.5pt', 'top': '-0.25pt'});
			} else if(z >= 110 && z <= 250) {
				$('.linePlace-'+id).css({'left':'-0pt', 'top': '-0.25pt'});
			} else {
				$('.linePlace-'+id).css({'left':'-0.5pt', 'top': '-0.25pt'});
			}
		} else if(id == 20 || id == 23 || id == 26 || id == 29 || id == 32 || id == 35 || id == 38 || id == 41) {
			$('.linePlace-'+id).css({'left':'-0.5pt', 'top': '-0.25pt'});
		} else {
			$('.linePlace-'+id).css({'left':'-0.5pt', 'top': '-0.5pt'});
		}
	}

	function calendarShksLine() {
		calcLine(1, true);

		calcLine(2, true);
		calcLine(3, false);
		calcLine(4, true);
		calcLine(5, false);
		calcLine(6, true);
		calcLine(7, false);
		calcLine(8, true);
		calcLine(9, false);

		calcLine(10, true);
		calcLine(11, false);
		calcLine(12, true);
		calcLine(13, false);
		calcLine(14, true);
		calcLine(15, false);
		calcLine(16, true);
		calcLine(17, false);

		calcLine(18, false);
		calcLine(19, true);
		calcLine(20, false);

		calcLine(21, false);
		calcLine(22, true);
		calcLine(23, false);

		calcLine(24, false);
		calcLine(25, true);
		calcLine(26, false);

		calcLine(27, false);
		calcLine(28, true);
		calcLine(29, false);

		calcLine(30, false);
		calcLine(31, true);
		calcLine(32, false);

		calcLine(33, false);
		calcLine(34, true);
		calcLine(35, false);

		calcLine(36, false);
		calcLine(37, true);
		calcLine(38, false);

		calcLine(39, false);
		calcLine(40, true);
		calcLine(41, false);

		$('.linePlace').show();
	}

	calendarShksLine();

	$(window).resize(function() {
		calendarShksLine();
	});
});		