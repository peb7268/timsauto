(function($){
	function lookupLink(target){
		var link = $(target).data('action');
		
		if(typeof link == 'undefined') return lookupLink($(target).parent());

		return link;
	}

	function bindEvents(){
		if($('#searchform').length > 0){
			$('#searchform a').on('click', toggleSearchForm);
		}
	}

	function toggleSearchForm(evt){
		evt.preventDefault();
		var $input 		= $(this).parent().find('input');
		var inputWidth 	= $input.outerWidth();
		var newWidth  	= (inputWidth == 0) ? '90%' : 0;
		var newPadding  = (inputWidth == 0) ? '0 10px 0 10px' : 0;
		
		$input.animate({
			'width' 	: newWidth,
			'padding'	: newPadding
		}, 100);
		
	}

	//Post DOM content
	$('document').ready(function(){
		//Post Behavior
		var $post_items = $('.featured_image, .more, .title a');
		$post_items.on('click', function(evt){ 
			evt.preventDefault(); 
			var action = lookupLink(evt.target);

			window.location.href=action; 
		});

		$post_items.hover(function(){
			$(this).find('.filter').slideUp(120);
			$('body').css('cursor', 'pointer');
		}, function(){
			$(this).find('.filter').slideDown(120);
			$('body').removeAttr('style');
		});

		bindEvents();
	});
}(jQuery));