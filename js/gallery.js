(function($){
	if(typeof isMobile == 'undefined'){
		function isMobile(){
			return (jQuery('body').outerWidth() < 500);
		}
	}

	if($('.gallery').length > 0){
		var trigger = (isMobile() == true && trigger !== 'hover') ? 'click' : 'hover';
		
		$('.card').flip({
			trigger : trigger
		});
		
		$('.action', '.card .back').fancybox({
			closeClick	: false,
			openEffect	: 'none',
			closeEffect	: 'none'
		});

		//TODO: put a project type filter on
		$('.gallery').isotope();

	}
}(jQuery));