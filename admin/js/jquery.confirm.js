(function($){
	
	$.confirm = function(params){
		
		if($('#confirmBox').length){
			return false;
		}
		
		var buttonHTML = '';
		$.each(params.buttons,function(name,obj){

			buttonHTML += '<a href="#" class="button '+obj['class']+'">'+name+'<span></span></a>';
			
			if(!obj.action){
				obj.action = function(){};
			}
		});
		
		var markup = [
			'',
			'<div id="confirmBox" class="animated">',
			'<h1>',params.title,'</h1>',
			'<p>',params.message,'</p>',
			'<div id="confirmButtons">',
			buttonHTML,
			'</div></div>'
		].join('');
		
		$(markup).hide().appendTo('body').show().addClass('bounceIn');
		
		var buttons = $('#confirmBox .button'),
			i = 0;

		$.each(params.buttons,function(name,obj){
			buttons.eq(i++).click(function(){
				
				obj.action();
				$.confirm.hide();
				return false;
			});
		});
	}

	$.confirm.hide = function(){
		$('#confirmBox').addClass('fadeOutRightBig');
		setTimeout(function() {
			$('#confirmBox').remove();
		}, 500);
	}
	
})(jQuery);