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
});