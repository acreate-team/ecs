$(function() {
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
});